<div class="card card-outline card-warning">
    <div class="card-header">
        <h3 class="card-title">Last Health Scan</h3>
    </div>

    <div class="card-body">
        <table class="table">
            <tr>
                <th width="250">Last Scan</th>
                <td>{{ optional($project->health->checked_at)->format('d M Y, h:i A') }}</td>
            </tr>

            <tr>
                <th>Health Score</th>
                <td>
                    <strong>{{ $project->health->health_score ?? 0 }}%</strong>
                </td>
            </tr>
        </table>
    </div>
</div>
