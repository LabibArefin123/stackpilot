<div class="card card-outline card-primary">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-filter"></i>

            Project Filter

        </h3>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-4">

                <select class="form-control" id="projectFilter">

                    <option value="">All Projects</option>

                    @foreach ($projects as $project)
                        <option value="{{ $project->name }}">

                            {{ $project->name }}

                        </option>
                    @endforeach

                </select>

            </div>

        </div>

    </div>

</div>
