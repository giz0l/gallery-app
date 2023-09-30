<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class ClearTempFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-temp-file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear files from tmp dir';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $files = Storage::disk('public')->files('tmp');

        foreach ($files as $file) {

            $timestamp = Storage::disk('public')->lastModified($file);
            $fileDateTime = Carbon::createFromTimestamp($timestamp);

            if (now()->subMinutes(120)->gte($fileDateTime)) {
                Storage::disk('public')->delete($file);
            }
        }
    }
}
