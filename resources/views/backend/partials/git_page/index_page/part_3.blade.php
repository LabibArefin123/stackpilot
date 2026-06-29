 <div class="card card-outline card-danger" id="gitRepositoryContainer">
     <div class="card-header">
         <h3 class="card-title">
             <i class="fab fa-git-alt mr-2"></i>
             Git Repositories
         </h3>
     </div>

     <div class="card-body table-responsive">
         <table class="table table-hover table-striped" id="gitTable">
             <thead>
                 <tr>
                     <th width="50">#</th>
                     <th> Repository</th>
                     <th>Branch</th>
                     <th>Environment</th>
                     <th>Health </th>
                     <th>Repository</th>
                     <th width="150">Action</th>
                 </tr>
             </thead>

             <tbody>
                 @forelse($projects as $project)
                     <tr>
                         <td>
                             {{ $loop->iteration }}
                         </td>
                         <td>
                             <div>
                                 <strong>{{ $project->name }}</strong>
                             </div>
                             <small class="text-muted">{{ $project->domain ?? 'Local Development' }}</small>
                         </td>
                         <td>
                             @if ($project->git_branch)
                                 <span class="badge badge-info">
                                     <i class="fas fa-code-branch mr-1"></i>
                                     {{ $project->git_branch }}
                                 </span>
                             @else
                                 <span class="badge badge-secondary">
                                     Unknown
                                 </span>
                             @endif
                         </td>
                         <td>
                             @php
                                 $env = optional($project->environment)->environment;
                             @endphp

                             @switch($env)
                                 @case('production')
                                     <span class="badge badge-success">
                                         Production
                                     </span>
                                 @break

                                 @case('staging')
                                     <span class="badge badge-warning">
                                         Staging
                                     </span>
                                 @break

                                 @default
                                     <span class="badge badge-primary">
                                         Local
                                     </span>
                             @endswitch
                         </td>

                         <td>
                             @if ($project->is_active)
                                 <span class="badge badge-success">
                                     <i class="fas fa-check-circle mr-1"></i>
                                     Healthy
                                 </span>
                             @else
                                 <span class="badge badge-danger">
                                     Offline
                                 </span>
                             @endif
                         </td>

                         <td>
                             @if ($project->git_repository)
                                 <a href="{{ $project->git_repository }}" target="_blank">
                                     <i class="fab fa-github mr-1"></i>
                                     View Repository
                                 </a>
                             @else
                                 <span class="text-muted">
                                     Not Configured
                                 </span>
                             @endif
                         </td>

                         <td>
                             <a href="{{ route('gits.show', $project) }}" class="btn btn-sm btn-primary">
                                 <i class="fas fa-eye"></i>
                             </a>
                         </td>
                     </tr>

                     @empty
                         <tr>
                             <td colspan="8" class="text-center">
                                 <br>
                                 <i class="fab fa-git-alt fa-4x text-muted"></i>
                                 <br><br>
                                 <h5>
                                     No repositories found.
                                 </h5>

                                 <p class="text-muted">
                                     Add a project to begin monitoring Git repositories.
                                 </p>

                                 <br>
                             </td>
                         </tr>
                     @endforelse
                 </tbody>
             </table>
         </div>
     </div>
