<div class="card-header">

    <h3 class="card-title">

        <i class="fas fa-code-branch text-primary"></i>

        Git Branches

    </h3>

</div>

<div class="card-body">

    <div class="row">

        {{-- Local Branches --}}

        <div class="col-md-6">

            <h5 class="mb-3">

                <i class="fas fa-laptop"></i>

                Local Branches

            </h5>

            @forelse($git['local_branches'] as $branch)
                <div class="info-box mb-2">

                    <span class="info-box-icon {{ trim($branch) == $git['branch'] ? 'bg-success' : 'bg-secondary' }}">

                        <i class="fas {{ trim($branch) == $git['branch'] ? 'fa-check' : 'fa-code-branch' }}"></i>

                    </span>

                    <div class="info-box-content">

                        <span class="info-box-text">

                            {{ trim($branch) }}

                        </span>

                        <span class="info-box-number">

                            @if (trim($branch) == $git['branch'])
                                Active Branch
                            @else
                                Local
                            @endif

                        </span>

                    </div>

                </div>

            @empty

                <div class="alert alert-secondary">

                    No Local Branches Found

                </div>
            @endforelse

        </div>

        {{-- Remote Branches --}}

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

    </div>

</div>
