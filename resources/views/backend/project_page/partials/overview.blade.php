<div class="row">

    <div class="col-lg-3 col-md-6">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>

                    {{ $project->is_active ? 'Active' : 'Offline' }}

                </h3>

                <p>

                    Project Status

                </p>

            </div>

            <div class="icon">

                <i class="fas fa-check-circle"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="small-box bg-info">

            <div class="inner">

                <h3>

                    {{ optional($project->environment)->environment ?? '-' }}

                </h3>

                <p>

                    Environment

                </p>

            </div>

            <div class="icon">

                <i class="fas fa-server"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="small-box bg-warning">

            <div class="inner">

                <h3>

                    {{ optional($project->environment)->php_version }}

                </h3>

                <p>

                    PHP Version

                </p>

            </div>

            <div class="icon">

                <i class="fab fa-php"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="small-box bg-primary">

            <div class="inner">

                <h3>

                    {{ optional($project->environment)->laravel_version }}

                </h3>

                <p>

                    Laravel

                </p>

            </div>

            <div class="icon">

                <i class="fab fa-laravel"></i>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-md-7">

        <div class="card card-outline card-primary">

            <div class="card-header">

                <h3 class="card-title">

                    General Information

                </h3>

            </div>

            <div class="card-body table-responsive">

                <table class="table table-striped">

                    <tr>

                        <th width="220">

                            Project Name

                        </th>

                        <td>

                            {{ $project->name }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Domain

                        </th>

                        <td>

                            <a href="https://{{ $project->domain }}" target="_blank">

                                {{ $project->domain }}

                            </a>

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Git Repository

                        </th>

                        <td>

                            @if ($project->git_repository)
                                <a href="{{ $project->git_repository }}" target="_blank">

                                    {{ $project->git_repository }}

                                </a>
                            @else
                                -
                            @endif

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Branch

                        </th>

                        <td>

                            <span class="badge badge-success">

                                {{ $project->git_branch }}

                            </span>

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Last Checked

                        </th>

                        <td>

                            {{ optional($project->last_checked_at)->diffForHumans() }}

                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </div>

    <div class="col-md-5">

        <div class="card card-outline card-success">

            <div class="card-header">

                <h3 class="card-title">

                    Health Score

                </h3>

            </div>

            <div class="card-body">

                <h1 class="text-center">

                    {{ optional($project->health)->health_score ?? 0 }}%

                </h1>

                <div class="progress">

                    <div class="progress-bar bg-success"
                        style="width:{{ optional($project->health)->health_score ?? 0 }}%">

                    </div>

                </div>

                <hr>

                <table class="table table-borderless">

                    <tr>

                        <td>

                            Git

                        </td>

                        <td class="text-right">

                            @if (optional($project->health)->git_ok)
                                <span class="badge badge-success">

                                    OK

                                </span>
                            @else
                                <span class="badge badge-danger">

                                    Failed

                                </span>
                            @endif

                        </td>

                    </tr>

                    <tr>

                        <td>

                            Composer

                        </td>

                        <td class="text-right">

                            @if (optional($project->health)->composer_ok)
                                <span class="badge badge-success">OK</span>
                            @else
                                <span class="badge badge-danger">Failed</span>
                            @endif

                        </td>

                    </tr>

                    <tr>

                        <td>

                            Node

                        </td>

                        <td class="text-right">

                            @if (optional($project->health)->node_ok)
                                <span class="badge badge-success">OK</span>
                            @else
                                <span class="badge badge-danger">Failed</span>
                            @endif

                        </td>

                    </tr>

                    <tr>

                        <td>

                            Queue

                        </td>

                        <td class="text-right">

                            @if (optional($project->health)->queue_ok)
                                <span class="badge badge-success">OK</span>
                            @else
                                <span class="badge badge-danger">Failed</span>
                            @endif

                        </td>

                    </tr>

                    <tr>

                        <td>

                            Scheduler

                        </td>

                        <td class="text-right">

                            @if (optional($project->health)->cron_ok)
                                <span class="badge badge-success">OK</span>
                            @else
                                <span class="badge badge-danger">Failed</span>
                            @endif

                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-md-12">

        <div class="card">

            <div class="card-header">

                <h3 class="card-title">

                    Recent Terminal Commands

                </h3>

            </div>

            <div class="card-body p-0">

                <table class="table table-hover">

                    <thead>

                        <tr>

                            <th>Command</th>

                            <th>Status</th>

                            <th>Executed</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($project->commands->take(10) as $command)
                            <tr>

                                <td>

                                    <code>{{ $command->command }}</code>

                                </td>

                                <td>

                                    @if ($command->success)
                                        <span class="badge badge-success">

                                            Success

                                        </span>
                                    @else
                                        <span class="badge badge-danger">

                                            Failed

                                        </span>
                                    @endif

                                </td>

                                <td>

                                    {{ $command->executed_at }}

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="3" class="text-center">

                                    No terminal history found.

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>
