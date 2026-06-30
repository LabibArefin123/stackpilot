<div class="col-md-12">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                Repository Statistics
            </h3>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <tr>
                    <th>Local Branches</th>
                    <td>{{ count($git['local_branches']) }}</td>
                </tr>

                <tr>
                    <th>Remote Branches</th>
                    <td>{{ count($git['remote_branches']) }}</td>
                </tr>

                <tr>
                    <th>Total Contributors</th>
                    <td> {{ $git['total_contributors'] }}</td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>
                        @if ($git['working_tree'])
                            <span class="badge badge-success">Clean</span>
                        @else
                            <span class="badge badge-warning">Modified</span>
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>Remote</th>
                    <td>{{ $git['remote_name'] }}</td>
                </tr>

                <tr>
                    <th>Default Remote Branch</th>
                    <td>{{ $git['default_remote_branch'] }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
