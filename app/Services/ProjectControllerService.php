<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;

class ProjectControllerService
{
    public function runGitCommand($path, $command)
    {
        if (empty($path) || !is_dir($path)) {
            return null;
        }

        if (!is_dir($path . DIRECTORY_SEPARATOR . '.git')) {
            return null;
        }

        $process = Process::fromShellCommandline($command, $path);

        $process->setTimeout(30);

        $process->run();

        if (!$process->isSuccessful()) {
            return null;
        }

        return trim($process->getOutput());
    }

    public function loadGitInformation(Project $project, $gitPath)
    {
        $branch = $this->runGitCommand($gitPath, 'git branch --show-current');

        $lastHash = $this->runGitCommand($gitPath, 'git rev-parse --short HEAD');

        $lastMessage = $this->runGitCommand($gitPath, 'git log -1 --pretty=%s');

        $lastDate = $this->runGitCommand($gitPath, 'git log -1 --date=local --pretty=%cd');

        $gitVersion = $this->runGitCommand($gitPath, 'git --version');

        $branchCount = (int)$this->runGitCommand($gitPath, 'git branch --list | wc -l');

        $commitCount = (int)$this->runGitCommand($gitPath, 'git rev-list --count HEAD');

        $status = $this->runGitCommand($gitPath, 'git status --porcelain');

        $clean = empty($status);

        $localBranches = $this->runGitCommand($gitPath, 'git branch --format="%(refname:short)"');

        $remoteBranches = $this->runGitCommand($gitPath, 'git branch -r --format="%(refname:short)"');

        $remoteName = $this->runGitCommand($gitPath, 'git remote');

        $fetchUrl = $this->runGitCommand($gitPath, 'git remote get-url origin');

        $pushUrl = $this->runGitCommand($gitPath, 'git remote get-url --push origin');

        $defaultRemoteBranch = $this->runGitCommand(
            $gitPath,
            'git symbolic-ref refs/remotes/origin/HEAD'
        );

        $contributors = $this->runGitCommand(
            $gitPath,
            'git shortlog -sn'
        );

        $totalContributors = 0;

        if ($contributors) {

            $totalContributors = count(
                array_filter(
                    explode(PHP_EOL, $contributors)
                )
            );
        }

        $lastCommitAuthor = $this->runGitCommand(
            $gitPath,
            'git log -1 --pretty=%an'
        );

        $lastCommitEmail = $this->runGitCommand(
            $gitPath,
            'git log -1 --pretty=%ae'
        );
        return [

            'health' => $clean ? 100 : 80,

            'status' => $clean ? 'Clean' : 'Modified',

            'branch' => $branch,

            'commits' => $commitCount,

            'repository' => is_dir($gitPath . '/.git'),

            'remote' => filled($project->git_repository),

            'working_tree' => $clean,

            'branch_exists' => filled($branch),

            'latest_commit' => filled($lastHash),

            'connected' => filled($project->git_repository),

            'fetch_ok' => true,

            'push_access' => false,

            'repository_name' => basename($gitPath),

            'remote_url' => $project->git_repository,

            'last_hash' => $lastHash,

            'last_message' => $lastMessage,

            'last_date' => $lastDate,

            'git_version' => $gitVersion,

            'default_branch' => $branch,

            'branch_count' => $branchCount,

            'commit_count' => $commitCount,

            'local_branches' => collect(explode(PHP_EOL, $localBranches ?? ''))
                ->filter()
                ->values(),

            'remote_branches' => collect(explode(PHP_EOL, $remoteBranches ?? ''))
                ->filter()
                ->values(),

            'remote_name' => $remoteName ?: 'origin',

            'fetch_url' => $fetchUrl,

            'push_url' => $pushUrl,

            'default_remote_branch' => str_replace(
                'refs/remotes/origin/',
                '',
                $defaultRemoteBranch
            ),

            'total_contributors' => $totalContributors,

            'last_commit_author' => $lastCommitAuthor,

            'last_commit_email' => $lastCommitEmail,
        ];
    }

    public function loadTerminalStatistics(Project $project)
    {
        return [

            'total' => $project->commands()->count(),

            'success' => $project->commands()->where('success', 1)->count(),

            'failed' => $project->commands()->where('success', 0)->count(),

            'runtime' => number_format(

                $project->commands()->avg('execution_time') ?? 0,

                2

            )

        ];
    }

    public function loadLatestCommits($gitPath)
    {
        $commits = [];

        $process = Process::fromShellCommandline(

            'git log -10 --pretty=format:"%h|%an|%ad|%s" --date=relative',

            $gitPath

        );

        $process->run();

        if (!$process->isSuccessful()) {

            return [];
        }

        foreach (explode(PHP_EOL, $process->getOutput()) as $line) {

            if (trim($line) == '') continue;

            [$hash, $author, $date, $message] = explode('|', $line, 4);

            $commits[] = [

                'hash' => $hash,

                'author' => $author,

                'date' => $date,

                'message' => $message

            ];
        }

        return $commits;
    }

    public function loadDeployment(Project $project, array $git): array
    {
        $deployment = optional($project->deployment);

        return [

            'status' => $deployment->status ?? 'Pending',

            'method' => $deployment->method ?? 'Git Pull',

            'server' => $deployment->server
                ?? optional($project->environment)->server_name
                ?? php_uname('n'),

            'repository' => $git['remote_url'] ?? null,

            'branch' => $git['branch'] ?? null,

            'commit_hash' => $git['last_hash'] ?? null,

            'commit_message' => $git['last_message'] ?? null,

            'version' => $deployment->version,

            'release_version' => $deployment->release_version,

            'build_number' => $deployment->build_number,

            'build_duration' => $deployment->build_duration,

            'artifact_name' => $deployment->artifact_name,

            'git_pull_command' => $deployment->git_pull_command
                ?? 'git pull origin ' . ($git['branch'] ?? 'main'),

            'composer_install_command' => $deployment->composer_install_command
                ?? 'composer install --no-dev --optimize-autoloader',

            'npm_build_command' => $deployment->npm_build_command
                ?? 'npm run build',

            'migration_command' => $deployment->migration_command
                ?? 'php artisan migrate --force',

            'cache_clear_command' => $deployment->cache_clear_command
                ?? 'php artisan optimize',

            'success_count' => $deployment->success_count ?? 0,

            'failed_count' => $deployment->failed_count ?? 0,

            'deployed_at' => $deployment->deployed_at,

        ];
    }
}
