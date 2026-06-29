 <div class="row">
     <div class="col-md-6">
         <div class="form-group">
             <label>
                 Select Project
             </label>

             <select name="project_id" id="project_id" class="form-control select2">
                 <option value="">
                     Select Project
                 </option>
                 @foreach ($projects as $project)
                     <option value="{{ $project->id }}">
                         {{ $project->name }}
                     </option>
                 @endforeach
             </select>
         </div>
     </div>

     <div class="col-md-3">
         <div class="form-group">
             <label>
                 Git Branch
             </label>
             <input type="text" class="form-control" value="main" readonly>
         </div>
     </div>

     <div class="col-md-3">
         <div class="form-group">
             <label>
                 Environment
             </label>
             <input type="text" class="form-control" value="Production" readonly>
         </div>
     </div>
 </div>
