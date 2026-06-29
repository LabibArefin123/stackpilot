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
                    <th width="220">Project Name</th>
                    <td>{{ $project->name }}</td>
                </tr>

                <tr>
                    <th>Domain</th>
                    <td>
                        <a href="https://{{ $project->domain }}" target="_blank">
                            {{ $project->domain }}
                        </a>
                    </td>
                </tr>

                <tr>
                    <th>Git Repository</th>
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
