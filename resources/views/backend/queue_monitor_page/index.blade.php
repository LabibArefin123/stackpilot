@extends('adminlte::page')

@section('title', 'Queue Monitor')

@section('content_header')

    <div class="row mb-2">

        <div class="col-sm-6">

            <h1>

                <i class="fas fa-stream text-primary mr-2"></i>

                Queue Monitor

            </h1>

            <small class="text-muted">

                Monitor Laravel Queue Workers, Jobs, Performance & Statistics

            </small>

        </div>

        <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">

                    <a href="#">Dashboard</a>

                </li>

                <li class="breadcrumb-item active">

                    Queue Monitor

                </li>

            </ol>

        </div>

    </div>

@stop


@section('content')

    <div class="row">

        <div class="col-lg-3 col-md-6">

            <div class="info-box shadow">

                <span class="info-box-icon bg-warning">

                    <i class="fas fa-clock"></i>

                </span>

                <div class="info-box-content">

                    <span class="info-box-text">

                        Pending Jobs

                    </span>

                    <span class="info-box-number">

                        00

                    </span>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="info-box shadow">

                <span class="info-box-icon bg-primary">

                    <i class="fas fa-spinner"></i>

                </span>

                <div class="info-box-content">

                    <span class="info-box-text">

                        Processing Jobs

                    </span>

                    <span class="info-box-number">

                        00

                    </span>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="info-box shadow">

                <span class="info-box-icon bg-success">

                    <i class="fas fa-check-circle"></i>

                </span>

                <div class="info-box-content">

                    <span class="info-box-text">

                        Completed Jobs

                    </span>

                    <span class="info-box-number">

                        00

                    </span>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="info-box shadow">

                <span class="info-box-icon bg-danger">

                    <i class="fas fa-times-circle"></i>

                </span>

                <div class="info-box-content">

                    <span class="info-box-text">

                        Failed Jobs

                    </span>

                    <span class="info-box-number">

                        00

                    </span>

                </div>

            </div>

        </div>

    </div>


    <div class="row">

        <div class="col-md-3">

            <div class="small-box bg-info">

                <div class="inner">

                    <h3>00</h3>

                    <p>Queue Workers</p>

                </div>

                <div class="icon">

                    <i class="fas fa-users-cog"></i>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="small-box bg-secondary">

                <div class="inner">

                    <h3>00 ms</h3>

                    <p>Average Runtime</p>

                </div>

                <div class="icon">

                    <i class="fas fa-stopwatch"></i>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="small-box bg-purple">

                <div class="inner">

                    <h3>00 MB</h3>

                    <p>Memory Usage</p>

                </div>

                <div class="icon">

                    <i class="fas fa-memory"></i>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="small-box bg-success">

                <div class="inner">

                    <h3>00%</h3>

                    <p>Queue Health</p>

                </div>

                <div class="icon">

                    <i class="fas fa-heartbeat"></i>

                </div>

            </div>

        </div>

    </div>


    <div class="row">

        <div class="col-md-8">

            <div class="card card-outline card-primary">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-history mr-1"></i>

                        Recent Queue Jobs

                    </h3>

                </div>

                <div class="card-body p-0">

                    <table class="table table-striped table-hover">

                        <thead>

                            <tr>

                                <th>#</th>

                                <th>Job</th>

                                <th>Queue</th>

                                <th>Status</th>

                                <th>Runtime</th>

                            </tr>

                        </thead>

                        <tbody>

                            <tr>

                                <td colspan="5" class="text-center text-muted py-5">

                                    <i class="fas fa-inbox fa-3x mb-3 d-block"></i>

                                    No Queue Jobs Available

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card card-outline card-success">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-server mr-1"></i>

                        Queue Worker Status

                    </h3>

                </div>

                <div class="card-body">

                    <table class="table table-sm">

                        <tr>

                            <th>Worker</th>

                            <td>00</td>

                        </tr>

                        <tr>

                            <th>Status</th>

                            <td>

                                <span class="badge badge-secondary">

                                    Offline

                                </span>

                            </td>

                        </tr>

                        <tr>

                            <th>PID</th>

                            <td>00</td>

                        </tr>

                        <tr>

                            <th>Memory</th>

                            <td>00 MB</td>

                        </tr>

                        <tr>

                            <th>Runtime</th>

                            <td>00 ms</td>

                        </tr>

                    </table>

                </div>

            </div>

            <div class="card card-outline card-warning">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-chart-line mr-1"></i>

                        Performance

                    </h3>

                </div>

                <div class="card-body text-center">

                    <div style="height:220px; display:flex; align-items:center; justify-content:center;">

                        <div class="text-muted">

                            <i class="fas fa-chart-area fa-4x mb-3"></i>

                            <br>

                            Queue Performance Chart

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <div class="card card-outline card-danger">

        <div class="card-header">

            <h3 class="card-title">

                <i class="fas fa-exclamation-triangle mr-1"></i>

                Failed Jobs

            </h3>

        </div>

        <div class="card-body p-0">

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Job</th>

                        <th>Exception</th>

                        <th>Failed At</th>

                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td colspan="4" class="text-center text-muted py-5">

                            <i class="fas fa-check-circle text-success fa-3x mb-3 d-block"></i>

                            No Failed Jobs

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

@endsection
