 <div class="col-md-5">
     <div class="card card-outline card-success">
         <div class="card-header">
             <h3 class="card-title">Health Score</h3>
         </div>

         <div class="card-body">
             <h1 class="text-center">{{ optional($project->health)->health_score ?? 0 }}%</h1>

             <div class="progress">
                 <div class="progress-bar bg-success" style="width:{{ optional($project->health)->health_score ?? 0 }}%">
                 </div>
             </div>

             <hr>

             <table class="table table-borderless">
                 <tr>
                     <td>Git</td>
                     <td class="text-right">
                         @if (optional($project->health)->git_ok)
                             <span class="badge badge-success">
                                 OK
                             </span>
                         @else
                             <span class="badge badge-danger">
                                 Failed
                             </span>
                         @endif
                     </td>
                 </tr>

                 <tr>
                     <td>Composer</td>
                     <td class="text-right">
                         @if (optional($project->health)->composer_ok)
                             <span class="badge badge-success">OK</span>
                         @else
                             <span class="badge badge-danger">Failed</span>
                         @endif
                     </td>
                 </tr>

                 <tr>
                     <td>Node</td>
                     <td class="text-right">
                         @if (optional($project->health)->node_ok)
                             <span class="badge badge-success">OK</span>
                         @else
                             <span class="badge badge-danger">Failed</span>
                         @endif
                     </td>
                 </tr>

                 <tr>
                     <td>Queue</td>
                     <td class="text-right">
                         @if (optional($project->health)->queue_ok)
                             <span class="badge badge-success">OK</span>
                         @else
                             <span class="badge badge-danger">Failed</span>
                         @endif
                     </td>
                 </tr>

                 <tr>
                     <td>Scheduler</td>
                     <td class="text-right">
                         @if (optional($project->health)->cron_ok)
                             <span class="badge badge-success">OK</span>
                         @else
                             <span class="badge badge-danger">Failed</span>
                         @endif
                     </td>
                 </tr>
             </table>
         </div>
     </div>
 </div>
