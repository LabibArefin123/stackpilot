<div class="row">

    {{-- Server Information --}}
    <div class="col-md-6">

        <div class="card card-outline card-primary">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-server mr-2"></i>

                    Server Information

                </h3>

            </div>

            <div class="card-body table-responsive p-0">

                <table class="table table-striped">

                    <tr>
                        <th width="220">Hosting Provider</th>
                        <td>{{ $project->environment->hosting_provider ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Server Name</th>
                        <td>{{ $project->environment->server_name ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Server IP</th>
                        <td>{{ $project->environment->server_ip ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Environment</th>
                        <td>

                            @php
                                $environment = $project->environment->environment ?? 'unknown';
                            @endphp

                            @switch($environment)
                                @case('production')
                                    <span class="badge badge-success">Production</span>
                                @break

                                @case('staging')
                                    <span class="badge badge-warning">Staging</span>
                                @break

                                @default
                                    <span class="badge badge-info">Local</span>
                            @endswitch

                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </div>

    {{-- Project Paths --}}
    <div class="col-md-6">

        <div class="card card-outline card-info">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-folder-open mr-2"></i>

                    Project Paths

                </h3>

            </div>

            <div class="card-body table-responsive p-0">

                <table class="table table-striped">

                    <tr>
                        <th width="220">Project Path</th>
                        <td><code>{{ $project->environment->project_path ?? '-' }}</code></td>
                    </tr>

                    <tr>
                        <th>Public Path</th>
                        <td><code>{{ $project->environment->public_path ?? '-' }}</code></td>
                    </tr>

                    <tr>
                        <th>Last Checked</th>
                        <td>

                            {{ optional($project->environment->last_checked_at)->diffForHumans() }}

                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </div>

</div>

<div class="row">

    {{-- PHP --}}
    <div class="col-md-4">

        <div class="info-box bg-gradient-primary">

            <span class="info-box-icon">

                <i class="fab fa-php"></i>

            </span>

            <div class="info-box-content">

                <span class="info-box-text">

                    PHP

                </span>

                <span class="info-box-number">

                    {{ $project->environment->php_version ?? '-' }}

                </span>

                <small>

                    {{ $project->environment->php_binary ?? '-' }}

                </small>

            </div>

        </div>

    </div>

    {{-- Laravel --}}
    <div class="col-md-4">

        <div class="info-box bg-gradient-danger">

            <span class="info-box-icon">

                <i class="fab fa-laravel"></i>

            </span>

            <div class="info-box-content">

                <span class="info-box-text">

                    Laravel

                </span>

                <span class="info-box-number">

                    {{ $project->environment->laravel_version ?? '-' }}

                </span>

            </div>

        </div>

    </div>

    {{-- Node --}}
    <div class="col-md-4">

        <div class="info-box bg-gradient-success">

            <span class="info-box-icon">

                <i class="fab fa-node-js"></i>

            </span>

            <div class="info-box-content">

                <span class="info-box-text">

                    Node

                </span>

                <span class="info-box-number">

                    {{ $project->environment->node_version ?? '-' }}

                </span>

            </div>

        </div>

    </div>

</div>

<div class="card card-outline card-success">

    <div class="card-header">

        <h3 class="card-title">

            Installed Binaries

        </h3>

    </div>

    <div class="card-body table-responsive p-0">

        <table class="table table-hover">

            <thead>

                <tr>

                    <th>Software</th>

                    <th>Binary</th>

                </tr>

            </thead>

            <tbody>

                <tr>

                    <td>PHP</td>

                    <td><code>{{ $project->environment->php_binary }}</code></td>

                </tr>

                <tr>

                    <td>Composer</td>

                    <td><code>{{ $project->environment->composer_binary }}</code></td>

                </tr>

                <tr>

                    <td>Node</td>

                    <td><code>{{ $project->environment->node_binary }}</code></td>

                </tr>

                <tr>

                    <td>NPM</td>

                    <td><code>{{ $project->environment->npm_binary }}</code></td>

                </tr>

            </tbody>

        </table>

    </div>

</div>
