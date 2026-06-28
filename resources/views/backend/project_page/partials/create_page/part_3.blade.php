 <div class="col-md-12">
     <div class="card card-info card-outline">

         <div class="card-header">
             <h3 class="card-title">
                 <i class="fas fa-cogs"></i>
                 Project Details
             </h3>
         </div>

         <div class="card-body">

             <div class="row">

                 <div class="col-md-3">
                     <div class="form-group">

                         <label>Project Type</label>

                         <select name="project_type" class="form-control">

                             <option value="">Select</option>

                             <option value="Laravel">Laravel</option>
                             <option value="React">React</option>
                             <option value="Vue">Vue</option>
                             <option value="NodeJS">NodeJS</option>
                             <option value="PHP">PHP</option>
                             <option value="Python">Python</option>
                             <option value="Other">Other</option>

                         </select>

                     </div>
                 </div>

                 <div class="col-md-3">
                     <div class="form-group">

                         <label>Owner</label>

                         <input type="text" name="owner" class="form-control" value="{{ old('owner') }}">

                     </div>
                 </div>

                 <div class="col-md-3">

                     <div class="form-group">

                         <label>Visibility</label>

                         <select name="visibility" class="form-control">

                             <option value="Public">Public</option>
                             <option value="Private">Private</option>
                             <option value="Internal">Internal</option>

                         </select>

                     </div>

                 </div>

                 <div class="col-md-3">

                     <div class="form-group">

                         <label>Last Commit Date</label>

                         <input type="datetime-local" name="last_commit_date" class="form-control">

                     </div>

                 </div>

             </div>

             <div class="row">

                 <div class="col-md-12">

                     <div class="form-group">

                         <label>Last Commit</label>

                         <textarea name="last_commit" rows="3" class="form-control" placeholder="Latest commit message">{{ old('last_commit') }}</textarea>

                     </div>

                 </div>

             </div>

         </div>

     </div>
 </div>
