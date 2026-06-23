@extends('adminlte::page')

@section('title', 'StackPilot Dashboard')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="mb-4">
        <h1 class="h3 font-weight-bold text-primary">
            StackPilot Dashboard
        </h1>
        <p class="text-muted">
            Laravel diagnostics, Git deployment checks, Node.js monitoring,
            optimization tools and system health overview.
        </p>
    </div>

    {{-- Welcome Card --}}
    <div class="card shadow-sm mb-4 border-0">
        <div class="card-body">
            <h5 class="font-weight-bold mb-2">
                🚀 Welcome to StackPilot
            </h5>

            <p class="mb-0 text-muted">
                StackPilot helps developers monitor Laravel projects,
                verify Git deployments, check Node.js environments,
                analyze logs, troubleshoot errors, manage queues,
                cron jobs and optimization tasks from a single dashboard.
            </p>
        </div>
    </div>

    {{-- Statistics --}}
    <div class="row">

        <div class="col-lg-3 col-md-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>00</h3>
                    <p>Git Repositories</p>
                </div>
                <div class="icon">
                    <i class="fab fa-git-alt"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>00</h3>
                    <p>Node.js Checks</p>
                </div>
                <div class="icon">
                    <i class="fab fa-node-js"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>00</h3>
                    <p>Queue Jobs</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tasks"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>00</h3>
                    <p>Error Logs</p>
                </div>
                <div class="icon">
                    <i class="fas fa-bug"></i>
                </div>
            </div>
        </div>

    </div>

    {{-- Quick Modules --}}
    <div class="row">

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">

                    <i class="fas fa-code-branch fa-3x text-primary mb-3"></i>

                    <h5 class="font-weight-bold">
                        Git Management
                    </h5>

                    <p class="text-muted mb-0">
                        Monitor repositories, branches,
                        deployment status and commit history.
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">

                    <i class="fas fa-server fa-3x text-success mb-3"></i>

                    <h5 class="font-weight-bold">
                        System Diagnostics
                    </h5>

                    <p class="text-muted mb-0">
                        Check Laravel optimization,
                        cache status, storage permissions and environment setup.
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">

                    <i class="fas fa-terminal fa-3x text-warning mb-3"></i>

                    <h5 class="font-weight-bold">
                        Node.js & Commands
                    </h5>

                    <p class="text-muted mb-0">
                        Verify Node.js installation,
                        NPM packages and build processes.
                    </p>

                </div>
            </div>
        </div>

    </div>

    {{-- Health Status --}}
    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">
                System Health Overview
            </h5>
        </div>

        <div class="card-body">

            <div class="row text-center">

                <div class="col-md-3">
                    <h2 class="font-weight-bold text-success">
                        00%
                    </h2>
                    <p class="text-muted">
                        Server Health
                    </p>
                </div>

                <div class="col-md-3">
                    <h2 class="font-weight-bold text-primary">
                        00
                    </h2>
                    <p class="text-muted">
                        Active Projects
                    </p>
                </div>

                <div class="col-md-3">
                    <h2 class="font-weight-bold text-warning">
                        00
                    </h2>
                    <p class="text-muted">
                        Scheduled Jobs
                    </p>
                </div>

                <div class="col-md-3">
                    <h2 class="font-weight-bold text-danger">
                        00
                    </h2>
                    <p class="text-muted">
                        Detected Issues
                    </p>
                </div>

            </div>

        </div>
    </div>

</div>

@stop