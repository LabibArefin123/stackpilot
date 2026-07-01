<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-project-diagram mr-2"></i>
            Laravel Projects
        </h3>
    </div>
    <div class="card-header">
        <ul class="nav nav-tabs justify-content-end" id="projectTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="local-project-tab" data-toggle="tab" href="#local-project" role="tab"
                    aria-controls="local-project" aria-selected="true">
                    <i class="fas fa-laptop mr-1"></i>
                    Local Projects
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="live-project-tab" data-toggle="tab" href="#live-project" role="tab"
                    aria-controls="live-project" aria-selected="false">
                    <i class="fas fa-server mr-1"></i>
                    Live Projects
                </a>
            </li>
        </ul>
    </div>

    <div class="card-body">
        <div class="tab-content">
            {{-- LOCAL PROJECTS --}}
            <div class="tab-pane fade show active" id="local-project" role="tabpanel">
                <table id="localProjectsTable" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th width="40">#</th>
                            <th>Project</th>
                            <th>Domain</th>
                            <th>Branch</th>
                            <th>Health</th>
                            <th width="250">Action</th>
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
                                        <span class="badge badge-danger">Unknown</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm run-project"
                                        data-project="{{ $project->id }}" data-domain="{{ $project->domain }}"
                                        data-name="{{ $project->name }}">
                                        <i class="fas fa-bolt"></i>
                                        Optimize
                                    </button>
                                    <button class="btn btn-dark btn-sm open-terminal"
                                        data-project="{{ $project->id }}" data-name="{{ $project->name }}"
                                        data-domain="{{ $project->domain }}" data-path="{{ $project->project_path }}">
                                        <i class="fas fa-terminal"></i>
                                        Open Terminal
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- LIVE PROJECTS --}}
            <div class="tab-pane fade" id="live-project" role="tabpanel">
                <table id="liveProjectsTable" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th width="40">#</th>
                            <th>Project</th>
                            <th>Domain</th>
                            <th>Server</th>
                            <th>Status</th>
                            <th width="120">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        {{-- Live Projects will come later --}}

                    </tbody>

                </table>

                <div class="text-center text-muted py-5">
                    <i class="fas fa-server fa-3x mb-3"></i>
                    <h5>No Live Projects Available</h5>
                    <p>
                        Live server projects will appear here after integration.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
