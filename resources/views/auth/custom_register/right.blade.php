  <div class="login-section register-scroll">

      <div class="login-panel register-panel">

          <div class="login-header text-center mb-4">

              <h2 class="fw-bold">
                  Create Account
              </h2>

              <p class="text-muted mb-0">
                  Register to access your StackPilot dashboard
              </p>

          </div>

          <form method="POST" action="{{ route('register') }}">
              @csrf

              {{-- Full Name --}}
              <div class="mb-3">
                  <label class="form-label fw-semibold">
                      Full Name
                  </label>

                  <input type="text" name="name" value="{{ old('name') }}"
                      class="form-control form-control-lg @error('name') is-invalid @enderror"
                      placeholder="Enter your full name" required>

                  @error('name')
                      <div class="invalid-feedback d-block">
                          {{ $message }}
                      </div>
                  @enderror
              </div>

              {{-- Phone --}}
              <div class="mb-3">
                  <label class="form-label fw-semibold">
                      Phone Number
                  </label>

                  <input type="text" name="phone_1" value="{{ old('phone_1') }}"
                      class="form-control form-control-lg @error('phone_1') is-invalid @enderror"
                      placeholder="Enter your phone number">

                  @error('phone_1')
                      <div class="invalid-feedback d-block">
                          {{ $message }}
                      </div>
                  @enderror
              </div>

              {{-- Email --}}
              <div class="mb-3">
                  <label class="form-label fw-semibold">
                      Email Address
                  </label>

                  <input type="email" name="email" value="{{ old('email') }}"
                      class="form-control form-control-lg @error('email') is-invalid @enderror"
                      placeholder="Enter your email" required>

                  @error('email')
                      <div class="invalid-feedback d-block">
                          {{ $message }}
                      </div>
                  @enderror
              </div>

              {{-- Password --}}
              <div class="mb-3">
                  <label class="form-label fw-semibold">
                      Password
                  </label>

                  <div class="position-relative">
                      <input id="password" type="password" name="password"
                          class="form-control form-control-lg @error('password') is-invalid @enderror"
                          placeholder="Create a password" required>

                      <span class="toggle-password" onclick="togglePassword()">
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
              <div class="mb-4">
                  <label class="form-label fw-semibold">
                      Confirm Password
                  </label>

                  <input type="password" name="password_confirmation" class="form-control form-control-lg"
                      placeholder="Confirm your password" required>
              </div>

              <button type="submit" class="btn login-btn w-100">
                  Create StackPilot Account
              </button>

              <div class="text-center mt-4">
                  <a href="{{ route('login') }}" class="dev-link">
                      Already have an account? Sign In
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

  </div>
