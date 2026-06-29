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
