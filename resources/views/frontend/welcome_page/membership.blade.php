<!-- Membership Section -->
<section id="membership" class="bg-light py-5 w-100">
    <link rel="stylesheet" href="{{ asset('css/frontend/custom_membership.css') }}">

    <div class="container">
        <div class="row mb-4">
            <div class="col text-center">
                <h2 class="">PROFESSIONAL MEMBERSHIP</h2>
                <p class="small text-muted">Driving technology and excellence in colorectal surgery</p>
            </div>
        </div>

        <div class="membership-grid">
            @php
                $memberships = [
                    [
                        'name' => 'Society of Surgeons of Bangladesh',
                        'image' => asset('uploads/images/welcome_page/membership/image_1.png'),
                        'link' => 'https://www.sosb-bd.org/',
                    ],
                    [
                        'name' => 'Society of Endo-Laparoscopic Surgeons of Bangladesh (SELSB)',
                        'image' => asset('uploads/images/welcome_page/membership/image_2.jpg'),
                        'link' => 'https://selsb-bd.org/',
                    ],
                    [
                        'name' => 'The Royal College of Surgeons of Edinburgh',
                        'image' => asset('uploads/images/welcome_page/membership/image_3.png'),
                        'link' => 'https://www.rcsed.ac.uk/',
                    ],
                    [
                        'name' => 'The Association of Coloproctology of Great Britain & Ireland',
                        'image' => asset('uploads/images/welcome_page/membership/image_4.png'),
                        'link' => 'https://www.acpgbi.org.uk/',
                    ],
                    [
                        'name' => 'The Royal College of Physicians and Surgeons of Glasgow',
                        'image' => asset('uploads/images/welcome_page/membership/image_5.JPG'),
                        'link' => 'https://rcpsg.ac.uk/',
                    ],
                    [
                        'name' => 'American Society of Colon and Rectal Surgeons (ASCRS)',
                        'image' => asset('uploads/images/welcome_page/membership/image_6.png'),
                        'link' => 'https://fascrs.org/',
                    ],
                    [
                        'name' => 'American College of Surgeons',
                        'image' => asset('uploads/images/welcome_page/membership/image_7.JPG'),
                        'link' => 'https://www.facs.org/',
                    ],
                    [
                        'name' => 'The Endoscopic and Laparoscopic Surgeons of Asia (ELSA)',
                        'image' => asset('uploads/images/welcome_page/membership/image_8.jpg'),
                        'link' => 'https://elsasociety.org/',
                    ],
                    [
                        'name' => 'Colon and Rectal Surgeons of Bangladesh',
                        'image' => asset('uploads/images/welcome_page/membership/image_9.JPG'),
                        'link' => 'https://www.facebook.com/bscrsbd/',
                    ],
                ];

                $defaultImage = asset('uploads/images/frontend/default_membership.png');
            @endphp

            @foreach ($memberships as $membership)
                <div class="membership-item">
                    <a href="{{ $membership['link'] }}" target="_blank" class="text-decoration-none">

                        <div class="membership-card text-center">
                            <img src="{{ $membership['image'] ?? $defaultImage }}" alt="{{ $membership['name'] }}"
                                class="membership-img">

                            <p class="mb-0 fw-semibold small text-dark">{{ $membership['name'] }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- JS hover effect -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.membership-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', () => card.classList.add('shadow-lg'));
            card.addEventListener('mouseleave', () => card.classList.remove('shadow-lg'));
        });
    });
</script>
