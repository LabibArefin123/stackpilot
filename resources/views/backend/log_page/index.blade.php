@extends('adminlte::page')

@section('title', 'Logs')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>
            <i class="fas fa-file-alt text-danger"></i>
            Logs Monitor
        </h1>

        <div>
            <button class="btn btn-primary">
                <i class="fas fa-sync"></i>
                Refresh
            </button>
        </div>
    </div>
@stop

@section('content')
    {{-- Statistics --}}
    @include('backend.partials.log_page.index_page.part_1')
    {{-- Project Filter --}}
    @include('backend.partials.log_page.index_page.part_2')
    {{-- Git Logs --}}
    @include('backend.partials.log_page.index_page.part_3')
    {{-- Laravel Logs --}}
    @include('backend.partials.log_page.index_page.part_4')
    <div style="height: 50px;"></div>
@stop

@section('js')
    <script src="{{ asset('js/custom_backend/log_page/index_page/git_log_datatable.js') }}"></script>
    <script src="{{ asset('js/custom_backend/log_page/index_page/server_log_datatable.js') }}"></script>
    <script src="{{ asset('js/custom_backend/log_page/index_page/project_filter.js') }}"></script>
    <script src="{{ asset('js/custom_backend/log_page/index_page/view_modal.js') }}"></script>
@stop
