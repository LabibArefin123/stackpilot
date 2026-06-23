@extends('frontend.layouts.app')

@section('title', 'Photo Gallery | Dr. Asif Almas Haque')

@section('meta')
    <!-- Meta Description & Keywords -->
    <meta name="description"
        content="Explore the photo gallery of Dr. Asif Almas Haque, showcasing surgical procedures, conferences, patient care, and professional events in colorectal surgery.">
    <meta name="keywords"
        content="Dr Asif Almas Haque gallery, colorectal surgeon photos, surgical events, medical gallery, Dhaka">

    <!-- Open Graph -->
    <meta property="og:title" content="Photo Gallery | Dr. Asif Almas Haque">
    <meta property="og:description"
        content="View professional photos of Dr. Asif Almas Haque including surgical procedures, conferences, and hospital events.">
    <meta property="og:image" content="{{ asset('uploads/images/welcome_page/doctors/image_2.jpg') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Photo Gallery | Dr. Asif Almas Haque">
    <meta name="twitter:description"
        content="View professional photos of Dr. Asif Almas Haque including surgical procedures, conferences, and hospital events.">
    <meta name="twitter:image" content="{{ asset('uploads/images/welcome_page/doctors/image_2.jpg') }}">
@endsection

<link rel="stylesheet" href="{{ asset('css/frontend/gallery/custom_gallery.css') }}">

<link rel="stylesheet" href="{{ asset('css/frontend/gallery/custom_gallery.css') }}">
@section('content')
    @include('frontend.welcome_page.header')
    <div class="gallery-banner" style="background-image: url('{{ asset('uploads/images/welcome_page/cover.png') }}');">
        <div class="gallery-overlay"></div>
        <div class="gallery-breadcrumb">
            <a href="{{ route('welcome') }}">Home</a>
            <span>></span>
            <a href="{{ route('gallery') }}" class="doc-link text-decoration-none">Gallery</a>
        </div>
    </div>
    <!-- Page Header -->
    <section class="page-header" style="background: #f7f7f7; padding: 40px 0;">
        <div class="container">
            <h1 class="text-center" style="font-weight: 700;">Photo Gallery</h1>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section py-5">
        <div class="container">
            <div class="gallery-container">
                <!-- Big Preview with Navigation Buttons -->
                <div class="preview-box">
                    <button class="nav-btn left-btn">&#10094;</button>
                    <img id="preview-image"
                        src="{{ isset($galleries[0]) ? asset('uploads/images/gallery/' . $galleries[0]->image) : '' }}"
                        alt="Preview">
                    <h3 id="preview-title">{{ $galleries[0]->title ?? '' }}</h3>
                    <button class="nav-btn right-btn">&#10095;</button>
                </div>

                <!-- Thumbnails -->
                <div class="thumbnail-row">
                    @forelse ($galleries as $gallery)
                        <div class="thumbnail">
                            <img src="{{ asset('uploads/images/gallery/' . $gallery->image) }}"
                                alt="{{ $gallery->title ?? '' }}">
                        </div>
                    @empty
                        <p>No images found.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </section>
    <script src="{{ asset('js/custom_frontend/gallery/custom_gallery.js') }}"></script>
    @include('frontend.welcome_page.footer')
@endsection
