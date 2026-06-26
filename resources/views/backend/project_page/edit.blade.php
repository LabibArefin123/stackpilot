@extends('adminlte::page')

@section('title', 'Edit Project')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <div>

        <h1 class="mb-1">

            <i class="fas fa-edit text-warning mr-2"></i>

            Edit Project

        </h1>

        <small class="text-muted">

            {{ $project->name }}

        </small>

    </div>

    <div>

        <a href="{{ route('projects.show',$project) }}"
           class="btn btn-info">

            <i class="fas fa-eye"></i>

            View

        </a>

        <a href="{{ route('projects.index') }}"
           class="btn btn-default">

            <i class="fas fa-arrow-left"></i>

            Back

        </a>

    </div>

</div>

@stop


@section('content')

<div class="row">

    <div class="col-lg-12">

        <form
            action="{{ route('projects.update',$project) }}"
            method="POST">

            @csrf

            @method('PUT')

            @include('backend.project_page._form')

        </form>

    </div>

</div>

@stop