@extends('frontend.layouts.app')

@section('title', 'Frequently Asked Questions | Dr. Asif Almas Haque')

@section('meta')
    <!-- Meta Description & Keywords -->
    <meta name="description"
        content="Frequently Asked Questions about colorectal surgery, piles, fistula, fissure, and colorectal cancer with Dr. Asif Almas Haque in Dhaka.">
    <meta name="keywords"
        content="FAQ Dr Asif Almas Haque, colorectal surgeon questions, piles, fistula, IBS, colorectal cancer">

    <!-- Open Graph -->
    <meta property="og:title" content="Frequently Asked Questions | Dr. Asif Almas Haque">
    <meta property="og:description"
        content="Answers to common questions about colorectal treatments, laser and laparoscopic surgery, and appointments with Dr. Asif Almas Haque.">
    <meta property="og:image" content="{{ asset('uploads/images/welcome_page/doctors/image_2.jpg') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Frequently Asked Questions | Dr. Asif Almas Haque">
    <meta name="twitter:description"
        content="Common questions answered about colorectal conditions, surgeries, and appointments with Dr. Asif Almas Haque.">
    <meta name="twitter:image" content="{{ asset('uploads/images/welcome_page/doctors/image_2.jpg') }}">

    <!-- FAQ Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "What conditions do you commonly treat?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "I commonly treat colorectal conditions including piles, fissure, fistula, colorectal cancer, pilonidal sinus, obstructed defecation syndrome, and other anorectal disorders using modern surgical techniques."
          }
        },
        {
          "@type": "Question",
          "name": "Do you perform laparoscopic or minimally invasive surgery?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. I regularly perform laparoscopic and minimally invasive colorectal procedures to ensure faster recovery, reduced pain, and minimal scarring."
          }
        },
        {
          "@type": "Question",
          "name": "Is laser surgery available for piles and fistula?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. Laser surgery is available for selected cases of piles and fistula. Treatment suitability is determined after detailed evaluation."
          }
        },
        {
          "@type": "Question",
          "name": "How can I book an appointment?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "You can book an appointment through the website’s booking section or by contacting the chamber directly via phone."
          }
        },
        {
          "@type": "Question",
          "name": "Do you treat colorectal cancer?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. I perform advanced colorectal cancer surgeries and follow multidisciplinary treatment approaches for optimal patient outcomes."
          }
        }
      ]
    }
    </script>
@endsection

<link rel="stylesheet" href="{{ asset('css/frontend/faq/custom_faq.css') }}">

@section('content')

    @include('frontend.welcome_page.header')

    <!-- Banner -->
    <div class="doctor-banner" style="background-image: url('{{ asset('uploads/images/welcome_page/cover.png') }}');">
        <nav class="breadcrumb-custom">
            <a href="{{ route('welcome') }}" class="doc-link text-decoration-none">Home</a>
            <span>></span>
            <a href="{{ route('faq') }}" class="doc-link text-decoration-none">FAQ</a>
        </nav>
    </div>

    <section class="doctor-profile">
        <div class="doctor-card">

            <h2 class="doctor-name text-center mb-5">
                Frequently Asked Questions
            </h2>

            <div class="faq-container">

                <!-- FAQ Item -->
                <div class="faq-item">
                    <div class="faq-question">
                        What conditions do you commonly treat?
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-answer">
                        I commonly treat colorectal conditions including piles, fissure, fistula,
                        colorectal cancer, pilonidal sinus, obstructed defecation syndrome,
                        and other anorectal disorders using modern surgical techniques.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        Do you perform laparoscopic or minimally invasive surgery?
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-answer">
                        Yes. I regularly perform laparoscopic and minimally invasive colorectal
                        procedures to ensure faster recovery, reduced pain, and minimal scarring.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        Is laser surgery available for piles and fistula?
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-answer">
                        Yes. Laser surgery is available for selected cases of piles and fistula.
                        Treatment suitability is determined after detailed evaluation.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        How can I book an appointment?
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-answer">
                        You can book an appointment through the website’s booking section
                        or by contacting the chamber directly via phone.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        Do you treat colorectal cancer?
                        <span class="faq-icon">+</span>
                    </div>
                    <div class="faq-answer">
                        Yes. I perform advanced colorectal cancer surgeries and follow
                        multidisciplinary treatment approaches for optimal patient outcomes.
                    </div>
                </div>

            </div>

        </div>
    </section>

    @include('frontend.welcome_page.footer')

    <!-- FAQ JavaScript -->
    <script>
        document.querySelectorAll(".faq-question").forEach(item => {
            item.addEventListener("click", function() {
                const parent = this.parentElement;
                const answer = parent.querySelector(".faq-answer");
                const icon = this.querySelector(".faq-icon");

                // Close other items
                document.querySelectorAll(".faq-item").forEach(faq => {
                    if (faq !== parent) {
                        faq.classList.remove("active");
                        faq.querySelector(".faq-answer").style.maxHeight = null;
                        faq.querySelector(".faq-icon").textContent = "+";
                    }
                });

                // Toggle current
                parent.classList.toggle("active");

                if (parent.classList.contains("active")) {
                    answer.style.maxHeight = answer.scrollHeight + "px";
                    icon.textContent = "–";
                } else {
                    answer.style.maxHeight = null;
                    icon.textContent = "+";
                }
            });
        });
    </script>

@endsection
