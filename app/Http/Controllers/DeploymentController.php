<?php

namespace App\Http\Controllers;

use App\Models\Deployment;
use Illuminate\Http\Request;

class DeploymentController extends Controller
{
    public function index()
    {
        $deployments = Deployment::with([

            'project',

            'project.environment',

            'project.health',

        ])
            ->whereHas('project', function ($query) {
                $query->where('project_type', 'Laravel');
            })
            ->latest('deployed_at')
            ->paginate(15);

        return view(
            'backend.deployment_page.index',
            compact('deployments')
        );
    }

    public function show(Deployment $deployment)
    {
        $deployment->load([
            'project',
            'project.environment',
            'project.health',
        ]);

        return view(
            'backend.deployment_page.show',
            compact('deployment')
        );
    }

    public function edit(Deployment $deployment)
    {
        $deployment->load([
            'project',
            'project.environment',
            'project.health',
        ]);

        return view(
            'backend.deployment_page.edit',
            compact('deployment')
        );
    }

    public function update(Request $request, Deployment $deployment)
    {
        $validated = $request->validate([

            'status' => 'nullable|string|max:50',

            'method' => 'nullable|string|max:255',

            'server' => 'nullable|string|max:255',

            'git_pull_command' => 'nullable|string|max:255',

            'composer_install_command' => 'nullable|string|max:255',

            'npm_build_command' => 'nullable|string|max:255',

            'migration_command' => 'nullable|string|max:255',

            'cache_clear_command' => 'nullable|string|max:255',

        ]);

        $deployment->update($validated);

        return redirect()
            ->route('deployments.index', $deployment)
            ->with('success', 'Deployment configuration updated successfully.');
    }
}
