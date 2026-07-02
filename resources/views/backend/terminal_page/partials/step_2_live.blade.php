<div class="card card-success shadow">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-server"></i>
            Step 2 : Live Server
        </h3>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label> Live Project</label>
                    <select class="form-control" id="live_project">
                        <option value="">Select Project</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}" data-domain="{{ $project->domain }}"
                                data-api="{{ $project->api_name }}">
                                {{ $project->project_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Server Root</label>
                    <input class="form-control" value="/home/labibwor/" readonly>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-success">
                        <i class="fas fa-globe"></i>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">
                            Domain
                        </span>

                        <span class="info-box-number" id="live_domain">
                            -
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-primary">
                        <i class="fas fa-link"></i>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">
                            API
                        </span>

                        <span class="info-box-number" id="live_api">
                            -
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-warning">
                        <i class="fas fa-heartbeat"></i>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">
                            Status
                        </span>

                        <span class="info-box-number" id="server_status">
                            Unknown
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="text-center">
            <button class="btn btn-success">
                <i class="fas fa-plug"></i>
                Connect
            </button>

            <button class="btn btn-info">
                <i class="fas fa-heartbeat"></i>
                Server Status
            </button>

            <button class="btn btn-warning">
                <i class="fas fa-sync"></i>
                Refresh
            </button>
        </div>
    </div>
</div>
