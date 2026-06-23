@extends('frontend.layouts.app')

@section('title', 'About Dr. Asif Almas Haque | Colorectal Surgeon in Bangladesh')

@section('meta')
<meta name="description" content="Learn about Dr. Asif Almas Haque, a leading colorectal, laparoscopic and laser surgeon in Bangladesh. FRCS (England, Glasgow, Edinburgh), FACS (USA), specialist in piles, fissure, fistula and colorectal cancer surgery in Dhaka.">

<meta property="og:title" content="About Dr. Asif Almas Haque | Colorectal Surgeon in Bangladesh">

<meta property="og:description" content="Consultant colorectal surgeon in Dhaka with international qualifications including FRCS and FACS. Expertise in advanced colorectal and laparoscopic surgery.">

<meta property="og:image" content="{{ asset('uploads/images/welcome_page/doctors/image_2.jpg') }}">

<meta property="og:type" content="profile">
<meta property="og:url" content="{{ url()->current() }}">

<link rel="canonical" href="{{ url()->current() }}">

<script type="application/ld+json">
{
 "@context": "https://schema.org",
 "@type": "Physician",
 "name": "Dr. Asif Almas Haque",
 "medicalSpecialty": "Colorectal Surgery",
 "areaServed": "Bangladesh",
 "jobTitle": "Consultant Colorectal Surgeon",
 "alumniOf": [
   "FRCS England",
   "FRCS Glasgow",
   "FRCS Edinburgh",
   "FACS USA"
 ]
}
</script>
@endsection

<link rel="stylesheet" href="{{ asset('css/frontend/about/custom_about.css') }}">

@section('content')

    @include('frontend.welcome_page.header')
    <div class="doctor-banner" style="background-image: url('{{ asset('uploads/images/welcome_page/cover.png') }}');">
        <nav class="breadcrumb-custom">
            <a href="{{ route('welcome') }}" class="doc-link text-decoration-none">Home</a>
            <span>></span>

            <a href="{{ route('about') }}" class="doc-link text-decoration-none ">Dr. Asif Almas Haque</a>
        </nav>
    </div>
    <section class="doctor-profile">
        <div class="doctor-card">
            <div class="row align-items-start">
                <!-- Image + Book -->
                <div class="col-lg-4 col-md-5 mb-4 mb-md-0">
                    <div class="doctor-image">
                        <img src="{{ asset('uploads/images/welcome_page/doctors/image_2.jpg') }}" class="magnify-img"
                            alt="Dr. Asif Almas Haque">

                        <a href="{{ route('contact') }}" class="book-btn">Appoint Now</a>
                    </div>
                </div>

                <!-- Content -->
            <div class="col-lg-8 col-md-7 doctor-content">
                <h2 class="doctor-name">Dr. Asif Almas Haque</h2>

                <p class="doctor-degree">
                    MBBS (SSMC), FCPS (Surgery), FCPS (Colorectal Surgery),<br>
                    FRCS (England), FRCS (Glasgow), FRCS (Edinburgh),<br>
                    FACS (USA), FASCRS (USA)
                </p>

                <p class="doctor-designation">
                    Consultant, Colorectal, Laparoscopic and Laser Surgeon<br>
                    Member, American Society of Colon and Rectal Surgeons
                </p>

                <h5 class="section-title">Areas of Expertise</h5>
                <ul class="expertise-list">
                    <li>Colorectal Surgery</li>
                    <li>Laparoscopic Surgery</li>
                    <li>Laser Surgery</li>
                </ul>

                <h5 class="section-title">About Me</h5>

                <p>
                    I believe that a surgeon’s primary professional responsibility is to correct illness, abnormality,
                    or injury through precise surgical intervention. Surgery is not limited to performing procedures
                    alone;
                    it also involves accurate diagnosis, careful planning, proper training, and comprehensive
                    post-operative care.
                    Ensuring that patients receive complete support throughout their surgical and recovery journey is
                    essential.
                </p>

                <p>
                    I strive to be a compassionate doctor who always considers my patients’ needs and comfort during
                    diagnosis and treatment.
                    I make sure that patients clearly understand their condition, receive relevant information about
                    available treatment options,
                    and participate in deciding the most appropriate treatment plan. I personally oversee every step of
                    the surgical process,
                    from initial planning to recommended aftercare instructions.
                </p>

                <p>
                    I strongly believe that the management of complex surgical cases is best achieved through a
                    multidisciplinary team approach.
                    Seeking a second opinion when necessary fosters collaboration, professional growth, and ultimately
                    ensures the highest
                    standard of patient care.
                </p>


                <h5 class="section-title mt-4">General Surgical Experience</h5>

                <p>
                    I worked as a General Surgeon for four years (2011–2014). During this time, my experience at Mitford
                    Hospital
                    and Dhaka Medical College Hospital provided invaluable exposure to various aspects of general
                    surgical practice.
                </p>

                <p>
                    I had the privilege of working under eminent professors including
                    Prof. (Rtd.) Syed Mahbubul Alam, Prof. (Rtd.) Hashem Bhuiyan, and Prof. Imtiaz Faruk.
                    Since January 2018, I have been working at BIRDEM General Hospital under the guidance of
                    Professor Samiron Kumar Mondol, a renowned laparoscopic general surgeon.
                    There, I gained extensive experience in performing routine general surgeries using laparoscopic
                    techniques.
                </p>


                <h5 class="section-title mt-4">Colorectal Surgical Experience</h5>

                <p>
                    I have been working as a full-time colorectal surgeon since 2015.
                    I had the honor of working with Bangladesh’s first colorectal surgeon,
                    Prof. Dr. AKM Fazlul Haque.
                </p>

                <p>
                    Together, we perform one of the highest volumes of colorectal surgeries in Bangladesh.
                    On average, we see 80–100 patients daily and perform 15–20 anorectal procedures each day
                    for conditions such as piles, fissure, fistula, and pilonidal sinus.
                </p>

                <p>
                    We frequently perform complex pelvic operations for obstructed defecation syndrome,
                    including STARR and ventral rectopexy procedures.
                    Additionally, we carry out a significant number of colorectal cancer surgeries,
                    contributing to advanced colorectal care in Bangladesh.
                </p>


                <!-- YouTube -->
                <div class="youtube-card">
                    <iframe src="https://www.youtube.com/embed/txHKFJtOqYE" title="Dr. Asif Almas Haque YouTube Video"
                        frameborder="0" allowfullscreen>
                    </iframe>

                    <div class="yt-channel">
                        <a href="https://www.youtube.com/@asifh7000" target="_blank">
                            ▶ Visit YouTube Channel
                        </a>
                    </div>
                </div>

            </div>
            </div>
        </div>

    </section>

    @include('frontend.welcome_page.footer')
@endsection
