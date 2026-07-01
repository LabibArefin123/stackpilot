<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\File;
use App\Services\GitRepositoryScanner;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class LogController extends Controller
{
    public function index(GitRepositoryScanner $scanner)
    {
        $projects = Project::orderBy('name')->get();
        /* Git Logs*/
        $gitLogs = [];
        foreach ($scanner->repositories() as $repository) {

            $output = $scanner->command(
                $repository,
                'git log -10 --pretty=format:"%h|%an|%ad|%s" --date=relative'
            );

            if (blank($output)) {
                continue;
            }

            $branch = $scanner->command(
                $repository,
                'git branch --show-current'
            );

            foreach (explode(PHP_EOL, $output) as $line) {
                $parts = explode('|', $line, 4);
                if (count($parts) < 4) {
                    continue;
                }

                $gitLogs[] = [
                    'project' => basename($repository),
                    'branch'  => $branch,
                    'hash'    => $parts[0],
                    'author'  => $parts[1],
                    'date'    => $parts[2],
                    'message' => $parts[3],
                ];
            }
        }

        /*Laravel Logs*/
        $serverLogs = [];

        foreach ($scanner->repositories() as $repository) {
            // Only Laravel projects
            if (!File::exists($repository . DIRECTORY_SEPARATOR . 'artisan')) {
                continue;
            }

            $logPath = $repository . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'logs';

            if (!File::isDirectory($logPath)) {
                continue;
            }

            // Latest log file
            $latest = collect(File::files($logPath))
                ->filter(fn($file) => strtolower($file->getExtension()) === 'log')
                ->sortByDesc(fn($file) => $file->getMTime())
                ->first();

            if (!$latest) {
                continue;
            }

            $handle = fopen($latest->getRealPath(), 'r');

            if (!$handle) {
                continue;
            }

            $buffer = '';
            $date   = null;
            $level  = null;

            while (($line = fgets($handle)) !== false) {

                $line = rtrim($line);

                if (preg_match('/^\[(.*?)\]\s+\w+\.([A-Z]+):\s(.*)$/', $line, $match)) {

                    // Save previous log entry
                    if ($buffer !== '') {

                        $serverLogs[] = [
                            'project' => basename($repository),
                            'level'   => $level,
                            'date'    => $date,
                            'message' => strtok($buffer, "\n"),
                            'details' => $buffer,
                        ];

                        // Prevent huge memory usage
                        if (count($serverLogs) > 300) {
                            array_shift($serverLogs);
                        }
                    }

                    try {
                        $date = Carbon::parse($match[1]);
                    } catch (\Throwable $e) {
                        $date = null;
                    }

                    $level  = $match[2];
                    $buffer = $match[3];
                } else {

                    $buffer .= PHP_EOL . trim($line);
                }
            }

            fclose($handle);

            // Save last log entry
            if ($buffer !== '') {
                $serverLogs[] = [
                    'project' => basename($repository),
                    'level'   => $level,
                    'date'    => $date,
                    'message' => strtok($buffer, "\n"),
                    'details' => $buffer,
                ];
            }
        }

        // Sort newest first
        usort($serverLogs, function ($a, $b) {
            return ($b['date']?->timestamp ?? 0) <=> ($a['date']?->timestamp ?? 0);
        });

        /* ===========================================
| Live Server Logs (Temporary)
| Source: https://alamgirart.labib.work
===========================================*/

        $liveServerLogs = [];

        try {

            $response = Http::acceptJson()
                ->timeout(15)
                ->get('https://alamgirart.labib.work/api/system/logs');

            if ($response->successful()) {

                foreach ($response->json('logs', []) as $log) {

                    $liveServerLogs[] = [

                        'project' => 'Alamgir Art',

                        'level' => $log['level'] ?? 'INFO',

                        'date' => !empty($log['date'])
                            ? Carbon::parse($log['date'])
                            : now(),

                        'message' => $log['message'] ?? '',

                        'details' => $log['details'] ?? '',

                    ];
                }
            }
        } catch (\Throwable $e) {

            logger()->error('Unable to fetch live server logs.', [

                'server' => 'https://alamgirart.labib.work',

                'error' => $e->getMessage(),

            ]);
        }

        usort($liveServerLogs, function ($a, $b) {

            return ($b['date']?->timestamp ?? 0)
                <=>
                ($a['date']?->timestamp ?? 0);
        });

        return view(
            'backend.log_page.index',
            compact(
                'projects',
                'gitLogs',
                'serverLogs',
                'liveServerLogs'
            )
        );
    }
}
