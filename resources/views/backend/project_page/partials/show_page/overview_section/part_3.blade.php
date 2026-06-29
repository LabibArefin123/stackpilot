<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Recent Terminal Commands
                </h3>
            </div>

            <div class="card-body">
                <table class="table table-hover" id="dataTables">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Command</th>
                            <th>Status</th>
                            <th>Executed</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($project->commands->take(10) as $command)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><code>{{ $command->command }}</code></td>
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
                                    <span class="text-muted">
                                        ({{ \Carbon\Carbon::parse($command->executed_at)->format('d F Y, h:i A') }})
                                    </span>
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
