@extends('auth.layouts.auth-layout')

@section('auth-content')

<div class="text-center mb-4">
    <h4 class="fw-bold">Confirm Password</h4>
</div>

<p class="text-muted mb-4">
    Please confirm your password before continuing.
</p>

<form method="POST"
      action="{{ route('password.confirm') }}">
    @csrf

    <div class="mb-4">
        <label>Password</label>
        <input type="password"
               name="password"
               class="form-control form-control-lg">
    </div>

    <button class="btn login-btn w-100 py-2 rounded-pill">
        Confirm Password
    </button>

</form>

@endsection