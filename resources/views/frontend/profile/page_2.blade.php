@extends('frontend.layouts.app')

@section('title', 'International Conference')
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_2/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_2/banner.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_2/profile.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_2/construction.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_2/button.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_2/typography.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_2/effects.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_2/responsive.css') }}">
@section('content')

    @include('frontend.welcome_page.header')

    <!-- Banner -->
    <div class="doctor-banner" style="background-image: url('{{ asset('uploads/images/welcome_page/cover.png') }}');">
        <nav class="breadcrumb-custom">
            <a href="{{ route('welcome') }}" class="doc-link text-decoration-none">Home</a>
            <span>></span>
            <a href="#" class="doc-link text-decoration-none">International Conference</a>
        </nav>
    </div>

    <section class="doctor-profile">
        <div class="doctor-card text-center">

            <h2 class="doctor-name">International Conferences</h2>

            <div class="construction-box">
                <div class="construction-icon">
                    <div class="gear large"></div>
                    <div class="gear small"></div>
                </div>

                <h4 class="construction-title">Page Under Construction</h4>

                <p class="construction-text">
                    The details of international conferences, workshops, and scientific
                    presentations will be updated soon.
                </p>

                <p class="construction-text">
                    Please visit again for complete information.
                </p>

                <a href="{{ route('welcome') }}" class="back-btn">
                    ← Back to Home
                </a>
            </div>

        </div>
    </section>

    @include('frontend.welcome_page.footer')

@endsection
