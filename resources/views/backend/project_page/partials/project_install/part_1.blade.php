<div class="card card-outline card-primary">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-folder-open mr-2"></i>

            Project Information

        </h3>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-6">

                <div class="form-group">

                    <label>

                        Select Project

                    </label>

                    <select name="project_id" id="project_id" class="form-control select2">

                        <option value="">

                            Select Project

                        </option>

                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">

                                {{ $project->name }}

                            </option>
                        @endforeach

                    </select>

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-group">

                    <label>

                        Git Branch

                    </label>

                    <input type="text" class="form-control" value="main" readonly>

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-group">

                    <label>

                        Environment

                    </label>

                    <input type="text" class="form-control" value="Production" readonly>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-md-3">

                <div class="small-box bg-info">

                    <div class="inner">

                        <h3>

                            PHP

                        </h3>

                        <p>

                            8.2

                        </p>

                    </div>

                    <div class="icon">

                        <i class="fab fa-php"></i>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="small-box bg-success">

                    <div class="inner">

                        <h3>

                            Laravel

                        </h3>

                        <p>

                            11.x

                        </p>

                    </div>

                    <div class="icon">

                        <i class="fab fa-laravel"></i>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="small-box bg-warning">

                    <div class="inner">

                        <h3>

                            Git

                        </h3>

                        <p>

                            Connected

                        </p>

                    </div>

                    <div class="icon">

                        <i class="fab fa-git-alt"></i>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="small-box bg-primary">

                    <div class="inner">

                        <h3>

                            Ready

                        </h3>

                        <p>

                            Installation

                        </p>

                    </div>

                    <div class="icon">

                        <i class="fas fa-check-circle"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
