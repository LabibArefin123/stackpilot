@extends('adminlte::page')

@section('title', $project->name)

@section('content_header')

    <div class="d-flex justify-content-between align-items-center">

        <div>

            <h1 class="mb-1">

                <i class="fas fa-project-diagram text-primary mr-2"></i>

                {{ $project->name }}

            </h1>

            <small class="text-muted">

                {{ $project->domain }}

            </small>

        </div>

        <div>

            <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">

                <i class="fas fa-edit"></i>

                Edit

            </a>

            <a href="{{ route('projects.index') }}" class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>

                Back

            </a>

        </div>

    </div>

@stop


@section('content')

    <div class="row">

        <div class="col-md-12">

            <div class="card card-outline card-primary">

                <div class="card-header p-0">

                    <ul class="nav nav-pills p-2">

                        <li class="nav-item">

                            <a class="nav-link active" href="#overview" data-toggle="tab">

                                <i class="fas fa-chart-pie mr-1"></i>

                                Overview

                            </a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link" href="#environment" data-toggle="tab">

                                <i class="fas fa-server mr-1"></i>

                                Environment

                            </a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link" href="#health" data-toggle="tab">

                                <i class="fas fa-heartbeat mr-1"></i>

                                Health

                            </a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link" href="#terminal" data-toggle="tab">

                                <i class="fas fa-terminal mr-1"></i>

                                Terminal

                            </a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link" href="#git" data-toggle="tab">

                                <i class="fab fa-git-alt mr-1"></i>

                                Git

                            </a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link" href="#deployments" data-toggle="tab">

                                <i class="fas fa-rocket mr-1"></i>

                                Deployments

                            </a>

                        </li>

                    </ul>

                </div>

                <div class="card-body">

                    <div class="tab-content">

                        <div class="active tab-pane" id="overview">

                            @include('backend.project_page.partials.overview')

                        </div>

                        <div class="tab-pane" id="environment">

                            <div class="active tab-pane" id="overview">

                                @include('backend.project_page.partials.environment')

                            </div>

                        </div>

                        <div class="tab-pane" id="health">

                            @include('backend.project_page.partials.health')

                        </div>

                        <div class="tab-pane" id="terminal">

                          @include('backend.project_page.partials.terminal_page.part_1')
                          @include('backend.project_page.partials.terminal_page.part_2')

                        </div>

                        <div class="tab-pane" id="git">

                             @include('backend.project_page.partials.git_page.part_1')
                             @include('backend.project_page.partials.git_page.part_2')
                             @include('backend.project_page.partials.git_page.part_3')
                             @include('backend.project_page.partials.git_page.part_4')
                             @include('backend.project_page.partials.git_page.part_5')
                             @include('backend.project_page.partials.git_page.part_6')
                        </div>

                        <div class="tab-pane" id="deployments">

                            Deployment history coming soon...

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@stop
