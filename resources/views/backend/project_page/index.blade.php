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

                <h3>{{ $projects->where('is_active',1)->count() }}</h3>

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

                <h3>{{ $projects->where('is_active',0)->count() }}</h3>

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

            <a href="{{ route('projects.create') }}"
               class="btn btn-primary btn-sm">

                <i class="fas fa-plus"></i>

                Add Project

            </a>

        </div>

    </div>

    <div class="card-body p-0">

        <table class="table table-hover">

            <thead>

                <tr>

                    <th>Name</th>

                    <th>Domain</th>

                    <th>Environment</th>

                    <th>PHP</th>

                    <th>Laravel</th>

                    <th>Health</th>

                    <th>Status</th>

                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

            @forelse($projects as $project)

                <tr>

                    <td>

                        <strong>{{ $project->name }}</strong>

                    </td>

                    <td>

                        <a href="https://{{ $project->domain }}"
                           target="_blank">

                            {{ $project->domain }}

                        </a>

                    </td>

                    <td>

                        @if($project->environment)

                            <span class="badge badge-info">

                                {{ ucfirst($project->environment->environment) }}

                            </span>

                        @endif

                    </td>

                    <td>

                        {{ $project->environment->php_version ?? '-' }}

                    </td>

                    <td>

                        {{ $project->environment->laravel_version ?? '-' }}

                    </td>

                    <td>

                        @php

                            $score = optional($project->health)->health_score ?? 0;

                        @endphp

                        <div class="progress progress-xs">

                            <div class="progress-bar

                                @if($score>=90)

                                    bg-success

                                @elseif($score>=70)

                                    bg-warning

                                @else

                                    bg-danger

                                @endif"

                                style="width:{{ $score }}%">

                            </div>

                        </div>

                        {{ $score }}%

                    </td>

                    <td>

                        @if($project->is_active)

                            <span class="badge badge-success">

                                Active

                            </span>

                        @else

                            <span class="badge badge-danger">

                                Inactive

                            </span>

                        @endif

                    </td>

                    <td>

                        <div class="btn-group">

                            <a href="{{ route('projects.show',$project) }}"
                               class="btn btn-xs btn-info">

                                <i class="fas fa-eye"></i>

                            </a>

                            <a href="{{ route('projects.edit',$project) }}"
                               class="btn btn-xs btn-warning">

                                <i class="fas fa-edit"></i>

                            </a>

                            <a href="{{ route('terminal.index',['project'=>$project->id]) }}"
                               class="btn btn-xs btn-dark">

                                <i class="fas fa-terminal"></i>

                            </a>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8"
                        class="text-center">

                        No Projects Found

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="card-footer">

        {{ $projects->links() }}

    </div>

</div>

@endsection