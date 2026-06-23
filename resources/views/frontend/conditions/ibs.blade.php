@extends('frontend.layouts.app')

@section('title', 'Irritable Bowel Syndrome (IBS)')

@section('meta')
    <meta name="description"
        content="Expert Irritable Bowel Syndrome (IBS) treatment by Dr. Asif Almas Haque. Learn about IBS symptoms, causes, risk factors, and effective management including diet, medications, and stress control.">

    <meta name="keywords"
        content="IBS, Irritable Bowel Syndrome, Abdominal Pain, Bloating, Constipation, Diarrhea, IBS Management, Colorectal Specialist, Bangladesh">

    <meta name="author" content="Dr. Asif Almas Haque - Colorectal Surgeon">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph -->
    <meta property="og:title" content="Irritable Bowel Syndrome (IBS) Treatment | Dr. Asif Almas Haque">
    <meta property="og:description"
        content="IBS management in Bangladesh: diet, lifestyle, and medical treatment by expert colorectal surgeon Dr. Asif Almas Haque.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('uploads/images/welcome_page/conditions/ibs.jpg') }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="IBS Treatment Specialist | Dr. Asif Almas Haque">
    <meta name="twitter:description"
        content="Learn effective IBS management including diet, medications, stress control, and lifestyle modifications from a colorectal expert.">
@endsection

@section('schema')
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "MedicalCondition",
  "name": "Irritable Bowel Syndrome (IBS)",
  "description": "Irritable Bowel Syndrome (IBS) is a common functional disorder of the large intestine, causing abdominal discomfort, bloating, and altered bowel habits.",
  "associatedAnatomy": {
    "@type": "AnatomicalStructure",
    "name": "Large Intestine"
  },
  "possibleTreatment": [
    {
      "@type": "MedicalTherapy",
      "name": "Dietary changes"
    },
    {
      "@type": "MedicalTherapy",
      "name": "Medications (anti-spasmodics, laxatives, anti-diarrheal)"
    },
    {
      "@type": "MedicalTherapy",
      "name": "Stress management"
    },
    {
      "@type": "MedicalTherapy",
      "name": "Probiotics"
    }
  ]
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
            <a href="{{ route('ibs') }}" class="doc-link text-decoration-none">IBS</a>
        </nav>
    </div>

    <section class="condition-profile">
        <div class="doctor-card">
            <div class="row">

                <!-- Left Column -->
                <div class="col-lg-8 col-md-12 condition-content" data-aos="fade-up">
                    <h2 class="doctor-name">Irritable Bowel Syndrome (IBS)</h2>

                    <p>
                        Irritable Bowel Syndrome (IBS) is a common functional disorder affecting the large intestine.
                        It is not life-threatening but can significantly impact quality of life.
                        IBS is characterized by abdominal discomfort or pain along with changes in bowel habits.
                    </p>

                    <h5 class="section-title mt-3">Who is at Risk?</h5>
                    <ul class="expertise-list">
                        <li>Women are more likely to be affected than men</li>
                        <li>People under 50 years of age</li>
                        <li>Those with a family history of IBS</li>
                        <li>History of intestinal infections</li>
                        <li>High levels of stress or anxiety</li>
                    </ul>

                    <h5 class="section-title mt-3">Symptoms</h5>
                    <ul class="expertise-list">
                        <li>Abdominal pain or cramping</li>
                        <li>Bloating and gas</li>
                        <li>Diarrhea, constipation, or alternating both</li>
                        <li>Mucus in stool</li>
                        <li>Urgency to pass stool</li>
                    </ul>

                    <h5 class="section-title mt-3">Diagnosis</h5>
                    <ul class="expertise-list">
                        <li>Detailed medical history and symptom evaluation</li>
                        <li>Physical examination</li>
                        <li>Rule out other conditions with blood tests, stool tests, or colonoscopy if needed</li>
                    </ul>

                    <h5 class="section-title mt-3">Treatment & Management</h5>
                    <ul class="expertise-list">
                        <li><strong>Dietary changes:</strong> High-fiber diet, avoid trigger foods like caffeine, spicy
                            foods, and fatty foods</li>
                        <li><strong>Hydration:</strong> Drink plenty of water daily</li>
                        <li><strong>Medications:</strong> Anti-spasmodics, laxatives, anti-diarrheal medications as needed
                        </li>
                        <li><strong>Stress management:</strong> Yoga, meditation, counseling</li>
                        <li><strong>Probiotics:</strong> May help improve gut health</li>
                    </ul>

                    <h5 class="section-title mt-3">Living with IBS</h5>
                    <p>
                        While IBS cannot be cured completely, symptoms can be managed with lifestyle changes,
                        diet modifications, and proper guidance from a gastroenterologist.
                        Keeping a symptom diary and identifying triggers can greatly improve day-to-day comfort.
                    </p>
                </div>

                <!-- Right Column (Optional Image) -->
                {{-- <div class="col-lg-4 col-md-12 d-flex justify-content-center align-items-start mt-4 mt-lg-0"
                    data-aos="fade-left">
                    <div class="doctor-image">
                        <img src="{{ asset('uploads/images/welcome_page/conditions/ibs.jpg') }}" alt="IBS Image"
                            class="img-fluid rounded shadow-sm">
                    </div>
                </div> --}}

            </div>
        </div>
    </section>

    @include('frontend.welcome_page.footer')

@endsection
