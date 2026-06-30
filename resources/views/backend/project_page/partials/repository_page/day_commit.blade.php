     @foreach ($day['commits'] as $commit)
         <div class="card commit-card repository-card mb-3">
             <div class="card-header">
                 <div class="commit-header">
                     <div class="commit-info">
                         <h5 class="commit-title">{{ $commit['message'] }}</h5>

                         <div class="commit-meta">
                             <i class="fas fa-user"></i>
                             {{ $commit['author'] }}
                             <span class="commit-dot mx-2">•</span>
                             <i class="far fa-clock"></i>
                             {{ $commit['date'] }}
                         </div>
                     </div>

                     <div class="commit-right">
                         <span class="commit-hash">{{ $commit['short_hash'] }}</span>
                         <span class="commit-added">+{{ $commit['added'] }}</span>
                         <span class="commit-deleted">-{{ $commit['deleted'] }}</span>
                     </div>
                 </div>
             </div>

             <div class="card-body p-0">
                 <div class="table-responsive">
                     <table class="table commit-table">
                         <thead>
                             <tr>
                                 <th>File</th>
                                 <th width="110" class="text-center">
                                     Added
                                 </th>
                                 <th width="110" class="text-center">
                                     Deleted
                                 </th>
                             </tr>
                         </thead>

                         <tbody>
                             @foreach ($commit['files'] as $file)
                                 <tr>
                                     <td class="repository-file">
                                         <i class="far fa-file-code text-primary mr-2"></i>
                                         {{ $file['file'] }}
                                     </td>

                                     <td class="text-center text-success">
                                         +{{ $file['added'] }}
                                     </td>

                                     <td class="text-center text-danger">
                                         -{{ $file['deleted'] }}
                                     </td>
                                 </tr>
                             @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     @endforeach
