@extends('adminlte::page')

@section('title', 'Dr. Asif Almas Haque – Admin Dashboard')
<link rel="stylesheet" href="{{ asset('css/backend/admin/dashboard.css') }}">
@section('content')
    <div class="container-fluid py-4">

        {{-- Header --}}
        <div class="mb-4">
            <h1 class="h3 font-weight-bold text-primary">
                Dr. Asif Almas Haque – Portfolio Management
            </h1>
            <p class="text-muted">
                Manage profile information, achievements, publications, gallery, and website content.
            </p>
        </div>

        {{-- Welcome Card --}}
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="font-weight-bold mb-2">
                    👋 Welcome to the Portfolio Admin Panel
                </h5>
                <p class="mb-0 text-muted">
                    This dashboard allows you to update professional information, manage
                    publications, upload gallery images, and maintain website content.
                    All changes made here will reflect instantly on the public portfolio website.
                </p>
            </div>
        </div>

        {{-- Quick Info Cards --}}
        <div class="row g-4"> {{-- g-4 adds consistent spacing --}}

            <div class="col-md-4">
                <div class="card text-center shadow-sm h-100 card-hover">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h6 class="text-muted">Profile Management</h6>
                        <p class="small mb-0 mt-2">
                            Update biography, qualifications, and expertise areas.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center shadow-sm h-100 card-hover">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h6 class="text-muted">Publications & Achievements</h6>
                        <p class="small mb-0 mt-2">
                            Add or edit academic publications and professional milestones.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center shadow-sm h-100 card-hover">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h6 class="text-muted">Gallery & Media</h6>
                        <p class="small mb-0 mt-2">
                            Manage images, videos, and media content displayed on the website.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
@stop
