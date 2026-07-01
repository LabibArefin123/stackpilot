@extends('adminlte::page')

@section('title', 'Laravel Optimization')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>
            <i class="fas fa-bolt text-warning mr-2"></i>
            Laravel Optimization
        </h1>

        <span class="badge badge-success p-2">

            Ready
        </span>
    </div>
@stop

<link rel="stylesheet" href="{{ asset('css/custom_backend/optimize_page/modal/choose_modal.css') }}">

@section('content')
    @include('backend.optimize_page.modals.choose_optimize_modal')
    @include('backend.optimize_page.modals.method_local_optimize')
    @include('backend.optimize_page.modals.method_live_optimize')
    @include('backend.optimize_page.modals.hosting_account_modal')
    @include('backend.optimize_page.modals.terminal_modal')
    @include('backend.partials.optimize_page.index_page.part_1')
    <div style="height: 50px;"></div>
@stop

@section('js')
    
    <script src="{{ asset('js/custom_backend/optimize_page/optimize_modal.js') }}"></script>
    <script src="{{ asset('js/custom_backend/optimize_page/hosting_modal.js') }}"></script>
    <script src="{{ asset('js/custom_backend/optimize_page/terminal_modal.js') }}"></script>
    <script src="{{ asset('js/custom_backend/optimize_page/local_optimize_modal.js') }}"></script>
    <script src="{{ asset('js/custom_backend/optimize_page/live_optimize_modal.js') }}"></script>
    <script src="{{ asset('js/custom_backend/optimize_page/live_server_ajax.js') }}"></script>
@endsection
