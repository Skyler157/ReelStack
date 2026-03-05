<?php

namespace App\Jobs;

use App\Models\DownloadTask;
use App\Services\ApifyInstagramService;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Throwable;

class ProcessDownloadTask implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $backoff = 15;
    public int $timeout = 300;

    public function __construct(public int $taskId)
    {
    }

    public function handle(ApifyInstagramService $apifyInstagramService): void
    {
        $task = DownloadTask::find($this->taskId);
        if (!$task) {
            return;
        }

        $task->update(['status' => 'processing']);

        try {
            $result = $apifyInstagramService->extract($task->source_url);

            if (empty($result['media_url'])) {
                throw new \RuntimeException('No downloadable media URL found for the provided link.');
            }

            [$localPath, $mimeType, $fileSize] = $this->downloadToLocalStorage($result['media_url'], $task->id);

            $task->update([
                'status' => 'completed',
                'provider_run_id' => $result['run_id'] ?? null,
                'media_url' => $result['media_url'],
                'local_file_path' => $localPath,
                'mime_type' => $mimeType,
                'file_size' => $fileSize,
                'payload' => $result,
                'error_message' => null,
            ]);
        } catch (Throwable $e) {
            $task->update([
                'status' => 'failed',
                'error_message' => $e->getMessage(),
            ]);

            Log::error('Download task processing failed', [
                'task_id' => $task->id,
                'source_url' => $task->source_url,
                'error' => $e->getMessage(),
            ]);

            if (config('queue.default') !== 'sync') {
                throw $e;
            }
        }
    }

    private function downloadToLocalStorage(string $mediaUrl, int $taskId): array
    {
        $extension = $this->detectExtension($mediaUrl);
        $relativePath = "downloads/reelstack-{$taskId}.{$extension}";
        $absolutePath = Storage::disk('local')->path($relativePath);
        $directory = dirname($absolutePath);

        if (!is_dir($directory)) {
            mkdir($directory, 0775, true);
        }

        try {
            $response = Http::retry(3, 1500)
                ->connectTimeout(20)
                ->timeout(240)
                ->withHeaders([
                    'User-Agent' => 'ReelStack/1.0',
                ])
                ->sink($absolutePath)
                ->get($mediaUrl);
        } catch (ConnectionException $e) {
            throw new \RuntimeException('Could not download media file from source.', 0, $e);
        }

        if (!$response->successful()) {
            throw new \RuntimeException('Media download failed with status '.$response->status().'.');
        }

        $size = file_exists($absolutePath) ? filesize($absolutePath) : null;
        $mimeType = $response->header('Content-Type', 'application/octet-stream');

        return [$relativePath, $mimeType, $size];
    }

    private function detectExtension(string $url): string
    {
        $path = parse_url($url, PHP_URL_PATH) ?: '';
        $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        if (in_array($ext, ['mp4', 'jpg', 'jpeg', 'png', 'webp'], true)) {
            return $ext === 'jpeg' ? 'jpg' : $ext;
        }

        if (Str::contains($url, '.mp4')) {
            return 'mp4';
        }

        return 'mp4';
    }
}
