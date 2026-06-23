@extends('frontend.layouts.app')

@section('title', 'Membership')
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_4/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_4/banner.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_4/profile.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_4/membership-list.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_4/typography.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_4/effects.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_4/responsive.css') }}">
@section('content')

    @include('frontend.welcome_page.header')

    <div class="doctor-banner" style="background-image: url('{{ asset('uploads/images/welcome_page/cover.png') }}');">
        <nav class="breadcrumb-custom">
            <a href="{{ route('welcome') }}" class="doc-link text-decoration-none">Home</a>
            <span>></span>
            <a href="{{ route('page_4') }}" class="doc-link text-decoration-none">Membership</a>
        </nav>
    </div>

    <section class="doctor-profile">
        <div class="doctor-card">
            <h2 class="doctor-name">Membership</h2>

            <!-- National -->
            <h5 class="section-title mt-4">National</h5>
            <ul class="member-list">

                <li>
                    <div class="member-item">
                        <a href="https://www.sosb-bd.org/" target="_blank">
                            Society of Surgeons of Bangladesh
                        </a>
                        <img src="{{ asset('uploads/images/welcome_page/membership/image_1.png') }}" alt="">
                    </div>
                </li>

                <li>
                    <div class="member-item">
                        <a href="https://selsb-bd.org/" target="_blank">
                            Society of Endo Laparoscopic Surgeons of Bangladesh
                        </a>
                        <img src="{{ asset('uploads/images/welcome_page/membership/image_2.jpg') }}" alt="">
                    </div>
                </li>

                <li>
                    <div class="member-item">
                        <a href="https://www.facebook.com/bscrsbd/" target="_blank">
                            Bangladesh Society of Colon & Rectal Surgeons
                        </a>
                        <img src="{{ asset('uploads/images/welcome_page/membership/image_9.JPG') }}" alt="">
                    </div>
                </li>

            </ul>

            <!-- International -->
            <h5 class="section-title mt-5">International</h5>
            <ul class="member-list">

                <li>
                    <div class="member-item">
                        <a href="https://www.rcsed.ac.uk/" target="_blank">
                            Royal College of Surgeons of Edinburgh (MRCS)
                        </a>
                        <img src="{{ asset('uploads/images/welcome_page/membership/image_3.png') }}" alt="">
                    </div>
                </li>

                <li>
                    <div class="member-item">
                        <a href="https://rcpsg.ac.uk/" target="_blank">
                            Royal College of Physicians & Surgeons of Glasgow (FRCS)
                        </a>
                        <img src="{{ asset('uploads/images/welcome_page/membership/image_5.JPG') }}" alt="">
                    </div>
                </li>

                <li>
                    <div class="member-item">
                        <a href="https://fascrs.org/" target="_blank">
                            American Society of Colon & Rectal Surgeons (FASCRS)
                        </a>
                        <img src="{{ asset('uploads/images/welcome_page/membership/image_6.png') }}" alt="">
                    </div>
                </li>

                <li>
                    <div class="member-item">
                        <a href="https://www.facs.org/" target="_blank">
                            American College of Surgeons (FACS)
                        </a>
                        <img src="{{ asset('uploads/images/welcome_page/membership/image_7.JPG') }}" alt="">
                    </div>
                </li>

                <li>
                    <div class="member-item">
                        <a href="https://www.acpgbi.org.uk/" target="_blank">
                            Association of Coloproctology of Great Britain & Ireland
                        </a>
                        <img src="{{ asset('uploads/images/welcome_page/membership/image_4.png') }}" alt="">
                    </div>
                </li>

                <li>
                    <div class="member-item">
                        <a href="https://www.escp.eu.com/" target="_blank">
                            European Society of Coloproctology
                        </a>
                        <img src="{{ asset('uploads/images/welcome_page/membership/image_10.jpg') }}" alt="">
                    </div>
                </li>

                <li>
                    <div class="member-item">
                        <a href="https://elsasociety.org/" target="_blank">
                            Endoscopic & Laparoscopic Surgeons of Asia (Life Member)
                        </a>
                        <img src="{{ asset('uploads/images/welcome_page/membership/image_8.jpg') }}" alt="">
                    </div>
                </li>

            </ul>

        </div>
    </section>

    @include('frontend.welcome_page.footer')

@endsection
