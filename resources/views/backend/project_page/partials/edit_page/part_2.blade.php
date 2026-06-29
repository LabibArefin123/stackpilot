 <div class="card-body">
     <div class="row">

         <div class="form-group col-md-6">

             <label>Environment</label>

             <select name="environment" class="form-control">

                 <option value="production" @selected(old('environment', optional($project->environment)->environment) == 'production')>

                     Production

                 </option>

                 <option value="staging" @selected(old('environment', optional($project->environment)->environment) == 'staging')>

                     Staging

                 </option>

                 <option value="local" @selected(old('environment', optional($project->environment)->environment) == 'local')>

                     Local

                 </option>

             </select>

         </div>

         <div class="form-group col-md-6">

             <label>Hosting Provider</label>

             <input class="form-control" name="hosting_provider"
                 value="{{ old('hosting_provider', optional($project->environment)->hosting_provider) }}">

         </div>

         <div class="form-group col-md-6">

             <label>Project Path</label>

             <input class="form-control" name="project_path"
                 value="{{ old('project_path', optional($project->environment)->project_path) }}">

         </div>

         <div class="form-group col-md-6">

             <label>Public Path</label>

             <input class="form-control" name="public_path"
                 value="{{ old('public_path', optional($project->environment)->public_path) }}">

         </div>

     </div>
 </div>
