 <div class="col-lg-7">
     <div class="card card-outline card-success">
         <div class="card-header">
             <h5 class="mb-0">
                 <i class="fas fa-desktop mr-2"></i>
                 Server Information
             </h5>
         </div>

         <div class="card-body p-0">
             <table class="table table-hover mb-0">
                 <tbody>

                     <tr>
                         <th width="220">
                             <i class="fas fa-globe mr-2 text-primary"></i>
                             Project Domain
                         </th>

                         <td id="liveDomain">
                             <span class="badge badge-secondary">
                                 --
                             </span>
                         </td>
                     </tr>

                     <tr>
                         <th>
                             <i class="fas fa-building mr-2 text-info"></i>
                             Hosting Provider
                         </th>

                         <td id="hostingProvider">
                             Waiting...
                         </td>
                     </tr>

                     <tr>
                         <th>
                             <i class="fas fa-user-circle mr-2 text-success"></i>
                             Hosting Account
                         </th>

                         <td id="hostingAccount">
                             Waiting...
                         </td>
                     </tr>

                     <tr>
                         <th>
                             <i class="fas fa-server mr-2 text-secondary"></i>
                             Server Hostname
                         </th>

                         <td id="serverHostname">
                             Waiting...
                         </td>
                     </tr>

                     <tr>
                         <th>
                             <i class="fas fa-heartbeat mr-2 text-danger"></i>
                             Server Status
                         </th>

                         <td id="serverStatus">
                             Checking...
                         </td>
                     </tr>

                     <tr>
                         <th>
                             <i class="fab fa-php mr-2 text-primary"></i>
                             PHP Version
                         </th>

                         <td id="serverPhpVersion">
                             Checking...
                         </td>
                     </tr>

                     <tr>
                         <th>
                             <i class="fas fa-terminal mr-2 text-warning"></i>
                             PHP Binary
                         </th>

                         <td id="serverPhpBinary">
                             Checking...
                         </td>
                     </tr>

                 </tbody>
             </table>
         </div>
     </div>

     <!-- Progress -->
     <div class="card">
         <div class="card-body">
             <div class="d-flex justify-content-between mb-2">
                 <strong>
                     Optimization Readiness
                 </strong>
                 <span id="serverReadyText">
                     Waiting...
                 </span>
             </div>

             <div class="progress" style="height:18px;">
                 <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                     id="serverReadyProgress" style="width:0%;">
                     0%
                 </div>
             </div>
         </div>
     </div>
 </div>
