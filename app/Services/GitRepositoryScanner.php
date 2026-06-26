<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;

class GitRepositoryScanner
{
    protected string $rootPath = 'E:\\laragon\\www';

    public function scan(): void
    {
        if (! File::isDirectory($this->rootPath)) {
            return;
        }

        foreach (File::directories($this->rootPath) as $directory) {

            if (! File::isDirectory($directory . '\\.git')) {
                continue;
            }

            $this->registerRepository($directory);
        }
    }

    protected function registerRepository(string $directory): void
    {
        $name = basename($directory);

        Project::updateOrCreate(

            [

                'name' => ucfirst(str_replace('_', ' ', $name))

            ],

            [

                'git_branch' => $this->git($directory, 'git branch --show-current'),

                'git_repository' => $this->git($directory, 'git remote get-url origin'),

                'domain' => null,

                'is_active' => true,

                'last_checked_at' => now(),

            ]

        );
    }

    protected function git($path, $command)
    {
        $process = Process::fromShellCommandline($command, $path);

        $process->run();

        if (!$process->isSuccessful()) {

            return null;
        }

        return trim($process->getOutput());
    }
}
