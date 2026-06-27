<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use App\Models\Project;

class OptimizationController extends Controller
{
    public function index()
    {
        $projects = Project::with('health')
            ->orderBy('name')
            ->get();

        $commands = [

            [
                'title' => 'Optimize',
                'description' => 'Build all Laravel caches.',
                'command' => 'optimize',
                'artisan' => 'php artisan optimize',
                'icon' => 'fas fa-bolt',
                'color' => 'success',
            ],

            [
                'title' => 'Optimize Clear',
                'description' => 'Clear every cache.',
                'command' => 'optimize:clear',
                'artisan' => 'php artisan optimize:clear',
                'icon' => 'fas fa-trash',
                'color' => 'danger',
            ],

            [
                'title' => 'Config Cache',
                'description' => 'Cache configuration files.',
                'command' => 'config:cache',
                'artisan' => 'php artisan config:cache',
                'icon' => 'fas fa-cogs',
                'color' => 'primary',
            ],

            [
                'title' => 'Route Cache',
                'description' => 'Cache application routes.',
                'command' => 'route:cache',
                'artisan' => 'php artisan route:cache',
                'icon' => 'fas fa-route',
                'color' => 'info',
            ],

            [
                'title' => 'View Cache',
                'description' => 'Compile Blade templates.',
                'command' => 'view:cache',
                'artisan' => 'php artisan view:cache',
                'icon' => 'fas fa-eye',
                'color' => 'warning',
            ],

            [
                'title' => 'Event Cache',
                'description' => 'Cache Laravel events.',
                'command' => 'event:cache',
                'artisan' => 'php artisan event:cache',
                'icon' => 'fas fa-broadcast-tower',
                'color' => 'secondary',
            ],

        ];

        return view(
            'backend.optimize_page.index',
            compact(
                'commands',
                'projects'
            )
        );
    }

    public function run(Request $request)
    {
        $request->validate([

            'command' => 'required|string',

        ]);

        $allowed = [

            'optimize',

            'optimize:clear',

            'config:cache',

            'config:clear',

            'route:cache',

            'route:clear',

            'view:cache',

            'view:clear',

            'event:cache',

            'event:clear',

        ];

        if (! in_array($request->command, $allowed)) {

            return response()->json([

                'success' => false,

                'output' => 'Command not allowed.'

            ], 403);
        }

        $process = Process::fromShellCommandline(

            'php artisan ' . $request->command,

            base_path()

        );

        $process->setTimeout(120);

        $process->run();

        return response()->json([

            'success' => $process->isSuccessful(),

            'output' => $process->getOutput() ?: $process->getErrorOutput(),

        ]);
    }
}
