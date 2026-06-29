<div class="row">
    {{-- PHP --}}
    <div class="col-md-4">
        <div class="info-box bg-gradient-primary">
            <span class="info-box-icon">
                <i class="fab fa-php"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">PHP</span>
                <span class="info-box-number">{{ $project->environment->php_version ?? '-' }}</span>
            </div>
        </div>
    </div>

    {{-- Laravel --}}
    <div class="col-md-4">
        <div class="info-box bg-gradient-danger">
            <span class="info-box-icon">
                <i class="fab fa-laravel"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">Laravel</span>
                <span class="info-box-number">{{ $project->environment->laravel_version ?? '-' }}</span>
            </div>
        </div>
    </div>

    {{-- Node --}}
    <div class="col-md-4">
        <div class="info-box bg-gradient-success">
            <span class="info-box-icon">
                <i class="fab fa-node-js"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Node</span>
                <span class="info-box-number">{{ $project->environment->node_version ?? '-' }}</span>
            </div>
        </div>
    </div>
</div>