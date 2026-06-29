<div class="card card-outline card-info">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-cogs mr-2"></i>

            Build Information

        </h3>

    </div>

    <div class="card-body table-responsive p-0">

        <table class="table table-striped">

            <tr>
                <th width="220">Build Number</th>
                <td>{{ $project->deployment->build_number ?? '-' }}</td>
            </tr>

            <tr>
                <th>Build Duration</th>
                <td>{{ $project->deployment->build_duration ?? '-' }}</td>
            </tr>

            <tr>
                <th>Release Version</th>
                <td>{{ $project->deployment->release_version ?? '-' }}</td>
            </tr>

            <tr>
                <th>Artifact</th>
                <td>{{ $project->deployment->artifact_name ?? '-' }}</td>
            </tr>

        </table>

    </div>

</div>
