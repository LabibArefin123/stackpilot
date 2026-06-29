<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $project->is_active ? 'Active' : 'Offline' }}</h3>
                <p>Project Status</p>
            </div>

            <div class="icon">
                <i class="fas fa-check-circle"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ optional($project->environment)->environment ?? '-' }}</h3>
                <p>Environment</p>
            </div>

            <div class="icon">
                <i class="fas fa-server"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ optional($project->environment)->php_version }}</h3>
                <p>PHP Version</p>
            </div>

            <div class="icon">
                <i class="fab fa-php"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ optional($project->environment)->laravel_version }}</h3>
                <p>Laravel</p>
            </div>

            <div class="icon">
                <i class="fab fa-laravel"></i>
            </div>
        </div>
    </div>
</div>
