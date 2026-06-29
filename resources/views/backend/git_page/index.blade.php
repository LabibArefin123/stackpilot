@extends('adminlte::page')

@section('title', 'Git Monitor')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>
                <i class="fab fa-git-alt text-danger mr-2"></i>
                Git Monitor
            </h1>

            <small class="text-muted">
                Monitor all project repositories from one dashboard
            </small>
        </div>

        <div>
            <button class="btn btn-primary">
                <i class="fas fa-sync-alt mr-1"></i>
                Refresh
            </button>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom_backend/git_page/index_page/index.css') }}">
@stop

@section('content')
    <div class="container-fluid">
        {{-- Statistics --}}
        @include('backend.partials.git_page.index_page.part_1')
        {{-- Filters --}}
        @include('backend.partials.git_page.index_page.part_2')
        {{-- Repository Table --}}
        @include('backend.partials.git_page.index_page.part_3')
    </div>
    <div class="card mt-4">
        <div class="card-body" style="height:50px;"> <!-- spacing card --> </div>
    </div>
@stop

@section('js')
    <script>
        const gitAjaxUrl = "{{ route('gits.ajax') }}";
    </script>

    <script src="{{ asset('js/custom_backend/git_page/index_page/git_ajax.js') }}"></script>
    <script src="{{ asset('js/custom_backend/git_page/index_page/git_filter.js') }}"></script>
@endsection
