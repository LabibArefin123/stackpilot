<div class="login-panel">
    <div class="login-header text-center mb-4">

        <h2 class="fw-bold">
            Welcome Back
        </h2>

        <p class="text-muted">
            Sign in to access your StackPilot dashboard
        </p>

</div>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-3">

        <label class="form-label fw-semibold">
            Email or Username
        </label>

        <input type="text" name="login" class="form-control form-control-lg" placeholder="Enter email or username">

    </div>

    <div class="mb-4">

        <label class="form-label fw-semibold">
            Password
        </label>

        <div class="position-relative">

            <input id="password" type="password" class="form-control form-control-lg" name="password"
                placeholder="Enter your password" required>

            <span class="toggle-password" onclick="togglePassword()">

                <i class="fas fa-eye"></i>

            </span>

        </div>

        @error('password')
            @unless (session('maintenance'))
                <div class="invalid-feedback d-block mt-1">
                    <strong>{{ $message }}</strong>
                </div>
            @endunless
        @enderror

        @if (session('maintenance'))
            <div class="alert alert-warning mt-3">
                <i class="fas fa-tools me-2"></i>
                {{ session('maintenance') }}
            </div>
        @endif

        @if (session('banned'))
            <div class="alert alert-danger mt-3">
                <i class="fas fa-ban me-2"></i>
                {{ session('banned') }}
            </div>
        @endif

    </div>

    <button class="btn login-btn w-100 text-white">
        Login To StackPilot
    </button>

    <div class="text-center mt-4">

        <a href="{{ route('password.request') }}" class="dev-link">
            Forgot Password?
        </a>

    </div>

    <hr class="my-4">

    <div class="text-center">

        <small class="text-muted">
            StackPilot v1.0 • Laravel Monitoring & Diagnostics Platform
        </small>

    </div>

</form>

</div>
