    <div class="col-md-12">
        <div class="card card-primary card-outline">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-folder-open"></i>
                    Project Information
                </h3>
            </div>

            <div class="card-body">

                <div class="row">

                    <!-- Project Name -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Project Name <span class="text-danger">*</span></label>

                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter Project Name" value="{{ old('name') }}">

                            @error('name')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Domain -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Domain</label>

                            <input type="text" name="domain" class="form-control" placeholder="example.com"
                                value="{{ old('domain') }}">
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
