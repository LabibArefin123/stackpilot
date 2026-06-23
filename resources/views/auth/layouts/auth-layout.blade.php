@extends('frontend.layouts.app')

@section('content')
<div class="login-wrapper">
    <div class="login-glass">

        {{-- LEFT PANEL --}}
        @include('auth.custom_login.left')

        {{-- RIGHT PANEL --}}
        <div class="login-panel">
            @yield('auth-content')
        </div>

    </div>
</div>

<style>
    body{
        background:
            linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.55)),
            url('{{ asset('uploads/images/welcome_page/cover.png') }}')
            center/cover no-repeat;
        min-height:100vh;
        font-family:'Poppins',sans-serif;
    }
</style>

@endsection