 <div class="col-md-6">
     <div class="card card-outline card-info">
         <div class="card-header">
             <h3 class="card-title">
                 <i class="fas fa-folder-open mr-2"></i>
                 Project Paths
             </h3>
         </div>

         <div class="card-body table-responsive p-0">
             <table class="table table-striped">
                 <tr>
                     <th width="220">Project Path</th>
                     <td><code>{{ $project->environment->project_path ?? '-' }}</code></td>
                 </tr>

                 <tr>
                     <th>Public Path</th>
                     <td><code>{{ $project->environment->public_path ?? '-' }}</code></td>
                 </tr>

                 <tr>
                     <th>Last Checked</th>
                     <td>{{ optional($project->environment->last_checked_at)->diffForHumans() }}</td>
                 </tr>
             </table>
         </div>
     </div>
 </div>
