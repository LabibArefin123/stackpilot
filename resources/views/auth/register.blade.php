@extends('auth.layouts.auth-layout')

@section('auth-content')

<div class="text-center mb-4">
    <h4 class="fw-bold">Create Account</h4>
    <p class="text-muted">Register to access the Doctor Portal</p>
</div>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text"
               name="name"
               value="{{ old('name') }}"
               class="form-control form-control-lg">
    </div>

    <div class="mb-3">
        <label class="form-label">Phone Number</label>
        <input type="text"
               name="phone_1"
               value="{{ old('phone_1') }}"
               class="form-control form-control-lg">
    </div>

    <div class="mb-3">
        <label class="form-label">Email Address</label>
        <input type="email"
               name="email"
               value="{{ old('email') }}"
               class="form-control form-control-lg">
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password"
               name="password"
               class="form-control form-control-lg">
    </div>

    <div class="mb-4">
        <label class="form-label">Confirm Password</label>
        <input type="password"
               name="password_confirmation"
               class="form-control form-control-lg">
    </div>

    <button type="submit"
            class="btn login-btn w-100 py-2 rounded-pill">
        Create Account
    </button>

    <div class="text-center mt-3">
        <a href="{{ route('login') }}" class="dev-link">
            Already have an account?
        </a>
    </div>
</form>

@endsection