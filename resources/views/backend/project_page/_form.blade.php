{{-- =========================
    GENERAL INFORMATION
========================= --}}

<div class="card card-primary">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-project-diagram mr-2"></i>

            General Information

        </h3>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="form-group col-md-6">

                <label>Project Name <span class="text-danger">*</span></label>

                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $project->name ?? '') }}" placeholder="TechnoTech Engineering Ltd">

                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="form-group col-md-6">

                <label>Primary Domain</label>

                <input type="text" name="domain" class="form-control"
                    value="{{ old('domain', $project->domain ?? '') }}" placeholder="technotech.labib.work">

            </div>

            <div class="form-group col-md-6">

                <label>Git Repository</label>

                <input type="text" name="git_repository" class="form-control"
                    value="{{ old('git_repository', $project->git_repository ?? '') }}">

            </div>

            <div class="form-group col-md-6">

                <label>Git Branch</label>

                <input type="text" name="git_branch" class="form-control"
                    value="{{ old('git_branch', $project->git_branch ?? 'main') }}">

            </div>

        </div>

    </div>

</div>

{{-- =========================
    ENVIRONMENT
========================= --}}

<div class="card card-info">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-server mr-2"></i>

            Environment

        </h3>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="form-group col-md-6">

                <label>Environment</label>

                <select name="environment" class="form-control">

                    <option value="production" @selected(old('environment', optional($project->environment)->environment) == 'production')>

                        Production

                    </option>

                    <option value="staging" @selected(old('environment', optional($project->environment)->environment) == 'staging')>

                        Staging

                    </option>

                    <option value="local" @selected(old('environment', optional($project->environment)->environment) == 'local')>

                        Local

                    </option>

                </select>

            </div>

            <div class="form-group col-md-6">

                <label>Hosting Provider</label>

                <input class="form-control" name="hosting_provider"
                    value="{{ old('hosting_provider', optional($project->environment)->hosting_provider) }}">

            </div>

            <div class="form-group col-md-6">

                <label>Project Path</label>

                <input class="form-control" name="project_path"
                    value="{{ old('project_path', optional($project->environment)->project_path) }}">

            </div>

            <div class="form-group col-md-6">

                <label>Public Path</label>

                <input class="form-control" name="public_path"
                    value="{{ old('public_path', optional($project->environment)->public_path) }}">

            </div>

        </div>

    </div>

</div>

{{-- =========================
    RUNTIME
========================= --}}

<div class="card card-success">

    <div class="card-header">

        <h3 class="card-title">

            Runtime

        </h3>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="form-group col-md-6">

                <label>Laravel Version</label>

                <input class="form-control" name="laravel_version"
                    value="{{ old('laravel_version', optional($project->environment)->laravel_version) }}">

            </div>

            <div class="form-group col-md-6">

                <label>PHP Version</label>

                <input class="form-control" name="php_version"
                    value="{{ old('php_version', optional($project->environment)->php_version) }}">

            </div>

            <div class="form-group col-md-6">

                <label>PHP Binary</label>

                <input class="form-control" name="php_binary"
                    value="{{ old('php_binary', optional($project->environment)->php_binary ?? '/usr/bin/php') }}">

            </div>

            <div class="form-group col-md-6">

                <label>Composer Binary</label>

                <input class="form-control" name="composer_binary"
                    value="{{ old('composer_binary', optional($project->environment)->composer_binary ?? '/usr/local/bin/composer') }}">

            </div>

            <div class="form-group col-md-6">

                <label>Node Version</label>

                <input class="form-control" name="node_version"
                    value="{{ old('node_version', optional($project->environment)->node_version) }}">

            </div>

            <div class="form-group col-md-6">

                <label>NPM Binary</label>

                <input class="form-control" name="npm_binary"
                    value="{{ old('npm_binary', optional($project->environment)->npm_binary) }}">

            </div>

        </div>

    </div>

</div>

{{-- =========================
    SERVER
========================= --}}

<div class="card card-warning">

    <div class="card-header">

        <h3 class="card-title">

            Server Configuration

        </h3>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="form-group col-md-6">

                <label>Server Name</label>

                <input class="form-control" name="server_name"
                    value="{{ old('server_name', optional($project->environment)->server_name) }}">

            </div>

            <div class="form-group col-md-6">

                <label>Server IP</label>

                <input class="form-control" name="server_ip"
                    value="{{ old('server_ip', optional($project->environment)->server_ip) }}">

            </div>

            <div class="form-group col-md-6">

                <label>SSH User</label>

                <input class="form-control" name="ssh_user"
                    value="{{ old('ssh_user', optional($project->environment)->ssh_user) }}">

            </div>

            <div class="form-group col-md-6">

                <label>SSH Port</label>

                <input class="form-control" name="ssh_port"
                    value="{{ old('ssh_port', optional($project->environment)->ssh_port ?? 22) }}">

            </div>

        </div>

    </div>

</div>

<div class="card">

    <div class="card-footer">

        <button class="btn btn-primary">

            <i class="fas fa-save mr-1"></i>

            {{ isset($project) ? 'Update Project' : 'Create Project' }}

        </button>

        <a href="{{ route('projects.index') }}" class="btn btn-default">

            Cancel

        </a>

    </div>

</div>
