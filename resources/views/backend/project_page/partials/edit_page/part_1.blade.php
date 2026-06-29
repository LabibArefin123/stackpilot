 <div class="card-body">
     <div class="row">

         <div class="form-group col-md-6">

             <label>Project Name <span class="text-danger">*</span></label>

             <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                 value="{{ old('name', $project->name ?? '') }}" placeholder="TechnoTech Engineering Ltd">

             @error('name')
                 <small class="text-danger">{{ $message }}</small>
             @enderror

         </div>

         <div class="form-group col-md-6">

             <label>Primary Domain</label>

             <input type="text" name="domain" class="form-control"
                 value="{{ old('domain', $project->domain ?? '') }}" placeholder="technotech.labib.work">

         </div>

         <div class="form-group col-md-6">

             <label>Git Repository</label>

             <input type="text" name="git_repository" class="form-control"
                 value="{{ old('git_repository', $project->git_repository ?? '') }}">

         </div>

         <div class="form-group col-md-6">

             <label>Git Branch</label>

             <input type="text" name="git_branch" class="form-control"
                 value="{{ old('git_branch', $project->git_branch ?? 'main') }}">

         </div>

     </div>
 </div>
