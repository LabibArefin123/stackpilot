@extends('frontend.layouts.app')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

@section('content')
    <div class="login-wrapper">
        <div class="login-glass" id="sliderContainer">
            {{-- LEFT : ABOUT --}}
            @include('auth.custom_login.left')
            {{-- RIGHT : LOGIN --}}
            @include('auth.custom_login.right')
        </div>
    </div>

    {{-- SYSTEM PROBLEM MODAL --}}
    @include('modal.problem-modal')
    {{-- STYLES --}}
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)),
                url('{{ asset('uploads/images/welcome_page/cover.png') }}') center/cover no-repeat;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
        }
    </style>
@endsection
