<nav class="navbar portfolio-navbar fixed-top">

    <div class="container navbar-wrapper">

        {{-- BRAND --}}
        <a href="{{ route('welcome') }}" class="navbar-brand">

            <img src="{{ asset('uploads/images/icon.png') }}" alt="Logo" class="brand-logo">

            <div class="brand-text">

                <div class="brand-name">
                    Dr. Asif Almas Haque
                </div>

                <div class="brand-degree">
                    Consultant Colorectal & Laparoscopic Surgeon
                </div>

            </div>

        </a>

        {{-- DESKTOP MENU --}}
        <div class="navbar-center">

            <ul class="portfolio-menu desktop-menu">

                <li class="nav-item">
                    <a href="{{ route('welcome') }}" class="nav-link">Home</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link">About</a>
                </li>

                <li class="nav-item dropdown">

                    <a href="#" class="nav-link dropdown-toggle">
                        Profile
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="{{ route('page_1') }}" class="dropdown-item">Educational Background</a></li>
                        <li><a href="{{ route('page_2') }}" class="dropdown-item">International Conference</a></li>
                        <li><a href="{{ route('page_3') }}" class="dropdown-item">Journal Publication</a></li>
                        <li><a href="{{ route('page_4') }}" class="dropdown-item">Membership</a></li>
                    </ul>

                </li>

                <li class="nav-item dropdown">

                    <a href="#" class="nav-link dropdown-toggle">
                        Treatments
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="{{ route('piles') }}" class="dropdown-item">Piles</a></li>
                        <li><a href="{{ route('fissure') }}" class="dropdown-item">Fissure</a></li>
                        <li><a href="{{ route('fistula') }}" class="dropdown-item">Fistula</a></li>
                        <li><a href="{{ route('ibs') }}" class="dropdown-item">IBS</a></li>
                        <li><a href="{{ route('colorectal_cancer') }}" class="dropdown-item">Colorectal Cancer</a></li>
                    </ul>

                </li>

                <li class="nav-item">
                    <a href="{{ route('gallery') }}" class="nav-link">Gallery</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('faq') }}" class="nav-link">FAQ</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                </li>

            </ul>

        </div>

        {{-- ACTIONS --}}
        <div class="navbar-actions">

            <a href="{{ route('contact') }}" class="portfolio-btn desktop-book-btn">

                Book Appointment

            </a>

            <button id="navbarOpenBtn" class="navbar-toggler" type="button">

                <i class="fas fa-bars"></i>

            </button>

        </div>

    </div>

</nav>

<div class="navbar-overlay"></div>

<div id="navbarCollapse" class="navbar-collapse">

    <div class="drawer-header">

        <h5>Menu</h5>

        <button id="navbarCloseBtn" class="navbar-close-btn">

            <i class="fas fa-times"></i>

        </button>

    </div>

    <ul class="portfolio-menu mobile-menu">
        <li class="nav-item">
            <a href="{{ route('welcome') }}" class="nav-link">Home</a>
        </li>

        <li class="nav-item">
            <a href="{{ route('about') }}" class="nav-link">About</a>
        </li>

        <li class="nav-item dropdown">

            <a href="#" class="nav-link dropdown-toggle">
                Profile
            </a>

            <ul class="dropdown-menu">
                <li><a href="{{ route('page_1') }}" class="dropdown-item">Educational Background</a></li>
                <li><a href="{{ route('page_2') }}" class="dropdown-item">International Conference</a></li>
                <li><a href="{{ route('page_3') }}" class="dropdown-item">Journal Publication</a></li>
                <li><a href="{{ route('page_4') }}" class="dropdown-item">Membership</a></li>
            </ul>

        </li>

        <li class="nav-item dropdown">

            <a href="#" class="nav-link dropdown-toggle">
                Treatments
            </a>

            <ul class="dropdown-menu">
                <li><a href="{{ route('piles') }}" class="dropdown-item">Piles</a></li>
                <li><a href="{{ route('fissure') }}" class="dropdown-item">Fissure</a></li>
                <li><a href="{{ route('fistula') }}" class="dropdown-item">Fistula</a></li>
                <li><a href="{{ route('ibs') }}" class="dropdown-item">IBS</a></li>
                <li><a href="{{ route('colorectal_cancer') }}" class="dropdown-item">Colorectal Cancer</a></li>
            </ul>

        </li>

        <li class="nav-item">
            <a href="{{ route('gallery') }}" class="nav-link">Gallery</a>
        </li>

        <li class="nav-item">
            <a href="{{ route('faq') }}" class="nav-link">FAQ</a>
        </li>

        <li class="nav-item">
            <a href="{{ route('contact') }}" class="nav-link">Contact</a>
        </li>

        <li class="nav-item">

            <a href="{{ route('contact') }}" class="nav-link">

                Book Appointment

            </a>
        </li>
    </ul>

</div>
