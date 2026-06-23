<link rel="stylesheet" href="{{ asset('css/frontend/banner/banner.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/banner/banner-content.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/banner/banner-slider.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/banner/banner-image.css') }}">
<link rel="stylesheet" href="{{ asset('css/frontend/banner/banner-responsive.css') }}">
<section id="banner" class="banner-section w-100">

    <div id="slider" class="position-relative w-100" style="height:70vh;">
        @php
            $slides = [
                [
                    'image' => 'image_2.png',
                    'align' => 'left',
                    'name' => 'Dr. Asif Almas Haque',
                    'designation' => 'MBBS (SSMC), MRCS (ENG)',
                    'details' => 'FCPS (Surgery), FCPS (Colorectal Surgery), FRCS (ENG)<br>
                        Fellow of American College of Surgeons (FACS)<br>
                        Fellow of American Society of Colon & Rectal Surgeons (FASCRS)',
                    'route' => route('about'),
                ],
            ];
        @endphp

        {{-- Slides --}}
        @foreach ($slides as $index => $slide)
            <div class="slide {{ $index === 0 ? 'active' : '' }}" data-route="{{ $slide['route'] }}"
                style="position:absolute; inset:0;">

                <div class="doctor-slide h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">

                            {{-- Image (Left) --}}
                            @if ($slide['align'] === 'left')
                                <div class="col-md-6 h-100 position-relative order-0">
                                    <a href="{{ $slide['route'] }}" class="doctor-image-link">
                                        <img src="{{ asset('uploads/images/welcome_page/slider/' . $slide['image']) }}"
                                            class="doctor-img left" alt="{{ $slide['name'] }}">
                                    </a>
                                </div>
                            @endif


                            {{-- Text Content --}}
                            <div class="col-md-6 hero-content z-2">
                                <h2 class="fw-bold display-6 mb-2">{{ $slide['name'] }}</h2>
                                <p class="fs-5 mb-2">{{ $slide['designation'] }}</p>
                                <p class="lh-lg opacity-90">{!! $slide['details'] !!}</p>
                            </div>

                            {{-- Image (Right) --}}
                            @if ($slide['align'] === 'right')
                                <div class="col-md-6 h-100 position-relative">
                                    <a href="{{ $slide['route'] }}" class="doctor-image-link">
                                        <img src="{{ asset('uploads/images/welcome_page/slider/' . $slide['image']) }}"
                                            class="doctor-img right" alt="{{ $slide['name'] }}">
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<script>
    let currentIndex = 0;

    const slides = document.querySelectorAll('#slider .slide');

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
        });

        currentIndex = index;
    }

    function nextSlide() {
        showSlide((currentIndex + 1) % slides.length);
    }

    function prevSlide() {
        showSlide((currentIndex - 1 + slides.length) % slides.length);
    }

    function goToSlide(index) {
        showSlide(index);
    }

    if (slides.length > 0) {
        setInterval(nextSlide, 15000);
        showSlide(0);
    }
</script>
