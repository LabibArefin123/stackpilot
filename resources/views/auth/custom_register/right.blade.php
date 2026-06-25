<div class="register-panel">

    <div class="register-header">

        <h2>Create Account</h2>

        <p>
            Register to access your StackPilot dashboard
        </p>

    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Full Name --}}
        <div class="form-group">
            <label>Full Name</label>

            <input type="text" name="name" value="{{ old('name') }}"
                class="form-control @error('name') is-invalid @enderror" placeholder="Enter your full name" required>

            @error('name')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Phone --}}
        <div class="form-group">
            <label>Phone Number</label>

            <input type="text" name="phone_1" value="{{ old('phone_1') }}"
                class="form-control @error('phone_1') is-invalid @enderror" placeholder="Enter your phone number">

            @error('phone_1')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Email --}}
        <div class="form-group">
            <label>Email Address</label>

            <input type="email" name="email" value="{{ old('email') }}"
                class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" required>

            @error('email')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Password --}}
        <div class="form-group">
            <label>Password</label>

            <div class="password-wrapper">

                <input id="password" type="password" name="password"
                    class="form-control @error('password') is-invalid @enderror" placeholder="Create a password"
                    required>

                <span class="toggle-password">
                    <i class="fas fa-eye"></i>
                </span>

            </div>

            @error('password')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Confirm Password --}}
        <div class="form-group">
            <label>Confirm Password</label>

            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password"
                required>
        </div>

        <button type="submit" class="register-btn">
            Create StackPilot Account
        </button>

        <div class="register-footer">

            <a href="{{ route('login') }}">
                Already have an account? Sign In
            </a>

        </div>

        <div class="register-version">
            StackPilot v1.0 • Laravel Monitoring & Diagnostics Platform
        </div>

    </form>

</div>
