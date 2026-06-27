<div class="card card-outline card-warning">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-tools mr-2"></i>

            Optimization Commands

        </h3>

    </div>

    <div class="card-body">

        <div class="row">

            @foreach ($commands as $command)
                <div class="col-lg-4 col-md-6 mb-3">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body text-center">

                            <div class="mb-3">

                                <i class="{{ $command['icon'] }} fa-3x text-{{ $command['color'] }}"></i>

                            </div>

                            <h4>

                                {{ $command['title'] }}

                            </h4>

                            <div class="my-3">

                                <code>

                                    {{ $command['artisan'] }}

                                </code>

                            </div>

                            <button class="btn btn-{{ $command['color'] }} btn-block run-command"
                                data-command="{{ $command['command'] }}">

                                <i class="fas fa-play mr-1"></i>

                                Execute

                            </button>

                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    </div>

</div>
