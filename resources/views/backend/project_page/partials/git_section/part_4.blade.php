<div class="card-header">

    <h3 class="card-title">

        <i class="fas fa-bolt text-warning"></i>

        Quick Git Actions

    </h3>

</div>

<div class="card-body">

    @php

        $actions = [
            [
                'title' => 'Git Status',
                'command' => 'git_status',
                'color' => 'primary',
                'icon' => 'info-circle',
                'description' => 'View repository status',
            ],

            [
                'title' => 'Git Pull',
                'command' => 'git_pull',
                'color' => 'success',
                'icon' => 'download',
                'description' => 'Pull latest changes',
            ],

            [
                'title' => 'Git Fetch',
                'command' => 'git_fetch',
                'color' => 'info',
                'icon' => 'sync',
                'description' => 'Fetch remote updates',
            ],

            [
                'title' => 'Git Log',
                'command' => 'git_log',
                'color' => 'dark',
                'icon' => 'history',
                'description' => 'Recent commits',
            ],

            [
                'title' => 'Branches',
                'command' => 'git_branch',
                'color' => 'warning',
                'icon' => 'code-branch',
                'description' => 'List all branches',
            ],

            [
                'title' => 'Remote',
                'command' => 'git_remote',
                'color' => 'secondary',
                'icon' => 'network-wired',
                'description' => 'Remote repository',
            ],
        ];

    @endphp

    <div class="row">

        @foreach ($actions as $action)
            <div class="col-md-4 mb-3">

                <div class="card border">

                    <div class="card-body text-center">

                        <i class="fas fa-{{ $action['icon'] }} fa-2x text-{{ $action['color'] }} mb-3"></i>

                        <h5>

                            {{ $action['title'] }}

                        </h5>

                        <p class="text-muted">

                            {{ $action['description'] }}

                        </p>

                        <form method="POST" action="{{ route('terminal.run') }}">

                            @csrf

                            <input type="hidden" name="project_id" value="{{ $project->id }}">

                            <input type="hidden" name="command" value="{{ $action['command'] }}">

                            <button class="btn btn-{{ $action['color'] }} btn-block">

                                <i class="fas fa-play"></i>

                                Execute

                            </button>

                        </form>

                    </div>

                </div>

            </div>
        @endforeach

    </div>

</div>
