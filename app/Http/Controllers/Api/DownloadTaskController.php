<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessDownloadTask;
use App\Models\DownloadTask;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class DownloadTaskController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'url' => [
                'required',
                'url',
                'max:2048',
                'regex:/^https:\/\/(www\.)?instagram\.com\/.+/i',
            ],
        ], [
            'url.regex' => 'Please enter a valid Instagram URL (https://instagram.com/...).',
        ]);

        try {
            $task = DownloadTask::create([
                'source_url' => $validated['url'],
                'status' => 'queued',
                'provider' => 'apify',
                'requested_ip' => $request->ip(),
            ]);

            ProcessDownloadTask::dispatch($task->id);
        } catch (Throwable $e) {
            Log::error('Download task start failed', [
                'url' => $validated['url'] ?? null,
                'ip' => $request->ip(),
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'Could not start download task.',
            ], 500);
        }

        return response()->json([
            'id' => $task->id,
            'status' => $task->status,
        ], 202);
    }

    public function show(DownloadTask $downloadTask): JsonResponse
    {
        return response()->json([
            'id' => $downloadTask->id,
            'status' => $downloadTask->status,
            'source_url' => $downloadTask->source_url,
            'media_url' => $downloadTask->media_url,
            'file_ready' => (bool) ($downloadTask->local_file_path),
            'error' => $downloadTask->error_message,
            'created_at' => $downloadTask->created_at,
            'updated_at' => $downloadTask->updated_at,
        ]);
    }

    public function file(DownloadTask $downloadTask): Response
    {
        if ($downloadTask->status !== 'completed') {
            abort(404, 'File is not ready.');
        }

        if ($downloadTask->local_file_path && Storage::disk('local')->exists($downloadTask->local_file_path)) {
            $absolutePath = Storage::disk('local')->path($downloadTask->local_file_path);
            $extension = pathinfo($absolutePath, PATHINFO_EXTENSION) ?: 'mp4';
            $filename = 'reelstack-'.$downloadTask->id.'.'.$extension;

            return response()->download($absolutePath, $filename, [
                'Content-Type' => $downloadTask->mime_type ?: 'application/octet-stream',
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            ]);
        }

        if (!$downloadTask->media_url) {
            abort(404, 'File URL is not available.');
        }

        try {
            $remote = Http::retry(3, 1500)
                ->connectTimeout(25)
                ->timeout(300)
                ->withHeaders([
                    'User-Agent' => 'ReelStack/1.0',
                ])
                ->get($downloadTask->media_url);
        } catch (ConnectionException $e) {
            // Fallback: let the browser fetch directly if proxy download fails.
            return redirect()->away($downloadTask->media_url);
        }

        if (!$remote->successful()) {
            return redirect()->away($downloadTask->media_url);
        }

        $extension = $this->detectExtension($downloadTask->media_url);
        $filename = 'reelstack-'.$downloadTask->id.'.'.$extension;

        return response($remote->body(), 200, [
            'Content-Type' => $remote->header('Content-Type', 'application/octet-stream'),
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
        ]);
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
