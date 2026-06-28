<div class="row">

    <div class="col-md-3">

        <div class="small-box bg-primary">

            <div class="inner">

                <h3>{{ $projects->count() }}</h3>

                <p>Total Projects</p>

            </div>

            <div class="icon">

                <i class="fas fa-project-diagram"></i>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>{{ config('app.timezone') }}</h3>

                <p>Application Timezone</p>

            </div>

            <div class="icon">

                <i class="fas fa-globe"></i>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="small-box bg-warning">

            <div class="inner">

                <h3>{{ PHP_VERSION }}</h3>

                <p>PHP Version</p>

            </div>

            <div class="icon">

                <i class="fab fa-php"></i>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="small-box bg-danger">

            <div class="inner">

                <h3>{{ now()->format('H:i:s') }}</h3>

                <p>Server Time</p>

            </div>

            <div class="icon">

                <i class="fas fa-clock"></i>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-md-3">

        <div class="small-box bg-info">

            <div class="inner">

                <h3>{{ app()->version() }}</h3>

                <p>Laravel Version</p>

            </div>

            <div class="icon">

                <i class="fab fa-laravel"></i>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="small-box bg-secondary">

            <div class="inner">

                <h3>{{ php_uname('n') }}</h3>

                <p>Host Name</p>

            </div>

            <div class="icon">

                <i class="fas fa-server"></i>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="small-box bg-indigo">

            <div class="inner">

                <h3>{{ strtoupper(substr(PHP_OS, 0, 3)) }}</h3>

                <p>Operating System</p>

            </div>

            <div class="icon">

                <i class="fas fa-desktop"></i>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="small-box bg-teal">

            <div class="inner">

                <h3>{{ number_format(disk_free_space('/') / 1024 / 1024 / 1024, 1) }} GB</h3>

                <p>Free Disk Space</p>

            </div>

            <div class="icon">

                <i class="fas fa-hdd"></i>

            </div>

        </div>

    </div>

</div>
