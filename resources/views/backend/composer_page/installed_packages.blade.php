@extends('adminlte::page')

@section('title', 'Installed Composer Packages')

@section('content')

    <div class="row">

        <div class="col-md-12">

            <div class="card card-primary card-outline">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-cubes"></i>

                        Installed Composer Packages

                    </h3>

                </div>

                <div class="card-body">

                    <div class="form-group">

                        <label>Select Project</label>

                        <select id="project" class="form-control">

                            <option value="">Choose Project</option>

                            @foreach ($projects as $project)
                                <option value="{{ $project->project_path }}">
                                    {{ $project->name }}
                                </option>
                            @endforeach

                        </select>

                    </div>

                    <hr>

                    <table class="table table-bordered table-hover" id="packageTable">

                        <thead>

                            <tr>

                                <th width="50">#</th>

                                <th>Package</th>

                                <th width="180">Version</th>

                                <th width="180">Type</th>

                            </tr>

                        </thead>

                        <tbody>

                            <tr>

                                <td colspan="4" class="text-center">

                                    Select a project.

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>
    <div style="height: 50px;"></div>
@endsection

@push('js')
    <script>
        const composerPackagesRoute = "{{ route('composer.packages') }}";
    </script>
    <script src="{{ asset('js/custom_backend/composer_page/package_page/package_load.js') }}"></script>
@endpush
