<div class="row">

    <div class="col-md-8">

        <div class="card">

            <div class="card-header bg-dark">

                <h3 class="card-title">

                    <i class="fas fa-terminal"></i>

                    StackPilot Terminal

                </h3>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6">

                        <label>

                            Current Project

                        </label>

                        <input class="form-control" value="{{ $project->name }}" readonly>

                    </div>

                    <div class="col-md-3">

                        <label>

                            Environment

                        </label>

                        <input class="form-control" value="{{ app()->environment() }}" readonly>

                    </div>

                    <div class="col-md-3">

                        <label>

                            Status

                        </label>

                        <input class="form-control bg-success" value="ONLINE" readonly>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="small-box bg-dark">

            <div class="inner">

                <h3>

                    {{ $stats['total'] }}

                </h3>

                <p>

                    Commands Executed

                </p>

            </div>

            <div class="icon">

                <i class="fas fa-terminal"></i>

            </div>

        </div>

    </div>

</div>
