@extends('frontend.layouts.app')

@section('title', 'Contact | Dr. Asif Almas Haque')

@section('meta')
    <!-- Meta Description & Keywords -->
    <meta name="description" content="Get in touch with Dr. Asif Almas Haque, leading colorectal surgeon in Dhaka, Bangladesh, for appointments or inquiries.">
    <meta name="keywords" content="Contact Dr Asif Almas Haque, colorectal surgeon Dhaka, appointment, clinic contact">

    <!-- Open Graph -->
    <meta property="og:title" content="Contact | Dr. Asif Almas Haque">
    <meta property="og:description" content="Reach out to Dr. Asif Almas Haque, expert in colorectal, laparoscopic, and laser surgery.">
    <meta property="og:image" content="{{ asset('uploads/images/welcome_page/doctors/image_2.jpg') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Contact | Dr. Asif Almas Haque">
    <meta name="twitter:description" content="Reach out to Dr. Asif Almas Haque for appointments or queries regarding colorectal treatments.">
    <meta name="twitter:image" content="{{ asset('uploads/images/welcome_page/doctors/image_2.jpg') }}">

    <!-- Structured Data: LocalBusiness -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "MedicalBusiness",
      "name": "Dr. Asif Almas Haque",
      "image": "{{ asset('uploads/images/welcome_page/doctors/image_2.jpg') }}",
      "description": "Consult Dr. Asif Almas Haque, a leading colorectal surgeon in Dhaka, Bangladesh.",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Your Clinic Street Address",
        "addressLocality": "Dhaka",
        "postalCode": "Your Postal Code",
        "addressCountry": "BD"
      },
      "telephone": "Your Clinic Phone Number",
      "url": "{{ url()->current() }}",
      "sameAs": [
        "https://www.facebook.com/your-page",
        "https://www.youtube.com/@asifh7000",
        "https://www.linkedin.com/in/your-profile"
      ]
    }
    </script>
@endsection

<link rel="stylesheet" href="{{ asset('css/frontend/contact/custom_contact.css') }}">

@section('content')

    @include('frontend.welcome_page.header')

    <!-- Banner -->
    <div class="contact-banner" style="background-image: url('{{ asset('uploads/images/welcome_page/cover.png') }}');">
        <div class="contact-overlay"></div>
        <div class="contact-breadcrumb">
            <a href="{{ route('welcome') }}">Home</a>
            <span>></span>
            <a href="{{ route('contact') }}">Contact Us</a>
        </div>
    </div>

    <section class="contact-section">
        <div class="contact-container">

            <!-- Left: Appointment Form -->
            <div class="contact-form-wrapper">
                <h2 class="contact-title">Make an Appointment</h2>
                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <input type="hidden" name="type" value="contact">

                    <div class="modal-body row">

                        <div class="col-md-6 mb-2">
                            <label>Full Name</label>
                            <input name="name" class="form-control">
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Phone</label>
                            <input name="phone" class="form-control">
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Email</label>
                            <input name="email" type="email" class="form-control">
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Subject</label>
                            <input name="subject" class="form-control">
                        </div>

                        <div class="col-12">
                            <label>Message</label>
                            <textarea name="message" rows="4" class="form-control"></textarea>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success w-100">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>

            <!-- Right: Contact Info -->
            <div class="contact-info-wrapper">

                <h3>Contact Information</h3>

                <div class="info-item">
                    <strong>Hospital</strong>
                    <p>Dr. Fazlul Haque Colorectal Hospital</p>
                </div>

                <div class="info-item">
                    <strong>Phone</strong>
                    <p>0241023155</p>
                </div>

                <div class="info-item">
                    <strong>Email</strong>
                    <p>asifh7000@gmail.com</p>
                </div>

                <div class="info-item">
                    <strong>Hospital Hours</strong>
                    <p>Saturday – Thursday: 5PM – 9PM</p>
                    <p class="closed-day">Friday: Closed</p>
                </div>

            </div>

        </div>
    </section>
    @include('frontend.welcome_page.footer')
@endsection
