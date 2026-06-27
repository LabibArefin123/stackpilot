<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Services\GitRepositoryScanner;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;
use Illuminate\Support\Str;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use FilesystemIterator;

class GitMonitorController extends Controller
{
    /**
     * Git Dashboard
     */
    public function index(GitRepositoryScanner $scanner)
    {
        $scanner->scan();

        $projects = Project::with([
            'environment',
            'health'
        ])->get();

        return view(
            'backend.git_page.index',
            compact('projects')
        );
    }
    /**
     * Repository Details
     */
    public function show(Project $project)
    {
        $project->load([
            'environment',
            'health',
        ]);

        $gitPath = $this->resolveRepositoryPath($project);

        if (!$gitPath) {

            abort(
                404,
                'Git repository could not be found.'
            );
        }

        $git = $this->loadGitInformation($project, $gitPath);

        $repositoryStatus = $this->getRepositoryStatus($gitPath);

        $commits = $this->loadLatestCommits($gitPath);

        $branches = $this->loadBranches($gitPath);

        $contributors = $this->loadContributors($gitPath);

        $workingTree = $this->loadWorkingTree($gitPath);

        $repositoryHealth = $this->loadRepositoryHealth(
            $gitPath,
            $repositoryStatus
        );

        return view('backend.git_page.show', compact(
            'project',
            'git',
            'repositoryStatus',
            'commits',
            'branches',
            'contributors',
            'workingTree',
            'repositoryHealth'
        ));
    }

    
    /**
     * Execute Git Command
     */
    private function runGitCommand(string $path, string $command): ?string
    {
        if (! is_dir($path)) {
            return null;
        }

        if (! is_dir($path . '/.git')) {
            return null;
        }

        $process = Process::fromShellCommandline($command, $path);

        $process->setTimeout(20);

        $process->run();

        if (! $process->isSuccessful()) {
            return null;
        }

        return trim($process->getOutput());
    }

