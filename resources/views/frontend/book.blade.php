@extends('frontend.layouts.app')

@section('title', 'Book | Dr. Asif Almas Haque')

@section('meta')
    <!-- Meta Description & Keywords -->
    <meta name="description"
        content="Learn about Dr. Asif Almas Haque's comprehensive guide on piles and colorectal conditions. A patient-friendly surgical guide in Bangladesh.">
    <meta name="keywords" content="Dr Asif Almas Haque book, piles guide, colorectal surgery book, patient guide, Bangladesh">

    <!-- Open Graph -->
    <meta property="og:title" content="Book | Dr. Asif Almas Haque">
    <meta property="og:description"
        content="Explore Dr. Asif Almas Haque's patient-friendly guide on piles and colorectal conditions, offering expert surgical insights.">
    <meta property="og:image" content="{{ asset('uploads/images/welcome_page/doctors/image_2.jpg') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Book | Dr. Asif Almas Haque">
    <meta name="twitter:description"
        content="Patient-friendly guide by Dr. Asif Almas Haque on piles and colorectal conditions. Learn surgical insights and expert tips.">
    <meta name="twitter:image" content="{{ asset('uploads/images/welcome_page/doctors/image_2.jpg') }}">
@endsection

<link rel="stylesheet" href="{{ asset('css/frontend/book/custom_book.css') }}">

@section('content')

    @include('frontend.welcome_page.header')

    <!-- Banner -->
    <section class="book-banner">
        <div class="container">
            <h1>Patient Guide on Piles & Colorectal Conditions</h1>
            <p class="subtitle">
                A comprehensive and patient-friendly surgical guide by
                <strong>Dr. Asif Almas Haque</strong>
            </p>
        </div>
    </section>

    <!-- Book Introduction -->
    <section class="book-intro">
        <div class="container">
            <div class="row align-items-center">

                <!-- Left Content -->
                <div class="col-lg-7">
                    <h2>About The Book</h2>

                    <p>
                        Dr. Asif Almas Haque is an editor of one of the best-selling
                        piles books in Bangladesh. His experience has been shaped by
                        working alongside some of the world’s leading colorectal surgeons.
                    </p>

                    <p>
                        Piles (hemorrhoids) is a common medical condition in Bangladesh.
                        If left untreated, it may cause severe bleeding, pain and discomfort.
                        Unfortunately, there are very few patient-friendly books that explain
                        the treatment process in a simple and reassuring way.
                    </p>

                    <p>
                        This book provides clear and detailed information about the
                        different treatment options available — including their risks,
                        benefits, and recovery expectations. It also offers guidance on
                        preventing recurrence and managing symptoms after surgery.
                    </p>

                    <p>
                        With comprehensive coverage of piles, fissure, fistula, and
                        colorectal cancer treatments, this book serves as a valuable
                        resource for patients seeking clarity and confidence in their
                        healthcare decisions.
                    </p>
                </div>

                <!-- Right Book Cover -->
                <div class="col-lg-5 text-center">
                    <div class="book-cover">
                        <!-- Replace with actual cover later -->
                        <img src="{{ asset('uploads/images/welcome_page/book/cover.JPG') }}" alt="Book Cover">

                        <div class="book-actions">
                            <a href="{{ asset('uploads/book/BOOK-BANGLA.pdf') }}" class="download-btn" download>
                                Download PDF
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Preview Section -->
    <section class="book-preview">
        <div class="container">
            <h2 class="section-title text-center">Book Preview</h2>

            <div class="preview-box">
                <!-- You can embed PDF preview later -->
                <p>
                    A preview of selected chapters will be available here.
                    This section will display sample pages from the book
                    to help readers understand its structure and content.
                </p>
            </div>
        </div>
    </section>

    @include('frontend.welcome_page.footer')

@endsection
