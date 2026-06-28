@extends('adminlte::page')

@section('title', 'Project Environments')

@section('content')

    <div class="row">

        <div class="col-md-3">

            <div class="small-box bg-info">

                <div class="inner">
                    <h3>{{ $server['repository_count'] }}</h3>
                    <p>Git Repositories</p>
                </div>

                <div class="icon">
                    <i class="fab fa-git-alt"></i>
                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="small-box bg-success">

                <div class="inner">
                    <h3>{{ $server['php'] }}</h3>
                    <p>PHP Version</p>
                </div>

                <div class="icon">
                    <i class="fab fa-php"></i>
                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="small-box bg-warning">

                <div class="inner">
                    <h3>{{ $server['hostname'] }}</h3>
                    <p>Host Name</p>
                </div>

                <div class="icon">
                    <i class="fas fa-server"></i>
                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="small-box bg-primary">

                <div class="inner">
                    <h3>{{ $server['os'] }}</h3>
                    <p>Operating System</p>
                </div>

                <div class="icon">
                    <i class="fas fa-desktop"></i>
                </div>

            </div>

        </div>

    </div>


    <div class="card">

        <div class="card-header">

            <h3 class="card-title">

                <i class="fas fa-server"></i>

                Project Environments

            </h3>

        </div>

        <div class="card-body">

            <table class="table table-hover table-bordered" id="dataTables">

                <thead>

                    <tr>

                        <th>Project</th>

                        <th class="text-center">Environment</th>

                        <th>PHP</th>

                        <th>Laravel</th>

                        <th>Node</th>

                        <th>Server</th>

                        <th>Hosting</th>

                        <th>Repository</th>

                        <th>Last Scan</th>

                        <th width="140">Actions</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($environments as $environment)
                        <tr>

                            <td>

                                <strong>{{ $environment->project->name }}</strong>

                            </td>

                            <td>

                                <span class="badge badge-info">

                                    {{ ucfirst($environment->environment) }}

                                </span>

                            </td>

                            <td>

                                {{ $environment->php_version }}

                            </td>

                            <td>

                                {{ $environment->laravel_version }}

                            </td>

                            <td>

                                {{ $environment->node_version }}

                            </td>

                            <td>

                                {{ $environment->server_name }}

                            </td>

                            <td>

                                {{ $environment->hosting_provider }}

                            </td>

                            <td>

                                @if ($environment->project->git_repository)
                                    <a href="{{ $environment->project->git_repository }}" target="_blank"
                                        class="btn btn-xs btn-outline-dark">

                                        <i class="fab fa-github"></i>

                                        Repository

                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif

                            </td>

                            <td>

                                {{ optional($environment->last_checked_at)->diffForHumans() }}

                            </td>

                            <td>

                                <div class="btn-group">

                                    <a href="{{ route('environment.show', $environment) }}" class="btn btn-xs btn-info"
                                        title="View">

                                        <i class="fas fa-eye"></i>

                                    </a>

                                    <a href="{{ route('environment.edit', $environment) }}" class="btn btn-xs btn-warning"
                                        title="Edit">

                                        <i class="fas fa-edit"></i>

                                    </a>

                                </div>

                            </td>

                        </tr>
                    @empty

                        <tr>

                            <td colspan="9" class="text-center">

                                No environments found.

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
