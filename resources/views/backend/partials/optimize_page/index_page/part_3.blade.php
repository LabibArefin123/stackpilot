<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-project-diagram mr-2"></i>
            Laravel Projects
        </h3>
    </div>

    <div class="card-body">
        <table id="dataTables" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th width="40">#</th>
                    <th>Project</th>
                    <th>Domain</th>
                    <th>Branch</th>
                    <th>Health</th>
                    <th width="120">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <strong>{{ $project->name }}</strong>
                        </td>
                        <td>{{ $project->domain ?? 'Local Development' }}</td>
                        <td>
                            <span class="badge badge-info">
                                {{ $project->git_branch }}
                            </span>
                        </td>

                        <td>
                            @php
                                $score = optional($project->health)->health_score ?? 0;
                            @endphp
                            @if ($score >= 90)
                                <span class="badge badge-success">Excellent</span>
                            @elseif($score >= 70)
                                <span class="badge badge-warning">Good</span>
                            @else
                                <span class="badge badge-danger">Unknown </span>
                            @endif
                        </td>

                        <td>
                            <button class="btn btn-success btn-sm run-project" data-toggle="modal"
                                data-target="#optimizeMethodModal" data-project="{{ $project->id }}"
                                data-domain="{{ $project->domain }}" data-name="{{ $project->name }}">
                                <i class="fas fa-bolt"></i>
                                Optimize
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
