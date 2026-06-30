@extends('adminlte::page')

@section('title', 'Repository Details')

@section('content_header')

    <div class="d-flex justify-content-between align-items-center">

        <div>

            <h1>

                <i class="fab fa-git-alt text-danger mr-2"></i>

                {{ $project->name }}

            </h1>

            <small class="text-muted">

                Git Repository Monitor

            </small>

        </div>

        <div>

            <a href="{{ route('gits.index') }}" class="btn btn-default">

                <i class="fas fa-arrow-left mr-1"></i>

                Back

            </a>

        </div>

    </div>

@stop

@section('content')
    <div class="container-fluid">
        {{-- ===================== SUMMARY PART===================== --}}
        @include('backend.partials.git_page.show_page.part_1')
        {{-- ===================== REPOSITORY OVERVIEW===================== --}}
        @include('backend.partials.git_page.show_page.part_2')
        <div class="row">
            {{-- =====================    REPOSITORY STATISTICS ===================== --}}
            @include('backend.partials.git_page.show_page.part_3')
            {{-- =====================    REMOTE INFORMATION ===================== --}}
            {{-- @include('backend.partials.git_page.show_page.part_4') --}}
        </div>
    </div>
@stop
