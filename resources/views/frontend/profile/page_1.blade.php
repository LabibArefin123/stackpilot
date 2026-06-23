@extends('frontend.layouts.app')

@section('title', 'Educational Background')
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_1/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_1/banner.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_1/profile.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_1/education-table.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_1/lists-content.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_1/typography.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_1/effects.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/profile/page_1/responsive.css') }}">

@section('content')

    @include('frontend.welcome_page.header')

    <div class="doctor-banner" style="background-image: url('{{ asset('uploads/images/welcome_page/cover.png') }}');">
        <nav class="breadcrumb-custom">
            <a href="{{ route('welcome') }}" class="doc-link text-decoration-none">Home</a>
            <span>></span>
            <a href="{{ route('page_1') }}" class="doc-link text-decoration-none">Educational Background</a>
        </nav>
    </div>

    <section class="doctor-profile">
        <div class="doctor-card">
            <div class="row align-items-start">
                <!-- Content Section -->
                <div class="col-lg-8 col-md-7 doctor-content">

                    <h2 class="doctor-name">Educational Background</h2>

                    <!-- ================= GENERAL EDUCATION ================= -->
                    <h5 class="section-title mt-4">General Education</h5>

                    <div class="table-wrapper">
                        <table class="edu-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Examination</th>
                                    <th>Institution / Board</th>
                                    <th>Year</th>
                                    <th style="width: 300px;">Result</th> <!-- Increased width -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>O Level</td>
                                    <td>
                                        Scholastica School <br>
                                        Edexcel International
                                    </td>
                                    <td>2001</td>
                                    <td style="width: 300px;">
                                        6A (Physics, Chemistry, Biology, Maths-B, Pure Maths, Bangla)<br>
                                        1B (English)
                                    </td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>A Level</td>
                                    <td>
                                        Maple Leaf International School <br>
                                        Edexcel International
                                    </td>
                                    <td>2003</td>
                                    <td style="width: 400px;">
                                        2A (Physics, Maths)<br>
                                        2B (Chemistry, Biology)
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- ================= MEDICAL EDUCATION ================= -->
                    <h5 class="section-title mt-5">Medical Education</h5>

                    <div class="table-wrapper">
                        <table class="edu-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Examination</th>
                                    <th>Institution / University</th>
                                    <th>Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>MBBS</td>
                                    <td>Sir Salimullah Medical College, University of Dhaka</td>
                                    <td>July 2004 – July 2009</td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>Internship</td>
                                    <td>Mitford Hospital</td>
                                    <td>Dec 2009 – Dec 2010</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- ================= TRAINING EXPERIENCE ================= -->
                    <h5 class="section-title mt-5">Training Experience</h5>

                    <div class="table-wrapper">
                        <table class="edu-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Institution</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Period</th>
                                    <th>Supervisor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>SSMC & Mitford Hospital</td>
                                    <td>General Surgery</td>
                                    <td>Intern Doctor</td>
                                    <td>23.12.2009 – 24.12.2010</td>
                                    <td>Prof. Syed Mahbubul Alam</td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>SSMC & Mitford Hospital</td>
                                    <td>General Surgery</td>
                                    <td>Honorary Medical Officer</td>
                                    <td>2011 – 2012 (24 Months)</td>
                                    <td>Prof. Syed Mahbubul Alam</td>
                                </tr>
                                <tr>
                                    <td>03</td>
                                    <td>Dhaka Medical College Hospital</td>
                                    <td>Casualty</td>
                                    <td>Honorary Medical Officer</td>
                                    <td>Jan 2013 – Jun 2013</td>
                                    <td>Prof. Dr. M. A. Hashem Bhuiyan</td>
                                </tr>
                                <tr>
                                    <td>04</td>
                                    <td>Dhaka Medical College Hospital</td>
                                    <td>General Surgery</td>
                                    <td>Honorary Medical Officer</td>
                                    <td>Jul 2013 – Dec 2013</td>
                                    <td>Prof. Dr. M. A. Hashem Bhuiyan</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- ================= POST GRADUATE DEGREES ================= -->
                    <h5 class="section-title mt-5">Post Graduate Degrees</h5>

                    <div class="table-wrapper">
                        <table class="edu-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Degree</th>
                                    <th>College</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>MRCS</td>
                                    <td>Royal College of Surgeons of England</td>
                                    <td>January 2014</td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>FCPS</td>
                                    <td>Bangladesh College of Physicians & Surgeons</td>
                                    <td>July 2015</td>
                                </tr>
                                <tr>
                                    <td>03</td>
                                    <td>FRCS</td>
                                    <td>Royal College of Surgeons of England</td>
                                    <td>December 2018</td>
                                </tr>
                                <tr>
                                    <td>04</td>
                                    <td>Certificate Course on Diabetology</td>
                                    <td>—</td>
                                    <td>—</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.welcome_page.footer')

@endsection
