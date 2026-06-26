@extends('adminlte::page')

@section('title', 'Git Monitor')

@section('content_header')

    <div class="d-flex justify-content-between align-items-center">

        <div>

            <h1>

                <i class="fab fa-git-alt text-danger mr-2"></i>

                Git Monitor

            </h1>

            <small class="text-muted">

                Monitor all project repositories from one dashboard

            </small>

        </div>

        <div>

            <button class="btn btn-primary">

                <i class="fas fa-sync-alt mr-1"></i>

                Refresh

            </button>

        </div>

    </div>

@stop


@section('content')

    <div class="container-fluid">

        {{-- Statistics --}}

        <div class="row">

            <div class="col-lg-3 col-md-6">

                <div class="info-box bg-gradient-primary">

                    <span class="info-box-icon">

                        <i class="fas fa-folder-open"></i>

                    </span>

                    <div class="info-box-content">

                        <span class="info-box-text">

                            Repositories

                        </span>

                        <span class="info-box-number">

                            {{ $projects->count() }}

                        </span>

                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="info-box bg-gradient-success">

                    <span class="info-box-icon">

                        <i class="fas fa-check-circle"></i>

                    </span>

                    <div class="info-box-content">

                        <span class="info-box-text">

                            Healthy

                        </span>

                        <span class="info-box-number">

                            {{ $projects->where('is_active', 1)->count() }}

                        </span>

                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="info-box bg-gradient-warning">

                    <span class="info-box-icon">

                        <i class="fas fa-code-branch"></i>

                    </span>

                    <div class="info-box-content">

                        <span class="info-box-text">

                            Branches

                        </span>

                        <span class="info-box-number">

                            {{ $projects->pluck('git_branch')->filter()->count() }}

                        </span>

                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="info-box bg-gradient-danger">

                    <span class="info-box-icon">

                        <i class="fab fa-github"></i>

                    </span>

                    <div class="info-box-content">

                        <span class="info-box-text">

                            Connected

                        </span>

                        <span class="info-box-number">

                            {{ $projects->whereNotNull('git_repository')->count() }}

                        </span>

                    </div>

                </div>

            </div>

        </div>



        {{-- Filters --}}

        <div class="card card-outline card-primary">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-filter mr-2"></i>

                    Repository Filters

                </h3>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label>

                                Search Repository

                            </label>

                            <input type="text" id="repositorySearch" class="form-control"
                                placeholder="Search by project name...">

                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group">

                            <label>

                                Status

                            </label>

                            <select class="form-control">

                                <option>

                                    All

                                </option>

                                <option>

                                    Healthy

                                </option>

                                <option>

                                    Inactive

                                </option>

                            </select>

                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group">

                            <label>

                                Branch

                            </label>

                            <select class="form-control">

                                <option>

                                    All Branches

                                </option>

                                @foreach ($projects->pluck('git_branch')->unique() as $branch)
                                    <option>

                                        {{ $branch }}

                                    </option>
                                @endforeach

                            </select>

                        </div>

                    </div>

                    <div class="col-md-2 d-flex align-items-end">

                        <button class="btn btn-primary btn-block">

                            <i class="fas fa-search mr-1"></i>

                            Search

                        </button>

                    </div>

                </div>

            </div>

        </div>



        {{-- Repository Table --}}

        <div class="card card-outline card-danger">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fab fa-git-alt mr-2"></i>

                    Git Repositories

                </h3>

            </div>

            <div class="card-body table-responsive p-0">

                <table class="table table-hover table-striped" id="repositoryTable">

                    <thead>

                        <tr>

                            <th width="50">

                                #

                            </th>

                            <th>

                                Repository

                            </th>

                            <th>

                                Branch

                            </th>

                            <th>

                                Environment

                            </th>

                            <th>

                                Health

                            </th>

                            <th>

                                Repository

                            </th>

                            <th>

                                Last Checked

                            </th>

                            <th width="150">

                                Action

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($projects as $project)
                            <tr>

                                <td>

                                    {{ $loop->iteration }}

                                </td>

                                <td>

                                    <div>

                                        <strong>

                                            {{ $project->name }}

                                        </strong>

                                    </div>

                                    <small class="text-muted">

                                        {{ $project->domain ?? 'Local Development' }}

                                    </small>

                                </td>

                                <td>

                                    @if ($project->git_branch)
                                        <span class="badge badge-info">

                                            <i class="fas fa-code-branch mr-1"></i>

                                            {{ $project->git_branch }}

                                        </span>
                                    @else
                                        <span class="badge badge-secondary">

                                            Unknown

                                        </span>
                                    @endif

                                </td>

                                <td>

                                    @php

                                        $env = optional($project->environment)->environment;

                                    @endphp

                                    @switch($env)
                                        @case('production')
                                            <span class="badge badge-success">

                                                Production

                                            </span>
                                        @break

                                        @case('staging')
                                            <span class="badge badge-warning">

                                                Staging

                                            </span>
                                        @break

                                        @default
                                            <span class="badge badge-primary">

                                                Local

                                            </span>
                                    @endswitch

                                </td>

                                <td>

                                    @if ($project->is_active)
                                        <span class="badge badge-success">

                                            <i class="fas fa-check-circle mr-1"></i>

                                            Healthy

                                        </span>
                                    @else
                                        <span class="badge badge-danger">

                                            Offline

                                        </span>
                                    @endif

                                </td>

                                <td>

                                    @if ($project->git_repository)
                                        <a href="{{ $project->git_repository }}" target="_blank">

                                            <i class="fab fa-github mr-1"></i>

                                            View Repository

                                        </a>
                                    @else
                                        <span class="text-muted">

                                            Not Configured

                                        </span>
                                    @endif

                                </td>

                                <td>

                                    @if ($project->last_checked_at)
                                        {{ $project->last_checked_at->diffForHumans() }}
                                    @else
                                        -
                                    @endif

                                </td>

                                <td>

                                    <a href="{{ route('gits.show', $project) }}" class="btn btn-sm btn-primary">

                                        <i class="fas fa-eye"></i>

                                    </a>

                                </td>

                            </tr>

                            @empty

                                <tr>

                                    <td colspan="8" class="text-center">

                                        <br>

                                        <i class="fab fa-git-alt fa-4x text-muted"></i>

                                        <br><br>

                                        <h5>

                                            No repositories found.

                                        </h5>

                                        <p class="text-muted">

                                            Add a project to begin monitoring Git repositories.

                                        </p>

                                        <br>

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    @stop

    @section('css')

        <style>
            .info-box {

                min-height: 110px;

            }

            .table td {

                vertical-align: middle;

            }

            .badge {

                font-size: 90%;

            }
        </style>

    @stop

    @section('js')

        <script>
            document.getElementById('repositorySearch').addEventListener('keyup', function() {

                let value = this.value.toLowerCase();

                let rows = document.querySelectorAll('#repositoryTable tbody tr');

                rows.forEach(function(row) {

                    row.style.display = row.innerText.toLowerCase().includes(value)

                        ?
                        ''

                        :
                        'none';

                });

            });
        </script>

    @stop
