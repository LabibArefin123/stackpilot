@extends('frontend.layouts.app')

@section('title', 'Fistula Information')

@section('meta')
    <meta name="description"
        content="Learn about anal fistula causes, symptoms, MRI diagnosis, and advanced surgical treatments including fistulotomy, LIFT procedure, seton placement, and minimally invasive options.">

    <meta name="keywords"
        content="Anal Fistula, Fistula Treatment, Fistulotomy, LIFT Procedure, Seton, MRI Fistulogram, Colorectal Surgeon, Anal Abscess, Bangladesh">

    <meta name="author" content="Dr. Asif Almas Hoque - Colorectal Surgeon">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph (Facebook / WhatsApp Preview) -->
    <meta property="og:title" content="Anal Fistula | Symptoms, MRI Diagnosis & Surgical Treatment">
    <meta property="og:description"
        content="Comprehensive guide to anal fistula including causes, drainage, pain, MRI fistulogram, and modern surgical options.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('uploads/images/welcome_page/conditions/fistula.jpg') }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Anal Fistula Treatment | Advanced Surgical Care">
    <meta name="twitter:description"
        content="Persistent drainage or anal abscess? Learn about fistula treatment options including LIFT and fistulotomy.">
@endsection

@section('schema')
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "MedicalCondition",
  "name": "Anal Fistula",
  "description": "An anal fistula is an abnormal tract between the anal canal and the skin, usually following an abscess.",
  "associatedAnatomy": {
    "@type": "AnatomicalStructure",
    "name": "Anal Canal"
  },
  "possibleTreatment": [
    {
      "@type": "MedicalTherapy",
      "name": "Fistulotomy"
    },
    {
      "@type": "MedicalTherapy",
      "name": "Seton Placement"
    },
    {
      "@type": "MedicalTherapy",
      "name": "LIFT Procedure"
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
            <a href="{{ route('fistula') }}" class="doc-link text-decoration-none">Fistula</a>
        </nav>
    </div>

    <section class="condition-profile">
        <div class="doctor-card">
            <div class="row">

                <!-- Left Column -->
                <div class="col-lg-8 col-md-12 condition-content" data-aos="fade-up">
                    <h2 class="doctor-name">Anal Fistula</h2>

                    <p>
                        An anal fistula is an abnormal connection between the anal canal and the skin near the anus.
                        It usually develops after an infection in the anal glands which forms an abscess that drains on its
                        own
                        or surgically, leaving a tunnel. Fistulas can cause discomfort, drainage, and recurrent infections
                        if untreated.
                    </p>

                    <h5 class="section-title mt-3">Who Gets Fistulas?</h5>
                    <p>Anal fistulas can affect anyone, but are more common in:</p>
                    <ul class="expertise-list">
                        <li>Adults aged 30–50 years</li>
                        <li>Patients with a history of anal abscesses</li>
                        <li>People with Crohn’s disease or inflammatory bowel disease</li>
                        <li>Those with chronic infections around the anal area</li>
                    </ul>

                    <h5 class="section-title mt-3">Symptoms</h5>
                    <ul class="expertise-list">
                        <li>Persistent drainage from the anal opening</li>
                        <li>Pain or swelling around the anus</li>
                        <li>Recurring abscesses</li>
                        <li>Itching or irritation near the affected area</li>
                        <li>Fever in case of infection</li>
                    </ul>

                    <h5 class="section-title mt-3">Investigations</h5>
                    <ul class="expertise-list">
                        <li>Clinical examination (inspection & palpation)</li>
                        <li>MRI fistulogram – gold standard to define fistula path</li>
                        <li>Endoanal ultrasound</li>
                        <li>Proctoscopy to rule out underlying conditions</li>
                    </ul>

                    <h5 class="section-title mt-3">Treatment Options</h5>
                    <ul class="expertise-list">
                        <li><strong>Conservative management:</strong> Only for minor asymptomatic fistulas, hygiene, sitz
                            baths, antibiotics if infected.</li>
                        <li><strong>Surgical treatment:</strong>
                            <ul>
                                <li>Fistulotomy – opening the fistula to heal naturally</li>
                                <li>Seton placement – for complex fistulas to allow drainage</li>
                                <li>Advancement flap – for high or complex fistulas</li>
                                <li>LIFT procedure (ligation of intersphincteric fistula tract)</li>
                                <li>Fibrin glue or plugs – minimally invasive options</li>
                            </ul>
                        </li>
                        <li><strong>Post-operative care:</strong> Sitz baths, stool softeners, high-fibre diet, and hygiene
                            to prevent recurrence.</li>
                    </ul>

                    <h5 class="section-title mt-3">Prevention & Advice</h5>
                    <ul class="expertise-list">
                        <li>Maintain good anal hygiene</li>
                        <li>Treat abscesses promptly</li>
                        <li>Eat a high-fibre diet to prevent constipation</li>
                        <li>Avoid straining during bowel movements</li>
                        <li>Follow-up after surgery to monitor for recurrence</li>
                    </ul>

                </div>

                <!-- Right Column (Optional Image / Sidebar) -->
                {{-- <div class="col-lg-4 col-md-12 d-flex justify-content-center align-items-start mt-4 mt-lg-0"
                    data-aos="fade-left">
                    <div class="doctor-image">
                        <img src="{{ asset('uploads/images/welcome_page/conditions/fistula.jpg') }}" alt="Fistula Image"
                            class="img-fluid rounded shadow-sm">
                    </div>
                </div> --}}

            </div>
        </div>
    </section>

    @include('frontend.welcome_page.footer')

@endsection
