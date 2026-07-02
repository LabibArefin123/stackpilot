@extends('adminlte::page')

@section('title', 'Terminal Manager')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">

        <h1>
            <i class="fas fa-terminal text-success"></i>
            Terminal Manager
        </h1>

        <button class="btn btn-success" data-toggle="modal" data-target="#shortcutModal">
            <i class="fas fa-bolt"></i>
            Quick Commands
        </button>

    </div>
@stop

@section('content')

    <div class="container-fluid">

        {{-- Step 1 --}}
        @include('backend.terminal_page.partials.step_1')

        {{-- Step 2 Local --}}
        <div id="localSection" style="display:none;">
            @include('backend.terminal_page.partials.step_2_local')
        </div>

        {{-- Step 2 Live --}}
        <div id="liveSection" style="display:none;">
            @include('backend.terminal_page.partials.step_2_live')
        </div>

        {{-- Terminal --}}
        <div id="terminalSection" style="display:none;">
            @include('backend.terminal_page.partials.part_3_terminal')
        </div>

    </div>

    @include('backend.terminal_page.partials.part_4_shortcut_modal')

@stop

@section('css')

    <link rel="stylesheet" href="{{ asset('css/custom_backend/terminal_page/terminal.css') }}">

@stop

@section('js')

    <script src="{{ asset('js/custom_backend/terminal_page/working_terminal.js') }}"></script>

    <script src="{{ asset('js/custom_backend/terminal_page/part_2_terminal_local_terminal.js') }}"></script>
    <script src="{{ asset('js/custom_backend/terminal_page/part_2_terminal_local_projects.js') }}"></script>
    <script src="{{ asset('js/custom_backend/terminal_page/part_2_terminal_local_versions.js') }}"></script>
    <script src="{{ asset('js/custom_backend/terminal_page/part_2_terminal_local_init.js') }}"></script>

    <script src="{{ asset('js/terminal_live.js') }}"></script>

    <script src="{{ asset('js/terminal_shortcuts.js') }}"></script>

@stop
