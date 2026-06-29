<div class="row">
    <div class="col-md-4">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $project->health->health_score ?? 0 }}%</h3>
                <p>Overall Health</p>
            </div>
            <div class="icon">
                <i class="fas fa-heartbeat"></i>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="progress">
                    <div class="progress-bar bg-success" style="width:{{ $project->health->health_score ?? 0 }}%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>