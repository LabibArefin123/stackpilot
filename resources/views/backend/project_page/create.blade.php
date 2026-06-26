@extends('adminlte::page')

@section('title', 'Create Project')

@section('content_header')

    <div class="d-flex justify-content-between align-items-center">

        <div>

            <h1 class="mb-1">

                <i class="fas fa-plus-circle text-primary mr-2"></i>

                Create New Project

            </h1>

            <small class="text-muted">

                Register a Laravel project to monitor with StackPilot.

            </small>

        </div>

        <a href="{{ route('projects.index') }}" class="btn btn-default">

            <i class="fas fa-arrow-left mr-1"></i>

            Back to Projects

        </a>

    </div>

@stop


@section('content')

    <div class="row">

        <div class="col-lg-12">

            <form action="{{ route('projects.store') }}" method="POST">

                @csrf

                @include('backend.project_page._form')

            </form>

        </div>

    </div>

@stop
