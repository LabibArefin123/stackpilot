<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\File;
use App\Services\GitRepositoryScanner;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(GitRepositoryScanner $scanner)
    {
        $projects = Project::orderBy('name')->get();

        $gitLogs = [];

        foreach ($scanner->repositories() as $repository) {

            $output = $scanner->command(
                $repository,
                'git log -10 --pretty=format:"%h|%an|%ad|%s" --date=relative'
            );

            if (blank($output)) {
                continue;
            }

            $branch = $scanner->command(
                $repository,
                'git branch --show-current'
            );

            foreach (explode(PHP_EOL, $output) as $line) {

                $parts = explode('|', $line, 4);

                if (count($parts) < 4) {
                    continue;
                }

                $gitLogs[] = [

                    'project' => basename($repository),

                    'branch' => $branch,

                    'hash' => $parts[0],

                    'author' => $parts[1],

                    'date' => $parts[2],

                    'message' => $parts[3],

                ];
            }
        }

        usort($gitLogs, function ($a, $b) {
            return strcmp($b['date'], $a['date']);
        });

        $serverLogs = [];

        return view(
            'backend.log_page.index',
            compact(
                'projects',
                'gitLogs',
                'serverLogs'
            )
        );
    }
}