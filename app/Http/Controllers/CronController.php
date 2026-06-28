<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class CronController extends Controller
{
    /**
     * Cron Dashboard
     */
    public function index()
    {
        $projects = Project::where('project_type', 'Laravel')
            ->orderBy('name')
            ->get();
            
        return view(
            'backend.cron_page.index',
            compact('projects')
        );
    }

    /**
     * Run Laravel Scheduler
     */
    public function run(Project $project)
    {
        try {

            $exitCode = Artisan::call('schedule:run');

            return response()->json([

                'success' => true,

                'project' => $project->name,

                'exit_code' => $exitCode,

                'output' => Artisan::output(),

                'time' => now()->toDateTimeString()

            ]);
        } catch (\Throwable $e) {

            return response()->json([

                'success' => false,

                'message' => $e->getMessage()

            ], 500);
        }
    }

    /**
     * Latest Laravel Log
     */
    public function logs(Project $project)
    {
        $file = storage_path('logs/laravel.log');

        if (! File::exists($file)) {

            return response()->json([

                'success' => false,

                'logs' => 'No log file found.'

            ]);
        }

        $logs = File::get($file);

        return response()->json([

            'success' => true,

            'project' => $project->name,

            'logs' => $logs

        ]);
    }

    /**
     * Scheduler Status
     */
    public function status(Project $project)
    {
        $status = [

            'project' => $project->name,

            'scheduler' => 'Available',

            'queue' => class_exists(\Illuminate\Queue\Queue::class)
                ? 'Configured'
                : 'Not Configured',

            'timezone' => config('app.timezone'),

            'server_time' => now()->toDateTimeString(),

            'php' => PHP_VERSION,

            'laravel' => app()->version(),

        ];

        return response()->json([

            'success' => true,

            'status' => $status

        ]);
    }

    /**
     * Cron History
     */
    public function history(Project $project)
    {
        $file = storage_path('logs/laravel.log');

        if (! File::exists($file)) {

            return response()->json([]);
        }

        $lines = file($file);

        $lines = array_slice($lines, -100);

        return response()->json([

            'success' => true,

            'project' => $project->name,

            'history' => $lines

        ]);
    }
}
