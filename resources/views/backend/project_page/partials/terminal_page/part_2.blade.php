<div class="row">

    <div class="col-md-3">

        <div class="small-box bg-info">

            <div class="inner">

                <h3>{{ $stats['total'] }}</h3>

                <p>Total Commands</p>

            </div>

            <div class="icon">

                <i class="fas fa-terminal"></i>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>{{ $stats['success'] }}</h3>

                <p>Successful</p>

            </div>

            <div class="icon">

                <i class="fas fa-check-circle"></i>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="small-box bg-danger">

            <div class="inner">

                <h3>{{ $stats['failed'] }}</h3>

                <p>Failed</p>

            </div>

            <div class="icon">

                <i class="fas fa-times-circle"></i>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="small-box bg-warning">

            <div class="inner">

                <h3>{{ $stats['runtime'] }} s</h3>

                <p>Average Runtime</p>

            </div>

            <div class="icon">

                <i class="fas fa-stopwatch"></i>

            </div>

        </div>

    </div>

</div>
