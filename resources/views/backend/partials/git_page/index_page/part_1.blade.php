<div class="row">

    <div class="col-lg-3 col-md-6">

        <div class="info-box bg-gradient-primary">

            <span class="info-box-icon">

                <i class="fas fa-folder-open"></i>

            </span>

            <div class="info-box-content">

                <span class="info-box-text">

                    Repositories

                </span>

                <span class="info-box-number">

                    {{ $projects->count() }}

                </span>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="info-box bg-gradient-success">

            <span class="info-box-icon">

                <i class="fas fa-check-circle"></i>

            </span>

            <div class="info-box-content">

                <span class="info-box-text">

                    Healthy

                </span>

                <span class="info-box-number">

                    {{ $projects->where('is_active', 1)->count() }}

                </span>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="info-box bg-gradient-warning">

            <span class="info-box-icon">

                <i class="fas fa-code-branch"></i>

            </span>

            <div class="info-box-content">

                <span class="info-box-text">

                    Branches

                </span>

                <span class="info-box-number">

                    {{ $projects->pluck('git_branch')->filter()->count() }}

                </span>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="info-box bg-gradient-danger">

            <span class="info-box-icon">

                <i class="fab fa-github"></i>

            </span>

            <div class="info-box-content">

                <span class="info-box-text">

                    Connected

                </span>

                <span class="info-box-number">

                    {{ $projects->whereNotNull('git_repository')->count() }}

                </span>

            </div>

        </div>

    </div>

</div>
