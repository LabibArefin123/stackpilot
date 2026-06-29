@extends('adminlte::page')

@section('title', 'Server Health')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="mb-1">
                <i class="fas fa-server text-primary"></i>
                Server Health Dashboard
            </h1>
            <p class="text-muted mb-0">
                Monitor your server performance, resources and running services.
            </p>
        </div>
        <div>
            <button class="btn btn-primary">
                <i class="fas fa-sync-alt"></i>
                Refresh Status
            </button>
        </div>
    </div>
@stop

@section('content')
    @include('backend.partials.server_health_page.part_1')
    <div class="row">
        @include('backend.partials.server_health_page.part_2_a')
        @include('backend.partials.server_health_page.part_2_b')
    </div>

    <div class="card card-outline card-info">
        @include('backend.partials.server_health_page.part_3')
    </div>
@stop
