 <div class="about-slider">
     <img src="{{ asset('uploads/images/login_page/logo.png') }}" class="hospital-logo" alt="Dr. Asif Almas Haque">

     {{-- SHORT PROFILE --}}
     <div class="about-content short" id="aboutShort">
         <h4 class="fw-bold mb-3">Dr. Asif Almas Haque</h4>

         <p class="mb-2">
             MBBS (SSMC), FCPS (Surgery), FCPS (Colorectal Surgery),
             FRCS (England, Glasgow, Edinburgh), FACS (USA), FASCRS (USA)
         </p>

         <p>
             Consultant Colorectal, Laparoscopic & Laser Surgeon dedicated to
             advanced surgical precision, compassionate care, and patient-centered treatment.
         </p>

         <button class="btn btn-outline-light rounded-pill mt-3" onclick="toggleAbout(true)">
             View Professional Profile
         </button>
     </div>

     {{-- FULL PROFILE --}}
     <div class="about-content full" id="aboutFull" style="display:none;">
         <h4 class="fw-bold mb-3">Professional Overview</h4>

         <p>
             Dr. Asif Almas Haque is a highly qualified colorectal surgeon with
             extensive national and international training. With years of experience
             in general and colorectal surgery, he specializes in laparoscopic,
             laser, and advanced pelvic procedures.
         </p>

         <h5 class="mt-3">Areas of Expertise</h5>
         <ul class="ps-3">
             <li>Colorectal Surgery</li>
             <li>Laparoscopic Surgery</li>
             <li>Laser Surgery</li>
             <li>Colorectal Cancer Surgery</li>
             <li>Advanced Pelvic Floor Procedures</li>
         </ul>

         <p class="mt-3">
             Known for his patient-first philosophy, Dr. Asif ensures that every
             patient clearly understands their diagnosis, treatment options,
             and recovery plan. He believes in multidisciplinary collaboration
             to provide the highest standard of surgical care.
         </p>

         <button class="btn btn-outline-light rounded-pill mt-3" onclick="toggleAbout(false)">
             Show Less
         </button>
     </div>
 </div>
