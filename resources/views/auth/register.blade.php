@extends('frontend.layouts.app')

@section('content')
    <div class="stackpilot-login">
        <div class="register-container">
            
            {{-- LEFT PANEL --}}
            <div class="register-section">
                @include('auth.custom_register.left')
            </div>

            {{-- RIGHT PANEL --}}
            @include('auth.custom_register.right')

        </div>
    </div>

    <style>
        body {
            background:
                linear-gradient(rgba(5, 10, 25, .82),
                    rgba(5, 10, 25, .82)),
                center center / cover no-repeat;
        }
    </style>
@endsection
