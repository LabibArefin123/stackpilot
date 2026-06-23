@extends('frontend.layouts.app')

@section('title', 'Dr. Asif Almas Haque | Best Colorectal Surgeon in Bangladesh')

@section('meta')
    <meta name="description"
        content="Dr. Asif Almas Haque is a leading colorectal, laparoscopic and laser surgeon in Bangladesh. Specialist in piles, fissure, fistula, IBS and colorectal cancer treatment in Dhaka.">
    <meta property="og:title" content="Dr. Asif Almas Haque | Best Colorectal Surgeon in Bangladesh">
    <meta property="og:description"
        content="Expert colorectal surgeon in Dhaka specializing in piles, fissure, fistula and colorectal cancer surgery.">
    <meta property="og:image" content="{{ asset('uploads/images/welcome_page/doctors/image_2.jpg') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('content')
    @include('frontend.welcome_page.header')
    @include('frontend.welcome_page.banner')
    @include('frontend.welcome_page.philosophy')
    @include('frontend.welcome_page.publications')
    @include('frontend.welcome_page.membership')
    @include('frontend.welcome_page.achievement')
    @include('frontend.welcome_page.message')
    @include('frontend.welcome_page.footer')
@endsection
