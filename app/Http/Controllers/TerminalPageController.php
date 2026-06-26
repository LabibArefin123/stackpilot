<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectHealth;
use App\Models\TerminalCommand;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class TerminalPageController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();

        $commands = TerminalCommand::latest()
            ->take(20)
            ->get();

        $health = ProjectHealth::latest()->first();

        return view('backend.terminal_page.index', compact(
            'projects',
            'commands',
            'health'
        ));
    }

    public function run(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'command' => 'required'
        ]);

        $project = Project::findOrFail($request->project_id);

        $allowedCommands = [

            // Laravel
            'optimize'           => 'php artisan optimize',
            'optimize_clear'     => 'php artisan optimize:clear',
            'queue_restart'      => 'php artisan queue:restart',

            // Git
            'git_status'         => 'git status',
            'git_pull'           => 'git pull',
            'git_fetch'          => 'git fetch',
            'git_log'            => 'git log --oneline -10',
            'git_branch'         => 'git branch',
            'git_remote'         => 'git remote -v',

            // Composer
            'composer_install'   => 'composer install',

            // Node
            'npm_build'          => 'npm run build',

        ];
        if (! isset($allowedCommands[$request->command])) {
            abort(403);
        }

        $command = $allowedCommands[$request->command];

        $process = Process::fromShellCommandline(
            $command,
            $project->project_path
        );

        $process->setTimeout(300);

        try {

            $process->run();

            $output = $process->getOutput() .
                $process->getErrorOutput();

            TerminalCommand::create([
                'project_id' => $project->id,
                'command' => $command,
                'output' => $output,
                'success' => $process->isSuccessful(),
                'exit_code' => $process->getExitCode(),
                'executed_by' => auth()->user()->name ?? 'System',
                'executed_at' => now(),
            ]);

            return back()->with(
                'terminal_output',
                $output
            );
        } catch (\Exception $e) {

            return back()->with(
                'terminal_output',
                $e->getMessage()
            );
        }
    }
}
