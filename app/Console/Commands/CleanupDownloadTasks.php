<?php

namespace App\Console\Commands;

use App\Models\DownloadTask;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class CleanupDownloadTasks extends Command
{
    protected $signature = 'reelstack:cleanup {--hours=24 : Delete tasks/files older than this many hours}';

    protected $description = 'Delete old download task records and their local files';

    public function handle(): int
    {
        $hours = max(1, (int) $this->option('hours'));
        $cutoff = Carbon::now()->subHours($hours);

        $deletedRows = 0;
        $deletedFiles = 0;

        DownloadTask::query()
            ->whereIn('status', ['completed', 'failed'])
            ->where('created_at', '<', $cutoff)
            ->orderBy('id')
            ->chunkById(200, function ($tasks) use (&$deletedRows, &$deletedFiles) {
                foreach ($tasks as $task) {
                    if ($task->local_file_path && Storage::disk('local')->exists($task->local_file_path)) {
                        Storage::disk('local')->delete($task->local_file_path);
                        $deletedFiles++;
                    }

                    $task->delete();
                    $deletedRows++;
                }
            });

        $this->info("Cleanup complete. Deleted {$deletedRows} tasks and {$deletedFiles} local files.");

        return self::SUCCESS;
    }
}
