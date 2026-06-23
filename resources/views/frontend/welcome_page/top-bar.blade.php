<link rel="stylesheet" href="{{ asset('css/frontend/topbar/topbar-base.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/topbar/topbar-info.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/topbar/topbar-links.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/topbar/topbar-social.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/topbar/topbar-responsive.css') }}">
<div class="portfolio-topbar">
    <div class="container d-flex justify-content-between align-items-center">

        <!-- LEFT: Contact Info -->
        <div class="top-info">
            <!-- Location -->
            <a href="#" class="top-link" id="openLocationModal">
                <i class="fas fa-map-marker-alt"></i>
                86 (New), 726/A (Old), Satmasjid Road
            </a>

            <span class="divider">|</span>

            <a href="#" class="top-link open-phone-modal">
                <i class="fas fa-phone-alt"></i>
                01755697173
            </a>

            <span class="divider">|</span>

            <a href="#" class="top-link open-phone-modal">
                <i class="fas fa-phone-alt"></i>
                01755697176
            </a>

            <span class="divider">|</span>

            <a href="#" class="top-link" id="openEmailModal">
                <i class="fas fa-envelope"></i>
                info@fazlulhaquehospital.com
            </a>
        </div>

        <!-- RIGHT: Social + Language -->
        <div class="top-social">
            <a href="https://www.facebook.com/DrAsifAlmasHaque" target="_blank" class="social-icon">
                <i class="fab fa-facebook-f"></i>
            </a>

            <a href="https://www.youtube.com/@DrAsifAlmasHaque" target="_blank" class="social-icon">
                <i class="fab fa-youtube"></i>
            </a>

            <button id="langToggle" class="lang-btn">EN</button>
        </div>

    </div>
</div>
