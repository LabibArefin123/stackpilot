<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectHealth;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;

class ProjectHealthSeeder extends Seeder
{
    public function run(): void
    {
        Project::all()->each(function (Project $project) {

            $projectPath = $this->guessProjectPath($project);

            if (!$projectPath) {
                return;
            }

            $checks = [

                'git_ok' => File::isDirectory(
                    $projectPath . DIRECTORY_SEPARATOR . '.git'
                ),

                'composer_ok' => File::exists(
                    $projectPath . DIRECTORY_SEPARATOR . 'composer.json'
                ),

                'node_ok' => File::exists(
                    $projectPath . DIRECTORY_SEPARATOR . 'package.json'
                ),

                'queue_ok' => $this->queueRunning(),

                'cron_ok' => $this->cronRunning(),

                'storage_link_ok' => File::exists(
                    $projectPath .
                        DIRECTORY_SEPARATOR .
                        'public' .
                        DIRECTORY_SEPARATOR .
                        'storage'
                ),

                'env_ok' => File::exists(
                    $projectPath . DIRECTORY_SEPARATOR . '.env'
                ),

            ];

            $healthScore = round(
                collect($checks)->filter()->count()
                    / count($checks)
                    * 100
            );

            ProjectHealth::updateOrCreate(

                [
                    'project_id' => $project->id,
                ],

                array_merge($checks, [

                    'health_score' => $healthScore,

                    'checked_at' => now(),

                ])
            );
        });
    }

    /**
     * Guess project path.
     */
    protected function guessProjectPath(Project $project): ?string
    {
        $root = 'E:\\laragon\\www';

        $path = $root . DIRECTORY_SEPARATOR . strtolower(
            str_replace(' ', '_', $project->name)
        );

        return File::isDirectory($path)
            ? $path
            : null;
    }

    /**
     * Check if queue worker is running.
     */
    protected function queueRunning(): bool
    {
        $command = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'
            ? 'tasklist'
            : 'ps -ef';

        $process = Process::fromShellCommandline($command);

        $process->run();

        return $process->isSuccessful()
            && str_contains(
                strtolower($process->getOutput()),
                'queue:work'
            );
    }

    /**
     * Check if scheduler is running.
     */
    protected function cronRunning(): bool
    {
        $command = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'
            ? 'schtasks'
            : 'crontab -l';

        $process = Process::fromShellCommandline($command);

        $process->run();

        return $process->isSuccessful();
    }
}
