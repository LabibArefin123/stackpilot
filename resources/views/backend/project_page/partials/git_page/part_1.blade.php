<div class="row">

    <!-- Repository Health -->

    <div class="col-md-3">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>

                    {{ $git['health'] ?? 0 }}%

                </h3>

                <p>

                    Repository Health

                </p>

            </div>

            <div class="icon">

                <i class="fab fa-git-alt"></i>

            </div>

        </div>

    </div>

    <!-- Current Branch -->

    <div class="col-md-3">

        <div class="small-box bg-primary">

            <div class="inner">

                <h3>

                    {{ $git['branch'] ?? 'Unknown' }}

                </h3>

                <p>

                    Current Branch

                </p>

            </div>

            <div class="icon">

                <i class="fas fa-code-branch"></i>

            </div>

        </div>

    </div>

    <!-- Git Status -->

    <div class="col-md-3">

        <div class="small-box {{ ($git['status'] ?? '') == 'Connected' ? 'bg-success' : 'bg-danger' }}">

            <div class="inner">

                <h3>

                    <i
                        class="fas {{ ($git['status'] ?? '') == 'Connected' ? 'fa-check-circle' : 'fa-times-circle' }}"></i>

                </h3>

                <p>

                    {{ $git['status'] ?? 'Disconnected' }}

                </p>

            </div>

            <div class="icon">

                <i class="fas fa-network-wired"></i>

            </div>

        </div>

    </div>

    <!-- Git Commands -->

    <div class="col-md-3">

        <div class="small-box bg-info">

            <div class="inner">

                <h3>

                    {{ $git['commits'] ?? 0 }}

                </h3>

                <p>

                    Git Commands

                </p>

            </div>

            <div class="icon">

                <i class="fas fa-terminal"></i>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-md-12">

        <div class="card">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fab fa-git-alt text-danger"></i>

                    Repository Health

                </h3>

            </div>

            <div class="card-body">

                <div class="progress progress-lg">

                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar"
                        style="width: {{ $git['health'] ?? 0 }}%;">

                        {{ $git['health'] ?? 0 }}%

                    </div>

                </div>

                <div class="mt-3">

                    @if (($git['health'] ?? 0) >= 90)
                        <span class="badge badge-success">

                            <i class="fas fa-check-circle"></i>

                            Excellent Repository Condition

                        </span>
                    @elseif(($git['health'] ?? 0) >= 70)
                        <span class="badge badge-warning">

                            <i class="fas fa-exclamation-circle"></i>

                            Repository Needs Attention

                        </span>
                    @else
                        <span class="badge badge-danger">

                            <i class="fas fa-times-circle"></i>

                            Repository Has Critical Issues

                        </span>
                    @endif

                </div>

            </div>

        </div>

    </div>

</div>
