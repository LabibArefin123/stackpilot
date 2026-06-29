 <div class="col-md-6">
     <div class="card card-outline card-primary">
         <div class="card-header">
             <h3 class="card-title">
                 <i class="fas fa-server mr-2"></i>
                 Server Information
             </h3>
         </div>

         <div class="card-body table-responsive p-0">
             <table class="table table-striped">
                 <tr>
                     <th width="220">Hosting Provider</th>
                     <td>{{ $project->environment->hosting_provider ?? '-' }}</td>
                 </tr>
                 <tr>
                     <th>Server Name</th>
                     <td>{{ $project->environment->server_name ?? '-' }}</td>
                 </tr>
                 <tr>
                     <th>Server IP</th>
                     <td>{{ $project->environment->server_ip ?? '-' }}</td>
                 </tr>
                 <tr>
                     <th>Environment</th>
                     <td>
                         @php
                             $environment = $project->environment->environment ?? 'unknown';
                         @endphp

                         @switch($environment)
                             @case('production')
                                 <span class="badge badge-success">Production</span>
                             @break

                             @case('staging')
                                 <span class="badge badge-warning">Staging</span>
                             @break

                             @default
                                 <span class="badge badge-info">Local</span>
                         @endswitch
                     </td>
                 </tr>
             </table>
         </div>
     </div>
 </div>
