<div class="card card-outline card-success">
    <div class="card-header">
        <h3 class="card-title">Health Checklist</h3>
    </div>

    <div class="card-body">
        <div class="row">
            @php
                $checks = [
                    'Git Repository' => $project->health->git_ok,
                    'Composer' => $project->health->composer_ok,
                    'Node.js' => $project->health->node_ok,
                    'Queue Worker' => $project->health->queue_ok,
                    'Cron Scheduler' => $project->health->cron_ok,
                    'Storage Link' => $project->health->storage_link_ok,
                    '.env Configuration' => $project->health->env_ok,
                ];
            @endphp

            @foreach ($checks as $title => $status)
                <div class="col-md-6 mb-3">
                    <div class="info-box">
                        <span class="info-box-icon {{ $status ? 'bg-success' : 'bg-danger' }}">
                            <i class="fas {{ $status ? 'fa-check' : 'fa-times' }}"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ $title }}</span>
                            <span class="info-box-number">{{ $status ? 'Healthy' : 'Problem Detected' }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