    /**
     * Load complete Git repository information.
     */
    private function loadGitInformation(Project $project, string $gitPath): array
    {
        $branch = $this->runGitCommand(
            $gitPath,
            'git branch --show-current'
        );

        $lastHash = $this->runGitCommand(
            $gitPath,
            'git rev-parse --short HEAD'
        );

        $lastMessage = $this->runGitCommand(
            $gitPath,
            'git log -1 --pretty=%s'
        );

        $lastDate = $this->runGitCommand(
            $gitPath,
            'git log -1 --date=local --pretty=%cd'
        );

        $gitVersion = $this->runGitCommand(
            $gitPath,
            'git --version'
        );

        $branchCount = (int) (
            $this->runGitCommand(
                $gitPath,
                'git branch --list | wc -l'
            ) ?? 0
        );

        $commitCount = (int) (
            $this->runGitCommand(
                $gitPath,
                'git rev-list --count HEAD'
            ) ?? 0
        );

        $status = $this->runGitCommand(
            $gitPath,
            'git status --porcelain'
        );

        $workingTree = empty($status);

        $localBranches = $this->runGitCommand(
            $gitPath,
            'git branch --format="%(refname:short)"'
        );

        $remoteBranches = $this->runGitCommand(
            $gitPath,
            'git branch -r --format="%(refname:short)"'
        );

        $remoteName = $this->runGitCommand(
            $gitPath,
            'git remote'
        );

        $fetchUrl = $this->runGitCommand(
            $gitPath,
            'git remote get-url origin'
        );

        $pushUrl = $this->runGitCommand(
            $gitPath,
            'git remote get-url --push origin'
        );

        $defaultRemoteBranch = $this->runGitCommand(
            $gitPath,
            'git symbolic-ref refs/remotes/origin/HEAD'
        );

        $contributors = $this->runGitCommand(
            $gitPath,
            'git shortlog -sn --all'
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

        $tagCount = (int) (
            $this->runGitCommand(
                $gitPath,
                'git tag | wc -l'
            ) ?? 0
        );

        $currentHead = $this->runGitCommand(
            $gitPath,
            'git rev-parse HEAD'
        );

        $repositoryExists = is_dir(
            $gitPath . DIRECTORY_SEPARATOR . '.git'
        );

        return [

            /*
        |--------------------------------------------------------------------------
        | Health
        |--------------------------------------------------------------------------
        */

            'health' => $workingTree ? 100 : 80,

            'status' => $workingTree
                ? 'Clean'
                : 'Modified',

            'repository' => $repositoryExists,

            'connected' => filled($remoteName),

            'working_tree' => $workingTree,

            'fetch_ok' => filled($fetchUrl),

            'push_access' => filled($pushUrl),

            /*
        |--------------------------------------------------------------------------
        | Repository
        |--------------------------------------------------------------------------
        */

            'repository_name' => basename($gitPath),

            'repository_path' => $gitPath,

            'repository_size' => $this->getRepositorySize($gitPath),

            'remote_url' => $project->git_repository,

            /*
        |--------------------------------------------------------------------------
        | Git
        |--------------------------------------------------------------------------
        */

            'git_version' => $gitVersion,

            'branch' => $branch,

            'default_branch' => $branch,

            'default_remote_branch' => str_replace(
                'refs/remotes/origin/',
                '',
                $defaultRemoteBranch
            ),

            'branch_count' => $branchCount,

            'commit_count' => $commitCount,

            'tag_count' => $tagCount,

            /*
        |--------------------------------------------------------------------------
        | Latest Commit
        |--------------------------------------------------------------------------
        */

            'latest_commit' => filled($lastHash),

            'last_hash' => $lastHash,

            'last_message' => $lastMessage,

            'last_date' => $lastDate,

            'last_commit_author' => $lastCommitAuthor,

            'last_commit_email' => $lastCommitEmail,

            'head' => $currentHead,

            /*
        |--------------------------------------------------------------------------
        | Branches
        |--------------------------------------------------------------------------
        */

            'local_branches' => collect(
                explode(PHP_EOL, $localBranches ?? '')
            )
                ->filter()
                ->values(),

            'remote_branches' => collect(
                explode(PHP_EOL, $remoteBranches ?? '')
            )
                ->filter()
                ->values(),

            /*
        |--------------------------------------------------------------------------
        | Remote
        |--------------------------------------------------------------------------
        */

            'remote_name' => $remoteName ?: 'origin',

            'fetch_url' => $fetchUrl,

            'push_url' => $pushUrl,

            /*
        |--------------------------------------------------------------------------
        | Contributors
        |--------------------------------------------------------------------------
        */

            'total_contributors' => $totalContributors,

        ];
    }
    /**
     * Repository Status
     */
    private function getRepositoryStatus(string $gitPath): array
    {
        $status = $this->runGitCommand(
            $gitPath,
            'git status --porcelain'
        );

        $clean = empty($status);

        return [

            'clean' => $clean,

            'status' => $clean
                ? 'Clean'
                : 'Modified',

            'badge' => $clean
                ? 'success'
                : 'warning',

            'icon' => $clean
                ? 'fas fa-check-circle'
                : 'fas fa-exclamation-triangle',

            'files' => $status
                ? collect(explode(PHP_EOL, $status))
                : collect(),

        ];
    }
    
    private function resolveRepositoryPath(Project $project): ?string
    {
        $roots = [

            'E:\\laragon\\www',

            'D:\\laragon\\www',

            base_path('..'),

        ];

        /*
    |--------------------------------------------------------------------------
    | Candidate folder names
    |--------------------------------------------------------------------------
    */

        $folders = array_unique([

            $project->repository_folder,

            $project->slug,

            Str::slug($project->name, '_'),

            Str::snake($project->name),

            basename($project->git_repository, '.git'),

        ]);

        foreach ($roots as $root) {

            foreach ($folders as $folder) {

                if (blank($folder)) {
                    continue;
                }

                $path = $root . DIRECTORY_SEPARATOR . $folder;

                if (is_dir($path . DIRECTORY_SEPARATOR . '.git')) {

                    return realpath($path);
                }
            }
        }

        return null;
    }
    /**
     * Repository Size
     */
    private function getRepositorySize(string $path): string
    {
        if (! is_dir($path)) {
            return '-';
        }

        $folders = [

            'app',

            'bootstrap',

            'config',

            'database',

            'public',

            'resources',

            'routes',

            'tests',

        ];

        $files = [

            'artisan',

            'composer.json',

            'composer.lock',

            'package.json',

            'package-lock.json',

            'vite.config.js',

            '.env.example',

        ];

        $size = 0;

        foreach ($folders as $folder) {

            $folderPath = $path . DIRECTORY_SEPARATOR . $folder;

            if (! is_dir($folderPath)) {
                continue;
            }

            $size += $this->directorySize($folderPath);
        }

        foreach ($files as $file) {

            $filePath = $path . DIRECTORY_SEPARATOR . $file;

            if (is_file($filePath)) {

                $size += filesize($filePath);
            }
        }

        return $this->formatBytes($size);
    }

    private function directorySize(string $directory): int
    {
        $size = 0;

        $iterator = new RecursiveIteratorIterator(

            new RecursiveDirectoryIterator(
                $directory,
                FilesystemIterator::SKIP_DOTS
            ),

            RecursiveIteratorIterator::LEAVES_ONLY

        );

        foreach ($iterator as $file) {

            if ($file->isFile()) {

                $size += $file->getSize();
            }
        }

        return $size;
    }

    private function formatBytes(int $bytes): string
    {
        if ($bytes <= 0) {
            return '0 B';
        }

        $units = [

            'B',

            'KB',

            'MB',

            'GB',

            'TB',

        ];

        $power = floor(log($bytes, 1024));

        return number_format(

            $bytes / pow(1024, $power),

            2

        ) . ' ' . $units[$power];
    }

    private function loadLatestCommits(string $gitPath): array
    {
        $output = $this->runGitCommand(
            $gitPath,
            'git log -10 --pretty=format:"%h|%an|%ae|%ad|%s" --date=relative'
        );

        if (blank($output)) {
            return [];
        }

        $commits = [];

        foreach (explode(PHP_EOL, $output) as $line) {

            $parts = explode('|', $line, 5);

            if (count($parts) < 5) {
                continue;
            }

            $commits[] = [

                'hash' => $parts[0],

                'author' => $parts[1],

                'email' => $parts[2],

                'date' => $parts[3],

                'message' => $parts[4],

            ];
        }

        return $commits;
    }

    private function loadBranches(string $gitPath): array
    {
        $local = $this->runGitCommand(
            $gitPath,
            'git branch --format="%(refname:short)"'
        );

        $remote = $this->runGitCommand(
            $gitPath,
            'git branch -r --format="%(refname:short)"'
        );

        return [

            'local' => collect(
                explode(PHP_EOL, $local ?? '')
            )
                ->filter()
                ->values()
                ->toArray(),

            'remote' => collect(
                explode(PHP_EOL, $remote ?? '')
            )
                ->filter()
                ->values()
                ->toArray(),

        ];
    }

    private function loadContributors(string $gitPath): array
    {
        $output = $this->runGitCommand(
            $gitPath,
            'git shortlog -sn --all'
        );

        if (blank($output)) {
            return [];
        }

        $contributors = [];

        foreach (explode(PHP_EOL, $output) as $line) {

            if (preg_match('/^\s*(\d+)\s+(.*)$/', $line, $match)) {

                $contributors[] = [

                    'commits' => (int) $match[1],

                    'author' => trim($match[2]),

                ];
            }
        }

        return $contributors;
    }

    private function loadWorkingTree(string $gitPath): array
    {
        $output = $this->runGitCommand(
            $gitPath,
            'git status --porcelain'
        );

        if (blank($output)) {

            return [

                'clean' => true,

                'files' => [],

            ];
        }

        $files = [];

        foreach (explode(PHP_EOL, $output) as $line) {

            if (trim($line) == '') {
                continue;
            }

            $status = trim(substr($line, 0, 2));

            $file = trim(substr($line, 3));

            $files[] = [

                'status' => $status,

                'file' => $file,

            ];
        }

        return [

            'clean' => false,

            'files' => $files,

        ];
    }

    private function loadRepositoryHealth(
        string $gitPath,
        array $repositoryStatus
    ): array {

        $repositoryExists = is_dir(
            $gitPath . DIRECTORY_SEPARATOR . '.git'
        );

        $remote = $this->runGitCommand(
            $gitPath,
            'git remote'
        );

        $branch = $this->runGitCommand(
            $gitPath,
            'git branch --show-current'
        );

        $gitVersion = $this->runGitCommand(
            $gitPath,
            'git --version'
        );

        $score = 0;

        if ($repositoryExists) {

            $score += 30;
        }

        if ($repositoryStatus['clean']) {

            $score += 30;
        }

        if (filled($remote)) {

            $score += 20;
        }

        if (filled($branch)) {

            $score += 20;
        }

        return [

            'score' => $score,

            'repository_exists' => $repositoryExists,

            'working_tree' => $repositoryStatus['clean'],

            'remote_connected' => filled($remote),

            'branch_exists' => filled($branch),

            'git_installed' => filled($gitVersion),

            'git_version' => $gitVersion,

        ];
    }
}
