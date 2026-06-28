@extends('adminlte::page')

@section('title', 'Edit Deployment')

@section('content_header')

    <div class="d-flex justify-content-between align-items-center">

        <div>

            <h1>

                <i class="fas fa-edit text-warning mr-2"></i>

                Edit Deployment

            </h1>

            <small class="text-muted">

                {{ $deployment->project->name }}

            </small>

        </div>

        <div>

            <a href="{{ route('deployments.show', $deployment) }}" class="btn btn-info">

                <i class="fas fa-eye"></i>

                Show

            </a>

            <a href="{{ route('deployments.index') }}" class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>

                Back

            </a>

        </div>

    </div>

@stop

@section('content')

    <form action="{{ route('deployments.update', $deployment) }}" method="POST">

        @csrf

        @method('PUT')

        <div class="card card-outline card-primary">

            <div class="card-header">

                <h3 class="card-title">

                    Deployment Configuration

                </h3>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="form-group col-md-6">

                        <label>Status</label>

                        <select name="status" class="form-control">

                            @foreach (['pending', 'running', 'success', 'failed', 'cancelled'] as $status)
                                <option value="{{ $status }}" @selected($deployment->status == $status)>

                                    {{ ucfirst($status) }}

                                </option>
                            @endforeach

                        </select>

                    </div>

                    <div class="form-group col-md-6">

                        <label>Method</label>

                        <select name="method" class="form-control">

                            @foreach (['Git Pull', 'GitHub Action', 'GitLab CI', 'Jenkins', 'Docker', 'Manual', 'FTP Upload'] as $method)
                                <option value="{{ $method }}" @selected($deployment->method == $method)>

                                    {{ $method }}

                                </option>
                            @endforeach

                        </select>

                    </div>

                    <div class="form-group col-md-6">

                        <label>Server</label>

                        <input type="text" name="server" class="form-control"
                            value="{{ old('server', $deployment->server) }}">

                    </div>

                    <div class="form-group col-md-6">

                        <label>Git Pull Command</label>

                        <input type="text" name="git_pull_command" class="form-control"
                            value="{{ old('git_pull_command', $deployment->git_pull_command) }}">

                    </div>

                    <div class="form-group col-md-6">

                        <label>Composer Install</label>

                        <input type="text" name="composer_install_command" class="form-control"
                            value="{{ old('composer_install_command', $deployment->composer_install_command) }}">

                    </div>

                    <div class="form-group col-md-6">

                        <label>NPM Build</label>

                        <input type="text" name="npm_build_command" class="form-control"
                            value="{{ old('npm_build_command', $deployment->npm_build_command) }}">

                    </div>

                    <div class="form-group col-md-6">

                        <label>Migration Command</label>

                        <input type="text" name="migration_command" class="form-control"
                            value="{{ old('migration_command', $deployment->migration_command) }}">

                    </div>

                    <div class="form-group col-md-6">

                        <label>Cache Clear Command</label>

                        <input type="text" name="cache_clear_command" class="form-control"
                            value="{{ old('cache_clear_command', $deployment->cache_clear_command) }}">

                    </div>

                </div>

            </div>

            <div class="card-footer">

                <button class="btn btn-primary">

                    <i class="fas fa-save"></i>

                    Save Changes

                </button>

                <a href="{{ route('deployments.show', $deployment) }}" class="btn btn-secondary">

                    Cancel

                </a>

            </div>

        </div>

    </form>

@stop
