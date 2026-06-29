<div class="col-md-6">
    <h5 class="mb-3">
        <i class="fas fa-cloud"></i>
        Remote Branches
    </h5>

    @forelse($git['remote_branches'] as $branch)
        <div class="info-box mb-2">
            <span class="info-box-icon bg-primary">
                <i class="fas fa-network-wired"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">
                    {{ trim($branch) }}
                </span>

                <span class="info-box-number">
                    Remote Repository
                </span>
            </div>
        </div>
    @empty
        <div class="alert alert-secondary">
            No Remote Branches Found
        </div>
    @endforelse
</div>
