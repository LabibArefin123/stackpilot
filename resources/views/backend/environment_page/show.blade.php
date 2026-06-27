@extends('adminlte::page')

@section('title', 'Environment Details')

@section('content')

    <div class="row">

        <div class="col-md-12">

            <div class="card card-primary card-outline">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-server"></i>

                        {{ $environment->project->name }}

                    </h3>

                    <div class="card-tools">

                        <span class="badge badge-success">

                            {{ strtoupper($environment->environment) }}

                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-3">

            <div class="info-box">

                <span class="info-box-icon bg-primary">

                    <i class="fab fa-php"></i>

                </span>

                <div class="info-box-content">

                    <span class="info-box-text">

                        PHP Version

                    </span>

                    <span class="info-box-number">

                        {{ $environment->php_version }}

                    </span>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="info-box">

                <span class="info-box-icon bg-danger">

                    <i class="fab fa-laravel"></i>

                </span>

                <div class="info-box-content">

                    <span class="info-box-text">

                        Laravel

                    </span>

                    <span class="info-box-number">

                        {{ $environment->laravel_version }}

                    </span>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="info-box">

                <span class="info-box-icon bg-success">

                    <i class="fab fa-node-js"></i>

                </span>

                <div class="info-box-content">

                    <span class="info-box-text">

                        Node.js

                    </span>

                    <span class="info-box-number">

                        {{ $environment->node_version }}

                    </span>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="info-box">

                <span class="info-box-icon bg-warning">

                    <i class="fas fa-server"></i>

                </span>

                <div class="info-box-content">

                    <span class="info-box-text">

                        Server

                    </span>

                    <span class="info-box-number">

                        {{ $environment->server_name }}

                    </span>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-6">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">

                        Environment Information

                    </h3>

                </div>

                <table class="table table-striped">

                    <tr>

                        <th width="35%">Project Path</th>

                        <td>{{ $environment->project_path }}</td>

                    </tr>

                    <tr>

                        <th>Public Path</th>

                        <td>{{ $environment->public_path }}</td>

                    </tr>

                    <tr>

                        <th>Hosting</th>

                        <td>{{ $environment->hosting_provider }}</td>

                    </tr>

                    <tr>

                        <th>Server IP</th>

                        <td>{{ $environment->server_ip }}</td>

                    </tr>

                    <tr>

                        <th>SSH Port</th>

                        <td>{{ $environment->ssh_port }}</td>

                    </tr>

                    <tr>

                        <th>Last Scan</th>

                        <td>{{ optional($environment->last_checked_at)->diffForHumans() }}</td>

                    </tr>

                </table>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">

                        Development Tools

                    </h3>

                </div>

                <table class="table table-striped">

                    <tr>

                        <th width="35%">PHP Binary</th>

                        <td>{{ $environment->php_binary }}</td>

                    </tr>

                    <tr>

                        <th>Composer</th>

                        <td>{{ $environment->composer_binary }}</td>

                    </tr>

                    <tr>

                        <th>Node Binary</th>

                        <td>{{ $environment->node_binary }}</td>

                    </tr>

                    <tr>

                        <th>NPM Binary</th>

                        <td>{{ $environment->npm_binary }}</td>

                    </tr>

                    <tr>

                        <th>Repository Folder</th>

                        <td>{{ $repository }}</td>

                    </tr>

                </table>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-4">

            <div class="small-box bg-success">

                <div class="inner">

                    <h3>{{ optional($environment->project->health)->health_score ?? 0 }}%</h3>

                    <p>Project Health</p>

                </div>

                <div class="icon">

                    <i class="fas fa-heartbeat"></i>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="small-box bg-info">

                <div class="inner">

                    <h3>{{ optional($environment->project->deployment)->status ?? 'Pending' }}</h3>

                    <p>Deployment Status</p>

                </div>

                <div class="icon">

                    <i class="fas fa-rocket"></i>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="small-box bg-primary">

                <div class="inner">

                    <h3>{{ $environment->project->git_branch }}</h3>

                    <p>Git Branch</p>

                </div>

                <div class="icon">

                    <i class="fab fa-git-alt"></i>

                </div>

            </div>

        </div>

    </div>

@endsection
