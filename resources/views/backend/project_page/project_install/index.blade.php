@extends('adminlte::page')

@section('title', 'Project Install')

<link rel="stylesheet" href="{{ asset('css/custom_backend/project_page/install_page/install.css') }}">
@section('content_header')

    <div class="row">

        <div class="col-sm-6">

            <h1>

                <i class="fas fa-rocket text-primary mr-2"></i>

                Project Installation

            </h1>

            <p class="text-muted mb-0">

                Install Laravel projects using Domain, Subfolder or Local environments.

            </p>

        </div>

        <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">

                    <a href="{{ url('/dashboard') }}">

                        Dashboard

                    </a>

                </li>

                <li class="breadcrumb-item">

                    Project Stack Pilot

                </li>

                <li class="breadcrumb-item active">

                    Install Project

                </li>

            </ol>

        </div>

    </div>

@stop


@section('content')
    <form action="#" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                @include('backend.project_page.partials.project_install.part_1')
                @include('backend.project_page.partials.project_install.part_2')
            </div>


            <div class="col-lg-4">
                @include('backend.project_page.partials.project_install.part_3')
                @include('backend.project_page.partials.project_install.part_4')
            </div>

        </div>
        <script src="{{ asset('js/custom_backend/project_page/project_install/project-arrow.js') }}"></script>
    </form>
    <div style="height: 50px;"></div>
@endsection
