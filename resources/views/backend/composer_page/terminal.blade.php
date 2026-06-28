@extends('adminlte::page')

@section('title', 'Composer Terminal')

@section('content')

    <div class="row">

        <div class="col-md-12">

            <div class="card card-dark card-outline">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-terminal"></i>

                        Composer Terminal

                    </h3>

                    <div class="card-tools">

                        <button class="btn btn-tool" data-card-widget="maximize">

                            <i class="fas fa-expand"></i>

                        </button>

                    </div>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4">

                            <label>Project</label>

                            <select class="form-control" id="project">

                                <option value="">Select Project</option>

                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">

                                        {{ $project->name }}

                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-4">

                            <label>Composer Command</label>

                            <select class="form-control" id="quickCommand">

                                <option value="">Choose Command</option>

                                <option value="show">composer show</option>

                                <option value="install">composer install</option>

                                <option value="update">composer update</option>

                                <option value="dump-autoload">composer dump-autoload</option>

                                <option value="validate">composer validate</option>

                                <option value="diagnose">composer diagnose</option>

                                <option value="outdated">composer outdated</option>

                                <option value="audit">composer audit</option>

                                <option value="clear-cache">composer clear-cache</option>

                                <option value="self-update">composer self-update</option>

                            </select>

                        </div>

                        <div class="col-md-4">

                            <label>Custom Command</label>

                            <input type="text" id="customCommand" class="form-control"
                                placeholder="Example: require spatie/laravel-permission">

                        </div>

                    </div>

                    <hr>

                    <button class="btn btn-success" id="runCommand">

                        <i class="fas fa-play"></i>

                        Run

                    </button>

                    <button class="btn btn-danger" id="clearTerminal">

                        <i class="fas fa-trash"></i>

                        Clear

                    </button>

                    <button class="btn btn-secondary" id="downloadOutput">

                        <i class="fas fa-download"></i>

                        Download

                    </button>

                    <hr>

                    <div id="terminalOutput"
                        style="
                        background:#111;
                        color:#00ff66;
                        font-family:Consolas,monospace;
                        height:550px;
                        overflow:auto;
                        padding:20px;
                        border-radius:5px;
                        white-space:pre-wrap;
                    ">

                        Welcome to Composer Terminal

                        Select a project and execute a Composer command.

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

@push('js')
    <script src="{{ asset('js/custom_backend/composer_page/index_page/composer_terminal.js') }}"></script>
    <script src="{{ asset('js/custom_backend/composer_page/index_page/composer_terminal_runner.js') }}"></script>
    <script src="{{ asset('js/custom_backend/composer_page/index_page/composer_terminal_event.js') }}"></script>
    <script src="{{ asset('js/custom_backend/composer_page/index_page/composer_terminal_actions.js') }}"></script>
    <script src="{{ asset('js/custom_backend/composer_page/index_page/composer_terminal_helpers.js') }}"></script>
    <script src="{{ asset('js/custom_backend/composer_page/index_page/composer_terminal_output.js') }}"></script>
@endpush
