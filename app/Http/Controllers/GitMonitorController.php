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

        // if (!$gitPath) {

        //     abort(
        //         404,
        //         'Local Git repository not found.'
        //     );
        // }

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
    private function loadGitInformation(Project $project, ?string $gitPath): array
    {

        if (blank($gitPath) || ! is_dir($gitPath)) {

            return [

                'health' => 0,

                'status' => 'Repository Not Found',

                'repository' => false,

                'connected' => false,

                'working_tree' => false,

                'fetch_ok' => false,

                'push_access' => false,

                'repository_name' => $project->name,

                'repository_path' => '-',

                'repository_size' => '-',

                'git_version' => '-',

                'branch' => '-',

                'default_branch' => '-',

                'default_remote_branch' => '-',

                'branch_count' => 0,

                'commit_count' => 0,

                'tag_count' => 0,

                'latest_commit' => false,

                'last_hash' => '-',

                'last_message' => '-',

                'last_date' => '-',

                'last_commit_author' => '-',

                'last_commit_email' => '-',

                'head' => '-',

                'local_branches' => collect(),

                'remote_branches' => collect(),

                'remote_name' => '-',

                'fetch_url' => '-',

                'push_url' => '-',

                'remote_url' => $project->git_repository,

                'contributors' => collect(),

                'total_contributors' => 0,

            ];
        }

        /*
    |--------------------------------------------------------------------------
    | Basic Repository
    |--------------------------------------------------------------------------
    */

        $repositoryExists = is_dir(
            $gitPath . DIRECTORY_SEPARATOR . '.git'
        );

        if (! $repositoryExists) {

            return [

                'repository' => false,

                'status' => 'Missing',

                'health' => 0,

            ];
        }

        /*
    |--------------------------------------------------------------------------
    | Git Commands
    |--------------------------------------------------------------------------
    */

        $branch = $this->runGitCommand(
            $gitPath,
            'git branch --show-current'
        );

        $lastHash = $this->runGitCommand(
            $gitPath,
            'git rev-parse --short HEAD'
        );

        $head = $this->runGitCommand(
            $gitPath,
            'git rev-parse HEAD'
        );

        $lastMessage = $this->runGitCommand(
            $gitPath,
            'git log -1 --pretty=%s'
        );

        $lastDate = $this->runGitCommand(
            $gitPath,
            'git log -1 --date=local --pretty=%cd'
        );

        $lastCommitAuthor = $this->runGitCommand(
            $gitPath,
            'git log -1 --pretty=%an'
        );

        $lastCommitEmail = $this->runGitCommand(
            $gitPath,
            'git log -1 --pretty=%ae'
        );

        $gitVersion = $this->runGitCommand(
            $gitPath,
            'git --version'
        );

        $status = $this->runGitCommand(
            $gitPath,
            'git status --porcelain'
        );

        $workingTree = empty($status);

        /*
    |--------------------------------------------------------------------------
    | Branches
    |--------------------------------------------------------------------------
    */

        $localBranches = collect(

            explode(
                PHP_EOL,
                $this->runGitCommand(
                    $gitPath,
                    'git branch --format="%(refname:short)"'
                ) ?? ''
            )

        )->filter()->values();

        $remoteBranches = collect(

            explode(
                PHP_EOL,
                $this->runGitCommand(
                    $gitPath,
                    'git branch -r --format="%(refname:short)"'
                ) ?? ''
            )

        )->filter()->values();

        $branchCount = $localBranches->count();

        /*
    |--------------------------------------------------------------------------
    | Commits
    |--------------------------------------------------------------------------
    */

        $commitCount = (int) (

            $this->runGitCommand(
                $gitPath,
                'git rev-list --count HEAD'
            ) ?? 0

        );

        /*
    |--------------------------------------------------------------------------
    | Tags
    |--------------------------------------------------------------------------
    */

        $tags = collect(

            explode(
                PHP_EOL,
                $this->runGitCommand(
                    $gitPath,
                    'git tag'
                ) ?? ''
            )

        )->filter();

        /*
    |--------------------------------------------------------------------------
    | Contributors
    |--------------------------------------------------------------------------
    */

        $contributors = collect(

            explode(
                PHP_EOL,
                $this->runGitCommand(
                    $gitPath,
                    'git shortlog -sn --all'
                ) ?? ''
            )

        )->filter();

        /*
    |--------------------------------------------------------------------------
    | Remote
    |--------------------------------------------------------------------------
    */

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

        /*
    |--------------------------------------------------------------------------
    | Return
    |--------------------------------------------------------------------------
    */

        return [

            'health' => $workingTree ? 100 : 80,

            'status' => $workingTree
                ? 'Clean'
                : 'Modified',

            'repository' => true,

            'connected' => filled($fetchUrl),

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

            // Disable for now (slow)
            'repository_size' => '-',

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

            'tag_count' => $tags->count(),

            /*
        |--------------------------------------------------------------------------
        | Commit
        |--------------------------------------------------------------------------
        */

            'latest_commit' => filled($lastHash),

            'last_hash' => $lastHash,

            'last_message' => $lastMessage,

            'last_date' => $lastDate,

            'last_commit_author' => $lastCommitAuthor,

            'last_commit_email' => $lastCommitEmail,

            'head' => $head,

            /*
        |--------------------------------------------------------------------------
        | Branches
        |--------------------------------------------------------------------------
        */

            'local_branches' => $localBranches,

            'remote_branches' => $remoteBranches,

            /*
        |--------------------------------------------------------------------------
        | Remote
        |--------------------------------------------------------------------------
        */

            'remote_name' => $remoteName ?: 'origin',

            'fetch_url' => $fetchUrl,

            'push_url' => $pushUrl,

            'remote_url' => $fetchUrl,

            /*
        |--------------------------------------------------------------------------
        | Contributors
        |--------------------------------------------------------------------------
        */

            'contributors' => $contributors,

            'total_contributors' => $contributors->count(),

        ];
    }
    /**
     * Repository Status
     */
    /**
     * Get repository working tree status.
     */
    private function getRepositoryStatus(?string $gitPath): array
    {
        if (
            blank($gitPath) ||
            ! is_dir($gitPath) ||
            ! is_dir($gitPath . DIRECTORY_SEPARATOR . '.git')
        ) {

            return [

                'exists' => false,

                'clean' => false,

                'status' => 'Repository Not Found',

                'badge' => 'danger',

                'icon' => 'fas fa-times-circle',

                'files' => collect(),

            ];
        }

        $status = $this->runGitCommand(
            $gitPath,
            'git status --porcelain'
        );

        if ($status === null) {

            return [

                'exists' => true,

                'clean' => false,

                'status' => 'Git Error',

                'badge' => 'danger',

                'icon' => 'fas fa-exclamation-circle',

                'files' => collect(),

            ];
        }

        $files = collect(
            preg_split('/\r\n|\r|\n/', trim($status))
        )
            ->filter()
            ->values();

        $clean = $files->isEmpty();

        return [

            'exists' => true,

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

            'files' => $files,

        ];
    }

    private function resolveRepositoryPath(Project $project): ?string
    {
        $root = 'E:\\laragon\\www';

        if (! File::isDirectory($root)) {
            return null;
        }

        $repository = basename(
            $project->git_repository,
            '.git'
        );

        foreach (File::directories($root) as $directory) {

            if (! File::isDirectory(
                $directory . DIRECTORY_SEPARATOR . '.git'
            )) {
                continue;
            }

            /*
        |--------------------------------------------------------------------------
        | Exact repository folder
        |--------------------------------------------------------------------------
        */

            if (
                strcasecmp(
                    basename($directory),
                    $repository
                ) === 0
            ) {
                return realpath($directory);
            }

            /*
        |--------------------------------------------------------------------------
        | Verify remote url
        |--------------------------------------------------------------------------
        */

            $remote = $this->runGitCommand(

                $directory,

                'git remote get-url origin'

            );

            if (

                filled($remote)

                &&

                filled($project->git_repository)

                &&

                trim($remote) === trim($project->git_repository)

            ) {

                return realpath($directory);
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

    private function loadLatestCommits(?string $gitPath): array
    {
        if (! $this->validateRepository($gitPath)) {
            return [];
        }

        $output = $this->runGitCommand(
            $gitPath,
            'git log -10 --pretty=format:"%h|%an|%ae|%ad|%s" --date=relative'
        );

        if (blank($output)) {
            return [];
        }

        return collect(explode(PHP_EOL, $output))
            ->map(function ($line) {

                $parts = explode('|', $line, 5);

                if (count($parts) < 5) {
                    return null;
                }

                return [

                    'hash' => $parts[0],

                    'author' => $parts[1],

                    'email' => $parts[2],

                    'date' => $parts[3],

                    'message' => $parts[4],

                ];
            })
            ->filter()
            ->values()
            ->toArray();
    }

    private function loadBranches(?string $gitPath): array
    {
        if (! $this->validateRepository($gitPath)) {

            return [

                'local' => [],

                'remote' => [],

            ];
        }

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
                preg_split('/\r\n|\r|\n/', $local ?? '')
            )
                ->filter()
                ->values()
                ->toArray(),

            'remote' => collect(
                preg_split('/\r\n|\r|\n/', $remote ?? '')
            )
                ->filter()
                ->values()
                ->toArray(),

        ];
    }

    private function loadContributors(?string $gitPath): array
    {
        if (! $this->validateRepository($gitPath)) {
            return [];
        }

        $output = $this->runGitCommand(
            $gitPath,
            'git shortlog -sn --all'
        );

        if (blank($output)) {
            return [];
        }

        return collect(explode(PHP_EOL, $output))
            ->map(function ($line) {

                if (
                    preg_match(
                        '/^\s*(\d+)\s+(.*)$/',
                        $line,
                        $match
                    )
                ) {

                    return [

                        'commits' => (int) $match[1],

                        'author' => trim($match[2]),

                    ];
                }

                return null;
            })
            ->filter()
            ->values()
            ->toArray();
    }

    private function loadWorkingTree(?string $gitPath): array
    {
        if (! $this->validateRepository($gitPath)) {

            return [

                'clean' => false,

                'files' => [],

            ];
        }

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

        $files = collect(explode(PHP_EOL, $output))
            ->filter()
            ->map(function ($line) {

                return [

                    'status' => trim(substr($line, 0, 2)),

                    'file' => trim(substr($line, 3)),

                ];
            })
            ->values()
            ->toArray();

        return [

            'clean' => empty($files),

            'files' => $files,

        ];
    }

    private function loadRepositoryHealth(
        ?string $gitPath,
        array $repositoryStatus
    ): array {

        if (! $this->validateRepository($gitPath)) {

            return [

                'score' => 0,

                'repository_exists' => false,

                'working_tree' => false,

                'remote_connected' => false,

                'branch_exists' => false,

                'git_installed' => false,

                'git_version' => null,

            ];
        }

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

        if ($repositoryStatus['exists'] ?? false) {
            $score += 30;
        }

        if ($repositoryStatus['clean'] ?? false) {
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

            'repository_exists' => true,

            'working_tree' => $repositoryStatus['clean'],

            'remote_connected' => filled($remote),

            'branch_exists' => filled($branch),

            'git_installed' => filled($gitVersion),

            'git_version' => $gitVersion,

        ];
    }

    private function validateRepository(?string $gitPath): bool
    {
        return filled($gitPath)
            && is_dir($gitPath)
            && is_dir($gitPath . DIRECTORY_SEPARATOR . '.git');
    }
}
