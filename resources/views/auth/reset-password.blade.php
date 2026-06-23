@extends('auth.layouts.auth-layout')

@section('auth-content')

<div class="text-center mb-4">
    <h4 class="fw-bold">Reset Password</h4>
</div>

<form method="POST"
      action="{{ route('password.store') }}">
    @csrf

    <input type="hidden"
           name="token"
           value="{{ $request->route('token') }}">

    <div class="mb-3">
        <label>Email Address</label>
        <input type="email"
               name="email"
               value="{{ old('email',$request->email) }}"
               class="form-control form-control-lg">
    </div>

    <div class="mb-3">
        <label>New Password</label>
        <input type="password"
               name="password"
               class="form-control form-control-lg">
    </div>

    <div class="mb-4">
        <label>Confirm Password</label>
        <input type="password"
               name="password_confirmation"
               class="form-control form-control-lg">
    </div>

    <button class="btn login-btn w-100 py-2 rounded-pill">
        Reset Password
    </button>

</form>

@endsection