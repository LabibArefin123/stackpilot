@extends('adminlte::page')

@section('title', 'Composer Manager')

@section('content')

    <div class="row">

        <div class="col-md-3">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $projects->count() }}</h3>
                    <p>Total Projects</p>
                </div>
                <div class="icon">
                    <i class="fas fa-folder-open"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $projects->where('composer.lock', true)->count() }}</h3>
                    <p>composer.lock</p>
                </div>
                <div class="icon">
                    <i class="fas fa-lock"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $projects->where('composer.vendor', true)->count() }}</h3>
                    <p>Vendor Folder</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box-open"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $projects->sum(fn($p) => $p->composer['package_count'] ?? 0) }}</h3>
                    <p>Total Packages</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cubes"></i>
                </div>
            </div>
        </div>

    </div>


    <div class="card card-primary card-outline collapsed-card">

        <div class="card-header">

            <h3 class="card-title">

                <i class="fas fa-terminal"></i>

                Composer Quick Actions

            </h3>

            <div class="card-tools">

                <button type="button" class="btn btn-tool" data-card-widget="collapse">

                    <i class="fas fa-plus"></i>

                </button>

            </div>

        </div>

        <div class="card-body">

            <div class="alert alert-info">

                <i class="fas fa-info-circle"></i>

                Select a project below then use the Composer Terminal
                to run install, update, dump-autoload,
                require packages and more.

            </div>

        </div>

    </div>


    <div class="card">
        {{-- MODALS FOR ACTION PAGE --}}
        @include('backend.composer_page.modals.modal_json')
        @include('backend.composer_page.modals.modal_packages')
        <div class="card-header">

            <h3 class="card-title">

                <i class="fab fa-php"></i>

                Composer Dashboard

            </h3>

        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover table-striped" id="dataTables">

                <thead>

                    <tr>

                        <th>Project</th>

                        <th width="90">PHP</th>

                        <th width="90">Laravel</th>

                        <th width="90">Composer</th>

                        <th width="80">Packages</th>

                        <th width="70">Lock</th>

                        <th width="70">Vendor</th>

                        <th width="90">Autoload</th>

                        <th width="220">Actions</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($projects as $project)
                        <tr>

                            <td>

                                <strong>{{ $project->name }}</strong>

                            </td>

                            <td>

                                <span class="badge badge-info">

                                    {{ $project->composer['php'] ?? '-' }}

                                </span>

                            </td>

                            <td>

                                <span class="badge badge-success">

                                    {{ $project->composer['laravel'] ?? '-' }}

                                </span>

                            </td>

                            <td>

                                <span class="badge badge-primary">

                                    {{ $project->composer['version'] ?? '-' }}

                                </span>

                            </td>

                            <td>

                                <span class="badge badge-dark">

                                    {{ $project->composer['package_count'] ?? 0 }}

                                </span>

                            </td>

                            <td>

                                @if ($project->composer['lock'] ?? false)
                                    <span class="badge badge-success">

                                        Yes

                                    </span>
                                @else
                                    <span class="badge badge-danger">

                                        No

                                    </span>
                                @endif

                            </td>

                            <td>

                                @if ($project->composer['vendor'] ?? false)
                                    <span class="badge badge-success">

                                        Yes

                                    </span>
                                @else
                                    <span class="badge badge-danger">

                                        No

                                    </span>
                                @endif

                            </td>

                            <td>

                                @if ($project->composer['autoload'] ?? false)
                                    <span class="badge badge-success">

                                        Ready

                                    </span>
                                @else
                                    <span class="badge badge-warning">

                                        Missing

                                    </span>
                                @endif

                            </td>

                            <td>

                                <div class="btn-group">
                                    <button class="btn btn-xs btn-primary btn-composer-json" data-id="{{ $project->id }}">

                                        <i class="fas fa-file-code"></i>

                                        JSON

                                    </button>

                                    <button class="btn btn-xs btn-success btn-composer-packages"
                                        data-id="{{ $project->id }}">

                                        <i class="fas fa-cubes"></i>

                                        Packages

                                    </button>

                                    <button class="btn btn-xs btn-dark btn-composer-terminal" data-id="{{ $project->id }}"
                                        data-name="{{ $project->name }}">

                                        <i class="fas fa-terminal"></i>

                                        Terminal

                                    </button>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9" class="text-center">

                                No Composer projects found.

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
    <div class="card mt-4">
        <div class="card-body" style="height:50px;"> <!-- spacing card --> </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('js/custom_backend/composer_page/index_page/composer_modal.js') }}"></script>
    <script src="{{ asset('js/custom_backend/composer_page/index_page/composer_packages.js') }}"></script>
@endpush
