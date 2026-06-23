@extends('auth.layouts.auth-layout')

@section('auth-content')
    <div class="text-center mb-4">
        <h4 class="fw-bold">Verify Email</h4>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success">
            Verification email sent successfully.
        </div>
    @endif

    <p class="text-muted mb-4">
        Please verify your email address before continuing.
    </p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <button class="btn login-btn w-100 py-2 rounded-pill">
            Resend Verification Email
        </button>
    </form>

    <form method="POST" action="{{ route('logout') }}" class="mt-3">
        @csrf

        <button class="btn btn-outline-secondary w-100 rounded-pill">
            Logout
        </button>
    </form>
@endsection
