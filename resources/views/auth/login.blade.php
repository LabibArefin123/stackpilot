@extends('frontend.layouts.app')

@section('content')
    <div class="stackpilot-login">

        <div class="login-container">

            {{-- LEFT PANEL --}}
            <div class="about-section">

                @include('auth.custom_login.left')

            </div>

            {{-- RIGHT PANEL --}}
            <div class="login-section">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    @include('auth.custom_login.right')

                </form>

            </div>

        </div>

    </div>

    <style>
        body {
            background:
                
                url('{{ asset('uploads/images/welcome_page/cover.jpg') }}') center center / cover no-repeat;
        }
    </style>
@endsection
