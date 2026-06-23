@extends('frontend.layouts.app')

@section('title', 'Piles Treatment in Bangladesh | Best Piles Doctor in Dhaka')

@section('meta')
    <meta name="description"
        content="Looking for the best piles doctor in Dhaka? Dr. Asif Almas Haque is a leading colorectal surgeon in Bangladesh offering advanced piles treatment including laser surgery and haemorrhoidectomy.">

    <meta property="og:title" content="Piles Treatment in Bangladesh | Dr. Asif Almas Haque">

    <meta property="og:description"
        content="Expert piles treatment in Dhaka by experienced colorectal surgeon. Advanced laser surgery and modern haemorrhoid treatment available.">

    <meta property="og:image" content="{{ asset('uploads/images/welcome_page/doctors/image_2.jpg') }}">

    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">

    <link rel="canonical" href="{{ url()->current() }}">

    <script type="application/ld+json">
{
 "@context": "https://schema.org",
 "@type": "MedicalCondition",
 "name": "Piles (Haemorrhoids)",
 "possibleTreatment": {
   "@type": "MedicalTherapy",
   "name": "Laser Surgery and Haemorrhoidectomy"
 }
}
</script>
@endsection

<link rel="stylesheet" href="{{ asset('css/frontend/about/custom_about.css') }}">

@section('content')

    @include('frontend.welcome_page.header')

    <!-- Banner -->
    <div class="doctor-banner" style="background-image: url('{{ asset('uploads/images/welcome_page/cover.png') }}');">
        <nav class="breadcrumb-custom">
            <a href="{{ route('welcome') }}" class="doc-link text-decoration-none">Home</a>
            <span>></span>
            <a href="{{ route('piles') }}" class="doc-link text-decoration-none">Piles</a>
        </nav>
    </div>

    <section class="condition-profile">
        <div class="doctor-card">
            <div class="row">

                <!-- Left Column -->
                <div class="col-lg-8 col-md-12 condition-content" data-aos="fade-up">
                    <h1>Piles Treatment in Bangladesh (Haemorrhoids)</h1>

                    <p>
                        Piles or haemorrhoids are one of the most common diseases in Bangladesh. They are blood-filled anal
                        cushions.
                        Everyone is born with piles, which help maintain continence and prevent leakage of stool from the
                        anal canal.
                    </p>

                    <h5 class="section-title mt-3">Who Gets Piles?</h5>
                    <p>Piles can occur at any age but are most common in young adults. They are rare in infants and
                        children.</p>

                    <h5 class="section-title mt-3">Who Is At Risk?</h5>
                    <ul class="expertise-list">
                        <li>People who are overweight</li>
                        <li>During pregnancy</li>
                        <li>People who eat a low-fibre diet</li>
                        <li>People with long-term constipation or diarrhoea</li>
                        <li>People who lift heavy objects</li>
                        <li>People who sit on the toilet for long periods</li>
                        <li>People who strain during defecation</li>
                    </ul>

                    <h5 class="section-title mt-3">Types of Haemorrhoids</h5>
                    <ul class="expertise-list">
                        <li><strong>External:</strong> Swelled skin around the anal canal. Usually does not bleed but may
                            become painful (thrombosed haemorrhoids). Usually no treatment is required.</li>
                        <li><strong>Internal:</strong> Swellings coming out of the anal canal. Usually bleeds. Requires
                            treatment.</li>
                    </ul>

                    <h5 class="section-title mt-3">Symptoms of Internal Haemorrhoids</h5>
                    <ul class="expertise-list">
                        <li>Fresh painless bleeding, usually drop by drop</li>
                        <li>An external swelling may be felt, which may or may not reduce</li>
                        <li>Sometimes itching or discomfort</li>
                    </ul>

                    <h5 class="section-title mt-3">Investigations</h5>
                    <ul class="expertise-list">
                        <li>Digital rectal examination</li>
                        <li>Proctoscopy</li>
                        <li>Colonoscopy</li>
                    </ul>

                    <h5 class="section-title mt-3">Treatment</h5>
                    <ul class="expertise-list">
                        <li><strong>Lifestyle Modifications:</strong>
                            <ul>
                                <li>Drink more water</li>
                                <li>Ispagula husk</li>
                                <li>Increase fibre intake – fruits and vegetables</li>
                                <li>Lose weight</li>
                                <li>Regular exercise</li>
                                <li>Do not sit on the toilet for long periods</li>
                            </ul>
                        </li>
                        <li><strong>Medications:</strong>
                            <ul>
                                <li>Diosmin + Hesperidin</li>
                                <li>Topical ointments</li>
                                <li>Stool softeners</li>
                            </ul>
                        </li>
                        <li><strong>Surgery:</strong> when conservative treatment fails
                            <ul>
                                <li>Open haemorrhoidectomy</li>
                                <li>Rubber ring ligations</li>
                                <li>Longo operations</li>
                                <li>Laser operations</li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <!-- Right Column (Optional Image / Sidebar) -->
                {{-- <div class="col-lg-4 col-md-12 d-flex justify-content-center align-items-start mt-4 mt-lg-0"
                    data-aos="fade-left">
                    <div class="doctor-image">
                        <img src="{{ asset('uploads/images/welcome_page/conditions/piles.jpg') }}" alt="Piles Image"
                            class="img-fluid rounded shadow-sm">
                    </div>
                </div> --}}

            </div>
        </div>
    </section>

    @include('frontend.welcome_page.footer')

@endsection
