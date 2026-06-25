@extends('frontend.layouts.app')

@section('content')
    <style>
        body {
            background:

                url('{{ asset('uploads/images/welcome_page/cover.jpg') }}') center center / cover no-repeat;
        }
    </style>
    <div class="register-page">

        <div class="register-container">

            {{-- LEFT SIDE --}}
            <div class="register-left">
                @include('auth.custom_register.left')
            </div>

            {{-- RIGHT SIDE --}}

            <div class="register-right">
                @include('auth.custom_register.right')
            </div>

        </div>

    </div>
@endsection
