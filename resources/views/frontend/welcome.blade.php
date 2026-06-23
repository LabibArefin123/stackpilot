@extends('frontend.layouts.app')

@section('title', 'Welcome To StackPilot')

@section('content')
    @include('frontend.welcome_page.header')
    @include('frontend.welcome_page.banner')
    @include('frontend.welcome_page.features')
    @include('frontend.welcome_page.frameworks')
    @include('frontend.welcome_page.modules')
    @include('frontend.welcome_page.footer')
@endsection
