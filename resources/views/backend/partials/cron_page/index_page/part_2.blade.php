<div class="card card-outline card-primary">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-clock"></i>

            Project Cron Scheduler

        </h3>

        <div class="card-tools">

            <span class="badge badge-success">

                {{ $projects->count() }} Projects

            </span>

        </div>

    </div>

    <div class="card-body">

        <table class="table table-hover table-bordered" id="dataTables">

            <thead class="text-center">

                <tr>

                    <th width="50">#</th>

                    <th>Project</th>

                    <th>Laravel</th>

                    <th>PHP</th>

                    <th>Schedule</th>

                    <th>Status</th>

                    <th>Last Run</th>

                    <th>Queue</th>

                    <th width="260">Actions</th>

                </tr>

            </thead>

            <tbody>

                @foreach ($projects as $project)
                    <tr>

                        <td class="text-center">

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            <strong>{{ $project->name }}</strong>

                        </td>

                        <td>

                            <span class="badge badge-danger">

                                {{ app()->version() }}

                            </span>

                        </td>

                        <td>

                            <span class="badge badge-primary">

                                {{ PHP_VERSION }}

                            </span>

                        </td>

                        <td>

                            <code>* * * * * php artisan schedule:run</code>

                        </td>

                        <td class="text-center">

                            <span class="badge badge-secondary">

                                Unknown

                            </span>

                        </td>

                        <td class="text-center">

                            Never

                        </td>

                        <td class="text-center">

                            <span class="badge badge-warning">

                                Waiting

                            </span>

                        </td>

                        <td>

                            <div class="btn-group">

                                <button class="btn btn-xs btn-success btn-run-cron" data-id="{{ $project->id }}">

                                    <i class="fas fa-play"></i>

                                </button>

                                <button class="btn btn-xs btn-info btn-cron-status" data-id="{{ $project->id }}">

                                    <i class="fas fa-heartbeat"></i>

                                </button>

                                <button class="btn btn-xs btn-primary btn-cron-log" data-id="{{ $project->id }}">

                                    <i class="fas fa-file-alt"></i>

                                </button>

                                <button class="btn btn-xs btn-warning btn-cron-history" data-id="{{ $project->id }}">

                                    <i class="fas fa-history"></i>

                                </button>

                            </div>

                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>

</div>
