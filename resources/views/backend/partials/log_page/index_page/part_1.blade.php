<div class="row">
    <div class="col-lg-3">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $projects->count() }}</h3>
                <p>Projects</p>
            </div>

            <div class="icon">
                <i class="fas fa-project-diagram"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ count($gitLogs) }}</h3>
                <p>Git Activities</p>
            </div>

            <div class="icon">
                <i class="fab fa-git-alt"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ count($serverLogs) }}</h3>
                <p>Server Logs</p>
            </div>

            <div class="icon">
                <i class="fas fa-server"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ now()->format('d M Y') }}</h3>
                <p>Today</p>
            </div>

            <div class="icon">
                <i class="fas fa-calendar"></i>
            </div>
        </div>
    </div>
</div>
