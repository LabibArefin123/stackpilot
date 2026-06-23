<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @hasSection('title')
            @yield('title')
        @else
            {{ config('app.name', 'Dr. Asif Almas Haque') }}
        @endif
    </title>

    @hasSection('meta')
        @yield('meta')
    @else
        <meta name="description"
            content="Dr. Asif Almas Haque is a leading colorectal surgeon in Bangladesh specializing in piles, fissure, fistula and colorectal cancer treatment.">
        <link rel="canonical" href="{{ url()->current() }}">
    @endif

    <!-- Fonts -->
    <link rel="icon" type="image/png" href="{{ asset('uploads/images/icon2.JPG') }}">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/frontend/frontend.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/modals/custom_appointment_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/modals/custom_contact_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/modals/custom_email_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/modals/custom_location_modal.css') }}">
</head>

<body>
    <div id="app">

        <!-- Scroll Progress Bar -->
        <div id="scrollProgress"
            style="position: fixed; top: 0; left: 0; width: 0%; height: 4px; background-color: #ff6b6b; z-index: 9999; transition: width 0.25s ease;">
        </div>

        <main>
            @yield('content')
        </main>

    </div>
    @include('frontend.modal.phone')
    @include('frontend.modal.email')
    @include('frontend.modal.location')
    @include('frontend.modal.footer.phone')
    @include('frontend.modal.footer.email')
    @include('frontend.modal.footer.location')

    <!-- Hidden Google Translate Widget -->
    <div id="google_translate_element" style="display:none;"></div>
    <!-- Bootstrap JS + dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, // Animation duration
            easing: 'ease-in-out', // Easing style
            once: true, // Only animate once
        });
    </script>

    <!-- Back to Top Button -->
    <button id="backToTop" class="back-to-top" aria-label="Back to Top">
        <i class="bi bi-arrow-up"></i>
    </button>

    {{-- Start of SweetAlert2 notifications --}}
    <script>
        window.appData = {
            success: @json(session('success')),
            errors: @json($errors->all())
        };
    </script>
    {{-- End of SweetAlert2 notifications --}}

    {{-- Start of Contact Succss Swal Notification --}}
    <script>
        window.contactSuccess = @json(session('contact_success', null));
    </script>
    {{-- End of Contact Succss Swal Notification --}}

    <script src="{{ asset('js/custom_frontend/sweet_alert.js') }}"></script> {{-- Sweet Alert Notification JS --}}
    <script src="{{ asset('js/custom_frontend/contact_success.js') }}"></script> {{-- Contact Success Notification JS --}}
    <script src="{{ asset('js/custom_frontend/navbar-collapse.js') }}"></script> {{-- Navbar collapse JS --}}
    <script src="{{ asset('js/custom_frontend/problem-modal.js') }}"></script> {{-- Problem modal JS --}}
    <script src="{{ asset('js/custom_frontend/password-toggle.js') }}"></script> {{-- Password toggle JS --}}
    <script src="{{ asset('js/custom_frontend/phone.js') }}"></script> {{-- Phone Modal JS --}}
    <script src="{{ asset('js/custom_frontend/email.js') }}"></script> {{-- Email Modal JS --}}
    <script src="{{ asset('js/custom_frontend/location.js') }}"></script> {{-- Location Modal JS --}}
    <script src="{{ asset('js/custom_frontend/land_phone.js') }}"></script> {{-- Land Phone Modal JS --}}
    <script src="{{ asset('js/custom_frontend/language.js') }}"></script> {{-- Language Modal JS --}}
    <script src="{{ asset('js/custom_frontend/magnified_image_modal.js') }}"></script> {{-- Magnified Image Modal JS --}}
    <script src="{{ asset('js/custom_frontend/scroll_progress.js') }}"></script> {{-- Scroll Progress JS --}}
    <script src="{{ asset('js/custom_frontend/custom_back_top_button.js') }}"></script> {{-- Back to Top JS --}}
    <script src="{{ asset('js/custom_frontend/custom_footer_modal.js') }}"></script> {{-- Footer Modal JS --}}

    @if (!Request::is('login'))
        <!-- Google Translate Library -->
        <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

        <script>
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'en',
                    includedLanguages: 'en,bn',
                    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                }, 'google_translate_element');
            }
        </script>
    @endif

</body>

</html>
