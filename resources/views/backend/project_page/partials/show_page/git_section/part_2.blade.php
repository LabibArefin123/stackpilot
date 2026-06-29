<div class="card-header">
    <h3 class="card-title">
        <i class="fab fa-git-alt text-danger"></i>
        Repository Checklist
    </h3>
</div>

<div class="card-body">
    <div class="row">
        @php
            $checks = [
                'Git Repository Initialized' => $git['repository'] ?? false,
                'Remote Origin Configured' => $git['remote'] ?? false,
                'Working Tree Clean' => $git['working_tree'] ?? false,
                'Current Branch Available' => $git['branch_exists'] ?? false,
                'Latest Commit Found' => $git['latest_commit'] ?? false,
                'Repository Connected' => $git['connected'] ?? false,
                'Fetch Successful' => $git['fetch_ok'] ?? false,
                'Push Permission' => $git['push_access'] ?? false,
            ];
        @endphp
        @foreach ($checks as $title => $status)
            <div class="col-md-6 mb-3">
                <div class="info-box">
                    <span class="info-box-icon {{ $status ? 'bg-success' : 'bg-danger' }}">
                        <i class="fas {{ $status ? 'fa-check' : 'fa-times' }}"></i>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">
                            {{ $title }}
                        </span>

                        <span class="info-box-number">
                            {{ $status ? 'Healthy' : 'Problem Detected' }}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
