<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemController extends Controller
{
    public function status(Request $request)
    {
        $database = false;

        try {
            DB::connection()->getPdo();
            $database = true;
        } catch (\Throwable $e) {
            $database = false;
        }

        $storagePath = storage_path();

        return response()->json([

            'success' => true,

            'project' => config('app.name'),

            'environment' => app()->environment(),

            'laravel_version' => app()->version(),

            'php_version' => PHP_VERSION,

            'server_time' => now()->toDateTimeString(),

            'timezone' => config('app.timezone'),

            'app_url' => config('app.url'),

            'database' => $database,

            'storage_writable' => is_writable($storagePath),

            'storage_path' => $storagePath,

            'cache_driver' => config('cache.default'),

            'session_driver' => config('session.driver'),

            'queue_driver' => config('queue.default'),

            'debug' => config('app.debug'),

            'maintenance_mode' => app()->isDownForMaintenance(),

            'disk_free' => round(disk_free_space(base_path()) / 1024 / 1024 / 1024, 2),

            'disk_total' => round(disk_total_space(base_path()) / 1024 / 1024 / 1024, 2),

            'memory_limit' => ini_get('memory_limit'),

            'max_execution_time' => ini_get('max_execution_time'),

            'upload_max_filesize' => ini_get('upload_max_filesize'),

            'post_max_size' => ini_get('post_max_size'),

            'loaded_extensions' => get_loaded_extensions(),

        ]);
    }

    public function logs(Request $request)
    {
        $logs = [];

        $logPath = storage_path('logs');

        if (!File::isDirectory($logPath)) {

            return response()->json([
                'success' => true,
                'logs' => [],
            ]);
        }

        $latest = collect(File::files($logPath))
            ->filter(fn($file) => $file->getExtension() === 'log')
            ->sortByDesc(fn($file) => $file->getMTime())
            ->first();

        if (!$latest) {

            return response()->json([
                'success' => true,
                'logs' => [],
            ]);
        }

        $handle = fopen($latest->getRealPath(), 'r');

        if (!$handle) {

            return response()->json([
                'success' => false,
                'message' => 'Unable to read log file.',
            ], 500);
        }

        $buffer = '';
        $date = null;
        $level = null;

        while (($line = fgets($handle)) !== false) {

            $line = rtrim($line);

            if (preg_match('/^\[(.*?)\]\s+\w+\.([A-Z]+):\s(.*)$/', $line, $match)) {

                if ($buffer !== '') {

                    $logs[] = [

                        'level' => $level,

                        'date' => optional($date)->toDateTimeString(),

                        'message' => strtok($buffer, "\n"),

                        'details' => $buffer,

                    ];
                }

                try {

                    $date = Carbon::parse($match[1]);
                } catch (\Throwable $e) {

                    $date = null;
                }

                $level = $match[2];

                $buffer = $match[3];
            } else {

                $buffer .= PHP_EOL . trim($line);
            }
        }

        fclose($handle);

        if ($buffer !== '') {

            $logs[] = [

                'level' => $level,

                'date' => optional($date)->toDateTimeString(),

                'message' => strtok($buffer, "\n"),

                'details' => $buffer,

            ];
        }

        $logs = collect($logs)
            ->sortByDesc('date')
            ->take(100)
            ->values();

        return response()->json([

            'success' => true,

            'project' => config('app.name'),

            'logs' => $logs,

        ]);
    }
}
