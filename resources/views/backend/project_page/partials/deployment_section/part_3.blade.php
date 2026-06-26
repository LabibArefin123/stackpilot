<div class="row">

    <div class="col-md-3">

        <div class="info-box bg-gradient-success">

            <span class="info-box-icon">

                <i class="fas fa-check-circle"></i>

            </span>

            <div class="info-box-content">

                <span class="info-box-text">

                    Successful Deployments

                </span>

                <span class="info-box-number">

                    {{ $project->deployment->success_count ?? 0 }}

                </span>

            </div>

        </div>

    </div>


    <div class="col-md-3">

        <div class="info-box bg-gradient-danger">

            <span class="info-box-icon">

                <i class="fas fa-times-circle"></i>

            </span>

            <div class="info-box-content">

                <span class="info-box-text">

                    Failed Deployments

                </span>

                <span class="info-box-number">

                    {{ $project->deployment->failed_count ?? 0 }}

                </span>

            </div>

        </div>

    </div>


    <div class="col-md-3">

        <div class="info-box bg-gradient-warning">

            <span class="info-box-icon">

                <i class="fas fa-sync"></i>

            </span>

            <div class="info-box-content">

                <span class="info-box-text">

                    Current Version

                </span>

                <span class="info-box-number">

                    {{ $project->deployment->version ?? '-' }}

                </span>

            </div>

        </div>

    </div>


    <div class="col-md-3">

        <div class="info-box bg-gradient-info">

            <span class="info-box-icon">

                <i class="fas fa-clock"></i>

            </span>

            <div class="info-box-content">

                <span class="info-box-text">

                    Last Deployment

                </span>

                <span class="info-box-number">

                    {{ optional($project->deployment->deployed_at)->diffForHumans() }}

                </span>

            </div>

        </div>

    </div>
</div>
