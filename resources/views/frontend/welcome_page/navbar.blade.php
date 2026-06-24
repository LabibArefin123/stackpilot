<header class="main-header">

    <nav class="main-navbar">

        <div class="header-container">

            <!-- Logo -->
            <div class="nav-left">

                <a href="{{ route('welcome') }}" class="brand-logo">

                    <div class="brand-text">

                        <h2>StackPilot</h2>

                        <span>
                            Deploy • Manage • Monitor
                        </span>

                    </div>

                </a>

            </div>

            <!-- Desktop Menu -->
            <div class="nav-right" id="desktopMenu">

                <a href="{{ route('welcome') }}">
                    Home
                </a>

                <a href="#features">
                    Features
                </a>

                <a href="#frameworks">
                    Frameworks
                </a>

                <a href="#modules">
                    Modules
                </a>

               

                <a href="{{ route('login') }}" class="btn-login">
                    Login
                </a>

            </div>

            <!-- Mobile Toggle -->
            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fa-solid fa-bars"></i>
            </button>

        </div>

    </nav>

</header>
