<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectEnvironment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;

class ProjectEnvironmentSeeder extends Seeder
{
    public function run(): void
    {
        Project::all()->each(function (Project $project) {

            $projectPath = $this->guessProjectPath($project);

            if (!$projectPath) {
                return;
            }

            ProjectEnvironment::updateOrCreate(

                [
                    'project_id' => $project->id,
                ],

                [

                    'environment' => app()->environment(),

                    'project_path' => $projectPath,

                    'public_path' => File::isDirectory($projectPath . DIRECTORY_SEPARATOR . 'public')
                        ? $projectPath . DIRECTORY_SEPARATOR . 'public'
                        : null,

                    'server_ip' => request()->server('SERVER_ADDR')
                        ?? gethostbyname(gethostname()),

                    'server_name' => gethostname(),

                    'hosting_provider' => app()->environment('local')
                        ? 'Laragon'
                        : 'Production',

                    'php_version' => PHP_VERSION,
                    'php_binary' => PHP_BINARY,
                    'composer_binary' => $this->binary('composer'),
                    'node_version' => $this->nodeVersion(),
                    'node_binary' => $this->binary('node'),
                    'npm_binary' => $this->binary('npm'),
                    'laravel_version' => $this->laravelVersion($projectPath),
                    'ssh_user' => null,
                    'ssh_port' => 22,
                    'last_checked_at' => now(),
                    'is_default' => true,

                ]
            );
        });
    }

    /**
     * Guess project path.
     */
    protected function guessProjectPath(Project $project): ?string
    {
        $root = 'E:\\laragon\\www';

        $path = $root . DIRECTORY_SEPARATOR . strtolower(str_replace(' ', '_', $project->name));

        return File::isDirectory($path)
            ? $path
            : null;
    }

    /**
     * Locate executable.
     */
    protected function binary(string $binary): ?string
    {
        $command = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'
            ? "where {$binary}"
            : "which {$binary}";

        $process = Process::fromShellCommandline($command);

        $process->run();

        return $process->isSuccessful()
            ? trim(explode(PHP_EOL, $process->getOutput())[0])
            : null;
    }

    /**
     * Read Node version.
     */
    protected function nodeVersion(): ?string
    {
        $process = Process::fromShellCommandline('node -v');

        $process->run();

        return $process->isSuccessful()
            ? trim($process->getOutput())
            : null;
    }

    /**
     * Read Laravel version.
     */
    protected function laravelVersion(string $path): ?string
    {
        $composer = $path . DIRECTORY_SEPARATOR . 'composer.json';

        if (!File::exists($composer)) {
            return null;
        }

        $json = json_decode(File::get($composer), true);

        return $json['require']['laravel/framework']
            ?? $json['require']['laravel/laravel']
            ?? null;
    }
}
