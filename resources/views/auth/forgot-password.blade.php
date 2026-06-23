@extends('auth.layouts.auth-layout')

@section('auth-content')

<div class="text-center mb-4">
    <h4 class="fw-bold">Forgot Password</h4>
    <p class="text-muted">
        Enter your email and we'll send a reset link.
    </p>
</div>

<x-auth-session-status class="mb-4"
                       :status="session('status')" />

<form method="POST"
      action="{{ route('password.email') }}">
    @csrf

    <div class="mb-4">
        <label class="form-label">Email Address</label>
        <input type="email"
               name="email"
               value="{{ old('email') }}"
               class="form-control form-control-lg"
               required>
    </div>

    <button class="btn login-btn w-100 py-2 rounded-pill">
        Send Reset Link
    </button>
</form>

@endsection