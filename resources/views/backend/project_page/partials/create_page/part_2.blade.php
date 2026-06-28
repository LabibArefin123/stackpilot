<div class="col-md-12">
    <div class="card card-success card-outline">

        <div class="card-header">
            <h3 class="card-title">
                <i class="fab fa-git-alt"></i>
                Git Configuration
            </h3>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Git Repository</label>

                        <input type="text" name="git_repository" class="form-control"
                            placeholder="https://github.com/user/project.git" value="{{ old('git_repository') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Git Branch</label>

                        <input type="text" name="git_branch" class="form-control"
                            value="{{ old('git_branch', 'main') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Default Branch</label>

                        <input type="text" name="default_branch" class="form-control"
                            value="{{ old('default_branch', 'main') }}">
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Git Status</label>

                        <select name="git_status" class="form-control">

                            <option value="">Select Status</option>
                            <option value="Connected">Connected</option>
                            <option value="Disconnected">Disconnected</option>
                            <option value="Unknown">Unknown</option>

                        </select>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
