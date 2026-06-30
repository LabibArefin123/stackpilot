 <div class="col-md-12">

     <div class="card card-outline card-secondary">

         <div class="card-header">

             <h3 class="card-title">

                 Remote Information

             </h3>

         </div>

         <div class="card-body table-responsive p-0">

             <table class="table table-striped">

                 <tr>

                     <th width="180">

                         Fetch URL

                     </th>

                     <td>

                         <code>

                             {{ $git['fetch_url'] }}

                         </code>

                     </td>

                 </tr>

                 <tr>

                     <th>

                         Push URL

                     </th>

                     <td>

                         <code>

                             {{ $git['push_url'] }}

                         </code>

                     </td>

                 </tr>

                 <tr>

                     <th>

                         Repository Path

                     </th>

                     <td>

                         <code>

                             {{-- {{ $project->environment->project_path }} --}}

                         </code>

                     </td>

                 </tr>

                 <tr>

                     <th>

                         Environment

                     </th>

                     <td>

                         {{-- {{ $project->environment->environment }} --}}

                     </td>

                 </tr>

             </table>

         </div>

     </div>

 </div>
