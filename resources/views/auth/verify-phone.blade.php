@extends('auth.layouts.auth-layout')

@section('auth-content')

<div class="text-center mb-4">
    <h4 class="fw-bold">Phone Verification</h4>
    <p class="text-muted">
        Enter the 6-digit verification code.
    </p>
</div>

<form method="POST"
      action="{{ route('register.verifyPhone') }}">
    @csrf

    <div class="mb-4">
        <label>Verification Code</label>
        <input type="text"
               name="verification_code"
               maxlength="6"
               class="form-control form-control-lg">
    </div>

    <button type="submit"
            class="btn login-btn w-100 py-2 rounded-pill">
        Verify & Continue
    </button>

</form>

@endsection