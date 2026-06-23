 <div class="about-slider">
     {{-- SHORT INFO --}}
     <div class="about-content short" id="aboutShort">

         <span class="badge bg-primary px-3 py-2 mb-3 rounded-pill">
             Laravel Development Toolkit
         </span>

         <h2 class="fw-bold mb-3">
             StackPilot
         </h2>

         <p class="mb-3">
             Monitor, diagnose and optimize Laravel applications from a single dashboard.
         </p>

         <p>
             Git deployment checks, Node.js verification, queue monitoring,
             cron management, logs analysis and system diagnostics.
         </p>

         <button class="btn btn-outline-light rounded-pill mt-3" onclick="toggleAbout(true)">
             View Platform Overview
         </button>

     </div>

     {{-- FULL INFO --}}
     <div class="about-content full" id="aboutFull" style="display:none;">

         <h3 class="fw-bold mb-3">
             Platform Overview
         </h3>

         <p>
             StackPilot is a Laravel-focused monitoring and administration platform
             designed to simplify server management, deployment verification and
             project diagnostics.
         </p>

         <h5 class="mt-4">
             Core Modules
         </h5>

         <ul class="ps-3">
             <li>Git Repository Monitoring</li>
             <li>Laravel Optimization Checks</li>
             <li>Queue & Worker Monitoring</li>
             <li>Node.js Environment Verification</li>
             <li>Error & Log Analysis</li>
             <li>Cron Job Management</li>
             <li>Server Diagnostics</li>
             <li>Role & Permission Control</li>
         </ul>

         <p class="mt-3">
             Built for developers and administrators who need complete visibility
             into their Laravel applications without jumping between multiple tools.
         </p>

         <button class="btn btn-outline-light rounded-pill mt-3" onclick="toggleAbout(false)">
             Show Less
         </button>

     </div> 
 </div>
