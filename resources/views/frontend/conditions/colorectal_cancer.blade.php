@extends('frontend.layouts.app')

@section('title', 'Colorectal Cancer')

@section('meta')
    <meta name="description"
        content="Learn about colorectal cancer symptoms, causes, screening, and treatment options including colonoscopy, surgery, chemotherapy, and prevention. Early detection saves lives.">

    <meta name="keywords"
        content="Colorectal Cancer, Colon Cancer, Rectal Cancer, Colonoscopy, Blood in Stool, Colorectal Surgeon, Cancer Treatment, Screening, Bangladesh">

    <meta name="author" content="Dr. Asif Almas Haque - Colorectal Surgeon">

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="Colorectal Cancer | Symptoms, Screening & Treatment">
    <meta property="og:description"
        content="Comprehensive guide on colorectal cancer including risk factors, symptoms, diagnosis, staging, and modern treatment options.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('uploads/images/welcome_page/conditions/colorectal_cancer.jpg') }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Colorectal Cancer | Early Detection & Treatment">
    <meta name="twitter:description"
        content="Know the warning signs of colorectal cancer and when to consult a colorectal surgeon. Screening after 45 can save lives.">
@endsection

@section('schema')
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "MedicalCondition",
  "name": "Colorectal Cancer",
  "description": "Colorectal cancer is a cancer affecting the colon or rectum. Early detection through colonoscopy improves survival rates.",
  "possibleTreatment": [
    {
      "@type": "MedicalTherapy",
      "name": "Surgery"
    },
    {
      "@type": "MedicalTherapy",
      "name": "Chemotherapy"
    },
    {
      "@type": "MedicalTherapy",
      "name": "Radiation Therapy"
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
            <a href="{{ route('colorectal_cancer') }}" class="doc-link text-decoration-none">Colorectal Cancer</a>
        </nav>
    </div>

    <section class="condition-profile">
        <div class="doctor-card">
            <div class="row">

                <!-- Left Column -->
                <div class="col-lg-8 col-md-12 condition-content" data-aos="fade-up">
                    <h2 class="doctor-name">Colorectal Cancer</h2>

                    <p>
                        Colorectal cancer is a type of cancer that affects the colon (large intestine) or rectum (end of the
                        colon).
                        It is one of the most common cancers worldwide but is highly treatable if detected early.
                    </p>

                    <h5 class="section-title mt-3">Who is at Risk?</h5>
                    <ul class="expertise-list">
                        <li>Age above 50 years</li>
                        <li>Family history of colorectal cancer or polyps</li>
                        <li>Inflammatory bowel disease (Crohn’s disease, ulcerative colitis)</li>
                        <li>Poor diet low in fiber and high in red/processed meat</li>
                        <li>Smoking, alcohol consumption, and sedentary lifestyle</li>
                        <li>Obesity</li>
                    </ul>

                    <h5 class="section-title mt-3">Symptoms</h5>
                    <ul class="expertise-list">
                        <li>Blood in stool (bright red or dark)</li>
                        <li>Changes in bowel habits (constipation, diarrhea, or narrow stools)</li>
                        <li>Abdominal pain, cramps, or bloating</li>
                        <li>Unexplained weight loss</li>
                        <li>Fatigue or anemia</li>
                        <li>Feeling of incomplete bowel emptying</li>
                    </ul>

                    <h5 class="section-title mt-3">Screening & Diagnosis</h5>
                    <ul class="expertise-list">
                        <li>Fecal occult blood test (FOBT)</li>
                        <li>Colonoscopy – gold standard for diagnosis</li>
                        <li>CT colonography</li>
                        <li>Biopsy for confirmation</li>
                    </ul>

                    <h5 class="section-title mt-3">Treatment Options</h5>
                    <ul class="expertise-list">
                        <li><strong>Surgery:</strong> Removal of cancerous tissue (colectomy or rectal resection)</li>
                        <li><strong>Chemotherapy:</strong> Systemic treatment to target cancer cells</li>
                        <li><strong>Radiation therapy:</strong> Often used for rectal cancer to shrink tumors before surgery
                        </li>
                        <li><strong>Targeted therapy & Immunotherapy:</strong> For advanced cases</li>
                    </ul>

                    <h5 class="section-title mt-3">Prevention & Lifestyle Advice</h5>
                    <ul class="expertise-list">
                        <li>Regular screening after age 50, or earlier if high-risk</li>
                        <li>High-fiber diet with fruits, vegetables, and whole grains</li>
                        <li>Limit red and processed meat</li>
                        <li>Maintain healthy weight and regular exercise</li>
                        <li>Avoid smoking and excessive alcohol</li>
                    </ul>

                    <p class="mt-3">
                        Early detection is crucial for successful treatment. If you notice any persistent symptoms
                        or have risk factors, consult a colorectal surgeon for evaluation and screening.
                    </p>

                </div>

                <!-- Right Column (Optional Image / Sidebar) -->
                {{-- <div class="col-lg-4 col-md-12 d-flex justify-content-center align-items-start mt-4 mt-lg-0"
                    data-aos="fade-left">
                    <div class="doctor-image">
                        <img src="{{ asset('uploads/images/welcome_page/conditions/colorectal_cancer.jpg') }}"
                            alt="Colorectal Cancer Image" class="img-fluid rounded shadow-sm">
                    </div>
                </div> --}}

            </div>
        </div>
    </section>

    @include('frontend.welcome_page.footer')

@endsection
