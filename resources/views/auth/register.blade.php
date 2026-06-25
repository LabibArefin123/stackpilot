@extends('frontend.layouts.app')

@section('content')
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
