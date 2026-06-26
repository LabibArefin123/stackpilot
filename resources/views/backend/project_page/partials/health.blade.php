<div class="row">

    <div class="col-md-4">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>

                    {{ $project->health->health_score ?? 0 }}%

                </h3>

                <p>

                    Overall Health

                </p>

            </div>

            <div class="icon">

                <i class="fas fa-heartbeat"></i>

            </div>

        </div>

    </div>

    <div class="col-md-8">

        <div class="card">

            <div class="card-body">

                <div class="progress">

                    <div class="progress-bar bg-success" style="width:{{ $project->health->health_score ?? 0 }}%">

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="card card-outline card-success">

    <div class="card-header">

        <h3 class="card-title">

            Health Checklist

        </h3>

    </div>

    <div class="card-body">

        <div class="row">

            @php

                $checks = [
                    'Git Repository' => $project->health->git_ok,

                    'Composer' => $project->health->composer_ok,

                    'Node.js' => $project->health->node_ok,

                    'Queue Worker' => $project->health->queue_ok,

                    'Cron Scheduler' => $project->health->cron_ok,

                    'Storage Link' => $project->health->storage_link_ok,

                    '.env Configuration' => $project->health->env_ok,
                ];

            @endphp

            @foreach ($checks as $title => $status)
                <div class="col-md-6 mb-3">

                    <div class="info-box">

                        <span class="info-box-icon {{ $status ? 'bg-success' : 'bg-danger' }}">

                            <i class="fas {{ $status ? 'fa-check' : 'fa-times' }}"></i>

                        </span>

                        <div class="info-box-content">

                            <span class="info-box-text">

                                {{ $title }}

                            </span>

                            <span class="info-box-number">

                                {{ $status ? 'Healthy' : 'Problem Detected' }}

                            </span>

                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    </div>

</div>

<div class="card card-outline card-warning">

    <div class="card-header">

        <h3 class="card-title">

            Last Health Scan

        </h3>

    </div>

    <div class="card-body">

        <table class="table">

            <tr>

                <th width="250">

                    Last Scan

                </th>

                <td>

                    {{ optional($project->health->checked_at)->format('d M Y h:i A') }}

                </td>

            </tr>

            <tr>

                <th>

                    Health Score

                </th>

                <td>

                    <strong>

                        {{ $project->health->health_score ?? 0 }}%

                    </strong>

                </td>

            </tr>

        </table>

    </div>

</div>
