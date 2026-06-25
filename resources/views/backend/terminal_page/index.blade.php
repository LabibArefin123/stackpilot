@extends('adminlte::page')

@section('title', 'Terminal Dashboard')

@section('content')
    <div class="row mb-3">

        <div class="col-md-8">

            <div class="card card-outline card-primary">

                <div class="card-body">

                    <form id="terminal-form" method="POST" action="{{ route('terminal.run') }}">

                        @csrf

                        <div class="row">

                            <div class="col-md-10">

                                <select name="project_id" class="form-control">

                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">

                                            {{ $project->name }}
                                            ({{ $project->domain }})
                                        </option>
                                    @endforeach

                                </select>

                            </div>

                            <input type="hidden" id="command-input" name="command">

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
    <div class="row">

        <div class="col-md-12">

            <div class="card card-dark">

                <div class="card-header">

                    <h3 class="card-title">
                        <i class="fas fa-terminal mr-2"></i>
                        StackPilot Terminal
                    </h3>

                </div>

                <div class="card-body">

                    <div class="row mb-4">

                        <div class="col-md-3">
                            <button type="button" onclick="runCommand('optimize')" class="btn btn-success btn-block">

                                <i class="fas fa-bolt"></i>
                                Optimize

                            </button>
                        </div>

                        <div class="col-md-3">
                            <button type="button" onclick="runCommand('optimize_clear')" class="btn btn-warning btn-block">

                                <i class="fas fa-trash"></i>
                                Optimize Clear

                            </button>
                        </div>

                        <div class="col-md-3">
                            <button type="button" onclick="runCommand('queue_restart')" class="btn btn-info btn-block">

                                <i class="fas fa-sync"></i>
                                Queue Restart

                            </button>
                        </div>

                        <div class="col-md-3">
                            <button type="button" onclick="runCommand('git_pull')" class="btn btn-primary btn-block">

                                <i class="fab fa-git-alt"></i>
                                Git Pull

                            </button>
                        </div>

                    </div>

                    <div class="row mb-4">

                        <div class="col-md-6">
                            <button type="button" onclick="runCommand('composer_install')"
                                class="btn btn-secondary btn-block">

                                Composer Install

                            </button>
                        </div>

                        <div class="col-md-6">
                            <button class="btn btn-danger btn-block">
                                NPM Build
                            </button>
                        </div>

                    </div>

                    <div class="terminal-screen">

                        @if (session('terminal_output'))
                            {{ session('terminal_output') }}
                        @else
                            StackPilot Terminal Ready...

                            Select a project and execute a command.
                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-12">

            <div class="card card-outline card-primary">

                <div class="card-header">

                    <h3 class="card-title">
                        Recent Commands
                    </h3>

                </div>

                <div class="card-body p-0">

                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Project</th>
                                <th>Command</th>
                                <th>Status</th>
                                <th>Executed</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($commands as $command)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        {{ $command->project->domain ?? '-' }}
                                    </td>

                                    <td>
                                        <code>{{ $command->command }}</code>
                                    </td>

                                    <td>

                                        @if ($command->success)
                                            <span class="badge badge-success">
                                                Success
                                            </span>
                                        @else
                                            <span class="badge badge-danger">
                                                Failed
                                            </span>
                                        @endif

                                    </td>

                                    <td>
                                        {{ $command->executed_at }}
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5" class="text-center">
                                        No Commands Found
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>


@endsection

@section('css')

    <style>
        .terminal-screen {

            background: #000;

            color: #00ff66;

            font-family: Consolas, monospace;

            min-height: 250px;

            border-radius: 8px;

            padding: 20px;

            white-space: pre-line;

            overflow: auto;
        }
    </style>

@endsection
@section('js')
    <script src="{{ asset('js/custom_backend/terminal_page/terminal.js') }}"></script>
@endsection
