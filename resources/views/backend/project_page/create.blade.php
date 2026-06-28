@extends('adminlte::page')

@section('title', 'Create Project')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>
            <i class="fas fa-project-diagram text-primary"></i>
            Create New Project
        </h1>

        <a href="{{ route('projects.index') }}" class="btn btn-secondary back-btn">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf

        <div class="row">

            <!-- Project Information -->
            @include('backend.project_page.partials.create_page.part_1')
            
            <!-- Git Information -->
            @include('backend.project_page.partials.create_page.part_2')
            
            <!-- Project Details -->
            @include('backend.project_page.partials.create_page.part_3')
            
            <!-- Status -->
            @include('backend.project_page.partials.create_page.part_4')

          

            <!-- Buttons -->

            <div class="col-md-12">

                <div class="card">

                    <div class="card-footer text-right">

                        <button type="reset" class="btn btn-secondary">
                            <i class="fas fa-redo"></i>
                            Reset
                        </button>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Save Project
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </form>
    <div class="card mt-4">
        <div class="card-body" style="height:50px;"> <!-- spacing card --> </div>
    </div>
@stop

@section('css')
    <style>
        .card {
            border-radius: 10px;
        }

        .card-header {
            font-weight: 600;
        }

        .form-control {
            border-radius: 6px;
        }

        .custom-switch {
            margin-top: 12px;
        }
    </style>
@stop

@section('js')
    <script>
        console.log('Project Create Loaded');
    </script>
@stop
