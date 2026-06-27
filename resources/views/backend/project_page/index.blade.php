@extends('adminlte::page')

@section('title', 'Projects')

@section('content')

    <div class="row">

        <div class="col-md-3">

            <div class="small-box bg-primary">

                <div class="inner">

                    <h3>{{ $projects->count() }}</h3>

                    <p>Total Projects</p>

                </div>

                <div class="icon">

                    <i class="fas fa-project-diagram"></i>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="small-box bg-success">

                <div class="inner">

                    <h3>{{ $projects->where('is_active', 1)->count() }}</h3>

                    <p>Active</p>

                </div>

                <div class="icon">

                    <i class="fas fa-check-circle"></i>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="small-box bg-warning">

                <div class="inner">

                    <h3>{{ $projects->where('is_active', 0)->count() }}</h3>

                    <p>Inactive</p>

                </div>

                <div class="icon">

                    <i class="fas fa-pause-circle"></i>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="small-box bg-info">

                <div class="inner">

                    <h3>{{ $projects->count() }}</h3>

                    <p>Environments</p>

                </div>

                <div class="icon">

                    <i class="fas fa-server"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="card card-outline card-primary">

        <div class="card-header">

            <h3 class="card-title">

                Laravel Projects

            </h3>

            <div class="card-tools">

                <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm">

                    <i class="fas fa-plus"></i>

                    Add Project

                </a>

            </div>

        </div>

        <div class="card-body">

            <table class="table table-hover" id="dataTables">

                <thead>

                    <tr>

                        <th>Project</th>
                        <th>Domain</th>
                        <th>Branch</th>
                        <th>Git Status</th>
                        <th>PHP</th>
                        <th>Laravel</th>
                        <th>Health</th>
                        <th>Status</th>
                        <th>Last Commit</th>
                        <th width="180">Actions</th>

                    </tr>

                </thead>
                <tbody>

                    @forelse($projects as $project)
                        <tr>

                            {{-- Project --}}
                            <td>
                                <div>
                                    <strong>{{ $project->name }}</strong><br>

                                    <small class="text-muted">
                                        {{ $project->project_type ?? 'Unknown' }}
                                    </small>
                                </div>
                            </td>

                            {{-- Domain --}}
                            <td>
                                @if ($project->domain)
                                    <a href="https://{{ $project->domain }}" target="_blank">
                                        {{ $project->domain }}
                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>

                            {{-- Git Branch --}}
                            <td>
                                <span class="badge badge-primary">
                                    <i class="fas fa-code-branch"></i>
                                    {{ $project->git_branch ?? '-' }}
                                </span>
                            </td>

                            {{-- Git Status --}}
                            <td>

                                @switch($project->git_status)
                                    @case('Clean')
                                        <span class="badge badge-success">
                                            Clean
                                        </span>
                                    @break

                                    @case('Modified')
                                        <span class="badge badge-warning">
                                            Modified
                                        </span>
                                    @break

                                    @default
                                        <span class="badge badge-secondary">
                                            Unknown
                                        </span>
                                @endswitch

                            </td>

                            {{-- PHP --}}
                            <td>

                                <span class="badge badge-info">

                                    {{ $project->php_version ?? '-' }}

                                </span>

                            </td>

                            {{-- Laravel --}}
                            <td>

                                <span class="badge badge-danger">

                                    {{ $project->laravel_version ?? '-' }}

                                </span>

                            </td>

                            {{-- Health --}}
                            <td>

                                @php

                                    $score = optional($project->health)->health_score ?? 0;

                                @endphp

                                <div class="progress progress-xs">

                                    <div class="progress-bar

                @if ($score >= 90) bg-success

                @elseif($score >= 70)

                    bg-warning

                @else

                    bg-danger @endif"
                                        style="width:{{ $score }}%">

                                    </div>

                                </div>

                                {{ $score }}%

                            </td>

                            {{-- Active --}}
                            <td>

                                @if ($project->is_active)
                                    <span class="badge badge-success">

                                        Active

                                    </span>
                                @else
                                    <span class="badge badge-danger">

                                        Inactive

                                    </span>
                                @endif

                            </td>

                            {{-- Last Commit --}}
                            <td>

                                @if ($project->last_commit_date)
                                    <small>

                                        {{ \Carbon\Carbon::parse($project->last_commit_date)->diffForHumans() }}

                                    </small>
                                @else
                                    -
                                @endif

                            </td>

                            {{-- Actions --}}
                            <td>

                                <div class="btn-group">

                                    <a href="{{ route('projects.show', $project) }}" class="btn btn-xs btn-info">

                                        <i class="fas fa-eye"></i>

                                    </a>

                                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-xs btn-warning">

                                        <i class="fas fa-edit"></i>

                                    </a>

                                    <a href="{{ route('terminal.index', ['project' => $project->id]) }}"
                                        class="btn btn-xs btn-dark">

                                        <i class="fas fa-terminal"></i>

                                    </a>

                                    @if ($project->git_repository)
                                        <a href="{{ $project->git_repository }}" target="_blank"
                                            class="btn btn-xs btn-secondary">

                                            <i class="fab fa-github"></i>

                                        </a>
                                    @endif

                                </div>

                            </td>

                        </tr>

                        @empty

                            <tr>

                                <td colspan="10" class="text-center">

                                    No Projects Found

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body" style="height:50px;"> <!-- spacing card --> </div>
        </div>
    @endsection
