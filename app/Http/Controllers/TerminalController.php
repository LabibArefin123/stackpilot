<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectHealth;
use App\Models\TerminalCommand;

class TerminalController extends Controller
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
}
