{{-- Deployment Information --}}
<div class="col-md-12">

    <div class="card card-outline card-success">

        <div class="card-header">

            <h3 class="card-title">
                <i class="fas fa-rocket mr-2"></i>
                Deployment Information
            </h3>

        </div>

        <div class="card-body table-responsive p-0">

            <table class="table table-striped">

                <tr>
                    <th width="220">Deployment Status</th>
                    <td>

                        @php
                            $status = $project->deployment->status ?? 'pending';
                        @endphp

                        @switch($status)
                            @case('success')
                                <span class="badge badge-success">
                                    Successful
                                </span>
                            @break

                            @case('failed')
                                <span class="badge badge-danger">
                                    Failed
                                </span>
                            @break

                            @case('running')
                                <span class="badge badge-warning">
                                    Running
                                </span>
                            @break

                            @default
                                <span class="badge badge-secondary">
                                    Pending
                                </span>
                        @endswitch

                    </td>

                </tr>

                <tr>
                    <th>Deployment Method</th>
                    <td>{{ $project->deployment->method ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Deployment Server</th>
                    <td>{{ $project->deployment->server ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Deployment Time</th>
                    <td>

                        {{ optional($project->deployment->deployed_at)->diffForHumans() }}

                    </td>

                </tr>

            </table>

        </div>

    </div>

</div>
