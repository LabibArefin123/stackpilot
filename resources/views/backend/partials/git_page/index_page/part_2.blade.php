<div class="card shadow-sm border-0">
    <div class="card-header bg-primary">
        <h5 class="mb-0">
            <i class="fas fa-filter mr-2"></i>
            Repository Filters
        </h5>
    </div>

    <div class="card-body">
        <div class="row">

            <div class="col-md-5">

                <label>Repository</label>

                <input type="text" id="repositorySearch" class="form-control" placeholder="Search repository...">

            </div>

            <div class="col-md-3">

                <label>Status</label>

                <select id="statusFilter" class="form-control">

                    <option value="All">All Status</option>
                    <option value="Healthy">Healthy</option>
                    <option value="Inactive">Inactive</option>

                </select>

            </div>

            <div class="col-md-4">

                <label>Branch</label>

                <select id="branchFilter" class="form-control">

                    <option value="All">All Branches</option>

                    @foreach ($projects->pluck('git_branch')->filter()->unique() as $branch)
                        <option value="{{ $branch }}">
                            {{ $branch }}
                        </option>
                    @endforeach

                </select>

            </div>

        </div>
    </div>
</div>
