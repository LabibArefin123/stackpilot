<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;

class GitRepositoryScanner
{
    protected string $rootPath = 'E:\\laragon\\www';

    /**
     * Scan all local Git repositories.
     */
    public function scan(): void
    {
        if (!File::isDirectory($this->rootPath)) {
            return;
        }

        foreach ($this->repositories() as $repository) {
            $this->registerRepository($repository);
        }
    }

    /**
     * Register or update repository.
     */
    protected function registerRepository(string $directory): void
    {
        $name = basename($directory);

        $repository = $this->git($directory, 'git remote get-url origin');

        Project::updateOrCreate(
            [
                'name' => ucfirst(str_replace('_', ' ', $name)),
            ],
            [
                'git_repository'   => $repository,
                'git_branch'       => $this->git($directory, 'git branch --show-current'),
                'default_branch'   => $this->defaultBranch($directory),
                'last_commit'      => $this->git($directory, 'git rev-parse HEAD'),
                'last_commit_date' => $this->git($directory, 'git log -1 --format=%ci'),
                'git_status'       => $this->gitStatus($directory),

                'project_type'     => $this->projectType($directory),
                'php_version'      => $this->phpVersion($directory),
                'laravel_version'  => $this->laravelVersion($directory),

                'owner'            => $this->repositoryOwner($repository),
                'visibility'       => null,
                'is_private'       => false,

                'domain'           => null,
                'is_active'        => true,
                'last_checked_at'  => now(),
            ]
        );
    }

    /**
     * Execute git command.
     */
    protected function git(string $path, string $command): ?string
    {
        $process = Process::fromShellCommandline($command, $path);

        $process->run();

        if (!$process->isSuccessful()) {
            return null;
        }

        return trim($process->getOutput());
    }

    /**
     * Find a project's local repository path.
     */
    public function findRepository(Project $project): ?string
    {
        foreach ($this->repositories() as $directory) {

            if (strcasecmp(basename($directory), $project->name) === 0) {
                return $directory;
            }

            if (
                strcasecmp(
                    str_replace('_', ' ', basename($directory)),
                    $project->name
                ) === 0
            ) {
                return $directory;
            }

            $remote = $this->git($directory, 'git remote get-url origin');

            if ($remote && $remote === $project->git_repository) {
                return $directory;
            }
        }

        return null;
    }

    /**
     * Return repository directories.
     */
    public function repositories(): array
    {
        if (!File::isDirectory($this->rootPath)) {
            return [];
        }

        return collect(File::directories($this->rootPath))
            ->filter(fn($directory) => File::isDirectory($directory . DIRECTORY_SEPARATOR . '.git'))
            ->values()
            ->all();
    }

    /**
     * Execute any Git command.
     */
    public function command(string $path, string $command): ?string
    {
        return $this->git($path, $command);
    }

    /**
     * Read PHP version from composer.json.
     */
    public function phpVersion(string $directory): ?string
    {
        $composer = $directory . DIRECTORY_SEPARATOR . 'composer.json';

        if (!File::exists($composer)) {
            return null;
        }

        $json = json_decode(File::get($composer), true);

        return $json['require']['php'] ?? null;
    }

    /**
     * Read Laravel version.
     */
    public function laravelVersion(string $directory): ?string
    {
        $composer = $directory . DIRECTORY_SEPARATOR . 'composer.json';

        if (!File::exists($composer)) {
            return null;
        }

        $json = json_decode(File::get($composer), true);

        return $json['require']['laravel/framework']
            ?? $json['require']['laravel/laravel']
            ?? null;
    }

    /**
     * Detect project type.
     */
    protected function projectType(string $directory): string
    {
        if (File::exists($directory . DIRECTORY_SEPARATOR . 'artisan')) {
            return 'Laravel';
        }

        if (File::exists($directory . DIRECTORY_SEPARATOR . 'package.json')) {
            return 'NodeJS';
        }

        if (File::exists($directory . DIRECTORY_SEPARATOR . 'composer.json')) {
            return 'PHP';
        }

        return 'Unknown';
    }

    /**
     * Get default branch.
     */
    protected function defaultBranch(string $directory): ?string
    {
        $branch = $this->git(
            $directory,
            'git symbolic-ref refs/remotes/origin/HEAD'
        );

        if (!$branch) {
            return null;
        }

        return basename($branch);
    }

    /**
     * Get Git status.
     */
    protected function gitStatus(string $directory): string
    {
        $status = $this->git($directory, 'git status --porcelain');

        return empty($status) ? 'Clean' : 'Modified';
    }

    /**
     * Extract GitHub owner.
     */
    protected function repositoryOwner(?string $repository): ?string
    {
        if (!$repository) {
            return null;
        }

        if (preg_match('/github\.com[:\/]([^\/]+)\//', $repository, $matches)) {
            return $matches[1];
        }

        return null;
    }

    /**
     * Extract repository name.
     */
    protected function repositoryName(?string $repository): ?string
    {
        if (!$repository) {
            return null;
        }

        $name = basename($repository);

        return str_replace('.git', '', $name);
    }

    public function composerPackages(string $path): array
    {
        $lock = $path . DIRECTORY_SEPARATOR . 'composer.lock';

        if (!File::exists($lock)) {

            return [];
        }

        $json = json_decode(

            File::get($lock),

            true

        );

        return $json['packages'] ?? [];
    }

    public function composerShow(string $path): ?string
    {
        return $this->command(

            $path,

            'composer show'

        );
    }

    public function composerUpdate(string $path): ?string
    {
        return $this->command(

            $path,

            'composer update'

        );
    }

    public function composerDumpAutoload(string $path): ?string
    {
        return $this->command(

            $path,

            'composer dump-autoload'

        );
    }

    public function composerVersion(): ?string
    {
        $process = Process::fromShellCommandline(
            'composer --version'
        );

        $process->run();

        return $process->isSuccessful()
            ? trim($process->getOutput())
            : null;
    }

    public function composerJson(string $path): array
    {
        $file = $path . DIRECTORY_SEPARATOR . 'composer.json';

        if (!File::exists($file)) {

            return [];
        }

        return json_decode(
            File::get($file),
            true
        ) ?? [];
    }

    public function autoloadExists(string $path): bool
    {
        return File::exists(

            $path
                . DIRECTORY_SEPARATOR
                . 'vendor'
                . DIRECTORY_SEPARATOR
                . 'autoload.php'

        );
    }

    public function vendorExists(string $path): bool
    {
        return File::isDirectory(

            $path . DIRECTORY_SEPARATOR . 'vendor'

        );
    }

    public function composerLockExists(string $path): bool
    {
        return File::exists(

            $path . DIRECTORY_SEPARATOR . 'composer.lock'

        );
    }
}
