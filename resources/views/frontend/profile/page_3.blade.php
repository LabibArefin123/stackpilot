@extends('frontend.layouts.app')

@section('title', 'Journal Publication')
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_3/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_3/banner.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_3/profile.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_3/journals.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_3/typography.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_3/effects.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_3/responsive.css') }}">

@section('content')

    @include('frontend.welcome_page.header')

    <div class="doctor-banner" style="background-image: url('{{ asset('uploads/images/welcome_page/cover.png') }}');">
        <nav class="breadcrumb-custom">
            <a href="{{ route('welcome') }}" class="doc-link text-decoration-none">Home</a>
            <span>></span>
            <a href="{{ route('page_3') }}" class="doc-link text-decoration-none">Journal Publication</a>
        </nav>
    </div>

    <section class="doctor-profile">
        <div class="doctor-card">
            <div class="row align-items-start">
                <div class="col-lg-12 col-md-7 doctor-content">
                    <h2 class="doctor-name">Journal Publication</h2>

                    <ul class="journal-list mt-4">
                        <li>
                            <strong>Haque AA, Alam H, Talukder MRH.</strong>
                            Evaluation of factors determining oncological clearance with sphincter preservation in low
                            rectal cancer.
                            <em>BIRDEM Med J 2020; 10(1): 16-20.</em><br>
                            <a href="https://doi.org/10.3329/birdem.v10i1.44743" target="_blank" class="journal-link">
                                https://doi.org/10.3329/birdem.v10i1.44743
                            </a>
                        </li>

                        <li>
                            <strong>Haque AA, Alam H, Talukder MRH.</strong>
                            Stapled trans-anal rectal resection for the surgical management of obstructed defecation
                            syndrome: our experience in Bangladesh.
                            <em>BIRDEM Med J 2021; 11(1): 11-16.</em><br>
                            <a href="https://doi.org/10.3329/birdem.v11i1.51024" target="_blank" class="journal-link">
                                https://doi.org/10.3329/birdem.v11i1.51024
                            </a>
                        </li>

                        <li>
                            <strong>Talukder MRH, Alam MNA, Anwar R, Alam H, Ullah ME, Haque AA.</strong>
                            Antimicrobial susceptibility of the microorganisms isolated from diabetic foot infection-
                            observed in tertiary care hospital.
                            <em>Eur J Pharm Med Res 2020; 7(10): 40-44.</em>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </section>

    @include('frontend.welcome_page.footer')

@endsection
