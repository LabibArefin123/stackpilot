@extends('adminlte::page')

@section('title', 'Deployment Details')

@section('content_header')

    <div class="d-flex justify-content-between align-items-center">

        <div>

            <h1 class="mb-1">

                <i class="fas fa-rocket text-primary mr-2"></i>

                {{ $deployment->project->name }}

            </h1>

            <small class="text-muted">

                Deployment Details

                @if ($deployment->project->git_branch)
                    • {{ $deployment->project->git_branch }}
                @endif

                @if ($deployment->server)
                    • {{ $deployment->server }}
                @endif

            </small>

        </div>

        <div>

            <a href="{{ route('deployments.edit', $deployment) }}" class="btn btn-warning">

                <i class="fas fa-edit"></i>

                Edit

            </a>

            <a href="{{ route('deployments.index') }}" class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>

                Back

            </a>

        </div>

    </div>

@stop

@section('content')

    <div class="row">

        <div class="col-md-3">

            <div
                class="small-box
            {{ $deployment->status == 'success'
                ? 'bg-success'
                : ($deployment->status == 'failed'
                    ? 'bg-danger'
                    : 'bg-warning') }}">

                <div class="inner">

                    <h3>{{ ucfirst($deployment->status ?? 'Pending') }}</h3>

                    <p>Deployment Status</p>

                </div>

                <div class="icon">

                    <i class="fas fa-rocket"></i>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="small-box bg-info">

                <div class="inner">

                    <h3>{{ $deployment->version ?: '-' }}</h3>

                    <p>Application Version</p>

                </div>

                <div class="icon">

                    <i class="fas fa-code-branch"></i>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="small-box bg-primary">

                <div class="inner">

                    <h3>{{ $deployment->build_number ?: '-' }}</h3>

                    <p>Build Number</p>

                </div>

                <div class="icon">

                    <i class="fas fa-hammer"></i>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="small-box bg-secondary">

                <div class="inner">

                    <h3>

                        {{ optional($deployment->deployed_at)->diffForHumans() ?? '-' }}

                    </h3>

                    <p>Last Deployment</p>

                </div>

                <div class="icon">

                    <i class="fas fa-clock"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-6">

            <div class="card card-outline card-primary">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-info-circle"></i>

                        Deployment Information

                    </h3>

                </div>

                <table class="table table-striped">

                    <tr>

                        <th width="35%">Status</th>

                        <td>{{ ucfirst($deployment->status ?? '-') }}</td>

                    </tr>

                    <tr>

                        <th>Method</th>

                        <td>{{ $deployment->method }}</td>

                    </tr>

                    <tr>

                        <th>Server</th>

                        <td>{{ $deployment->server }}</td>

                    </tr>

                    <tr>

                        <th>Version</th>

                        <td>{{ $deployment->version ?: '-' }}</td>

                    </tr>

                    <tr>

                        <th>Release Version</th>

                        <td>{{ $deployment->release_version ?: '-' }}</td>

                    </tr>

                    <tr>

                        <th>Build Number</th>

                        <td>{{ $deployment->build_number ?: '-' }}</td>

                    </tr>

                    <tr>

                        <th>Build Duration</th>

                        <td>{{ $deployment->build_duration ?: '-' }}</td>

                    </tr>

                    <tr>

                        <th>Artifact</th>

                        <td>{{ $deployment->artifact_name ?: '-' }}</td>

                    </tr>

                    <tr>

                        <th>Deployed At</th>

                        <td>{{ optional($deployment->deployed_at)->format('d M Y h:i A') }}</td>

                    </tr>

                </table>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card card-outline card-success">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-folder"></i>

                        Project Information

                    </h3>

                </div>

                <table class="table table-striped">

                    <tr>

                        <th width="35%">Project</th>

                        <td>{{ $deployment->project->name }}</td>

                    </tr>

                    <tr>

                        <th>Repository</th>

                        <td>

                            @if ($deployment->project->git_repository)
                                <a href="{{ $deployment->project->git_repository }}" target="_blank">

                                    {{ $deployment->project->git_repository }}

                                </a>
                            @else
                                -
                            @endif

                        </td>

                    </tr>

                    <tr>

                        <th>Branch</th>

                        <td>{{ $deployment->project->git_branch }}</td>

                    </tr>

                    <tr>

                        <th>Environment</th>

                        <td>{{ optional($deployment->project->environment)->environment }}</td>

                    </tr>

                    <tr>

                        <th>PHP</th>

                        <td>{{ optional($deployment->project->environment)->php_version }}</td>

                    </tr>

                    <tr>

                        <th>Laravel</th>

                        <td>{{ optional($deployment->project->environment)->laravel_version }}</td>

                    </tr>

                    <tr>

                        <th>Health Score</th>

                        <td>{{ optional($deployment->project->health)->health_score }}%</td>

                    </tr>

                </table>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-6">

            <div class="card card-outline card-warning">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-terminal"></i>

                        Deployment Commands

                    </h3>

                </div>

                <div class="card-body">

                    <strong>Git Pull</strong>

                    <pre>{{ $deployment->git_pull_command ?: '-' }}</pre>

                    <strong>Composer</strong>

                    <pre>{{ $deployment->composer_install_command ?: '-' }}</pre>

                    <strong>NPM</strong>

                    <pre>{{ $deployment->npm_build_command ?: '-' }}</pre>

                    <strong>Migration</strong>

                    <pre>{{ $deployment->migration_command ?: '-' }}</pre>

                    <strong>Cache Clear</strong>

                    <pre>{{ $deployment->cache_clear_command ?: '-' }}</pre>

                </div>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card card-outline card-info">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-chart-bar"></i>

                        Deployment Statistics

                    </h3>

                </div>

                <table class="table table-striped">

                    <tr>

                        <th width="40%">Successful Deployments</th>

                        <td>{{ $deployment->success_count }}</td>

                    </tr>

                    <tr>

                        <th>Failed Deployments</th>

                        <td>{{ $deployment->failed_count }}</td>

                    </tr>

                    <tr>

                        <th>Total Deployments</th>

                        <td>{{ $deployment->success_count + $deployment->failed_count }}</td>

                    </tr>

                    <tr>

                        <th>Success Rate</th>

                        <td>

                            @php
                                $total = $deployment->success_count + $deployment->failed_count;
                                $rate = $total ? round(($deployment->success_count / $total) * 100, 2) : 0;
                            @endphp

                            {{ $rate }}%

                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </div>

@endsection
