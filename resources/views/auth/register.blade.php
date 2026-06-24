@extends('frontend.layouts.app')

@section('content')
    <div class="register-container">

        {{-- LEFT PANEL --}}
           @include('auth.custom_register.left')
           
           {{-- RIGHT PANEL --}}
           @include('auth.custom_register.right')
      
    </div>

    <style>
        body {
            background:
                linear-gradient(rgba(5, 10, 25, .82),
                    rgba(5, 10, 25, .82)),
                url('{{ asset('uploads/images/welcome_page/cover.png') }}') center center / cover no-repeat;
        }
    </style>
@endsection
