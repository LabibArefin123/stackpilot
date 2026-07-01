<!-- ==========================================
    Live Server Laravel Logs
========================================== -->
<div class="card card-outline card-success">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-cloud mr-2"></i>

            Live Server Logs

        </h3>

        <div class="card-tools">

            <span class="badge badge-success">

                {{ count($liveServerLogs) }} Logs

            </span>

        </div>

    </div>

    <div class="card-body">

        <table id="liveServerLogTable" class="table table-bordered table-hover table-striped">

            <thead>

                <tr>

                    <th width="60">#</th>

                    <th width="180">Project</th>

                    <th width="100">Level</th>

                    <th width="170">Date</th>

                    <th>Message</th>

                    <th width="120">Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($liveServerLogs as $log)
                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            <span class="font-weight-bold">

                                {{ $log['project'] }}

                            </span>

                        </td>

                        <td>

                            @php

                                $badge = match (strtoupper($log['level'])) {
                                    'ERROR' => 'danger',

                                    'CRITICAL' => 'danger',

                                    'WARNING' => 'warning',

                                    'NOTICE' => 'info',

                                    'INFO' => 'primary',

                                    'DEBUG' => 'secondary',

                                    default => 'dark',
                                };

                            @endphp

                            <span class="badge badge-{{ $badge }}">

                                {{ strtoupper($log['level']) }}

                            </span>

                        </td>

                        <td>

                            {{ optional($log['date'])->format('Y-m-d H:i:s') }}

                        </td>

                        <td>

                            {{ Str::limit($log['message'], 100) }}

                        </td>

                        <td>

                            <button class="btn btn-info btn-xs view-log-details" data-project="{{ $log['project'] }}"
                                data-level="{{ $log['level'] }}"
                                data-date="{{ optional($log['date'])->format('Y-m-d H:i:s') }}"
                                data-message="{{ $log['message'] }}" data-details="{{ e($log['details']) }}">

                                <i class="fas fa-eye"></i>

                                View

                            </button>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center text-muted py-5">

                            <i class="fas fa-server fa-4x text-success mb-3"></i>

                            <h5>

                                No Live Server Logs Found

                            </h5>

                            <small>

                                StackPilot could not retrieve any production logs.

                            </small>

                        </td>

                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</div>
