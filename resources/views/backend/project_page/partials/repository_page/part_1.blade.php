   <div class="card shadow-sm border-0 repository-toolbar mb-4">
       <div class="card-header bg-white border-bottom">
           <div class="d-flex justify-content-between align-items-center">
               <h5 class="mb-0">
                   <i class="fas fa-filter text-primary mr-2"></i>
                   Repository Filters
               </h5>

               <button class="btn btn-outline-secondary btn-sm btn-scroll-top">
                   <i class="fas fa-arrow-up mr-1"></i>
                   Top
               </button>
           </div>
       </div>

       <div class="card-body">
           <div class="row">

               {{-- Search --}}
               <div class="col-lg-4 col-md-6 mb-3">
                   <label for="repository-search" class="font-weight-bold text-muted">
                       <i class="fas fa-search mr-1 text-primary"></i>
                       Search Repository
                   </label>

                   <input id="repository-search" type="text" class="form-control"
                       placeholder="Commit message, author, hash...">
               </div>

               {{-- Author --}}
               <div class="col-lg-3 col-md-6 mb-3">
                   <label for="repository-author" class="font-weight-bold text-muted">
                       <i class="fas fa-user mr-1 text-success"></i>
                       Author
                   </label>

                   <select id="repository-author" class="form-control">
                       <option value="">All Authors</option>

                       @foreach ($authors as $author)
                           <option value="{{ $author }}">
                               {{ $author }}
                           </option>
                       @endforeach
                   </select>
               </div>

               {{-- Date --}}
               <div class="col-lg-3 col-md-6 mb-3">
                   <label for="repository-date" class="font-weight-bold text-muted">
                       <i class="far fa-calendar-alt mr-1 text-warning"></i>
                       Commit Date
                   </label>

                   <input type="date" id="repository-date" class="form-control">
               </div>

               {{-- Actions --}}
               <div class="col-lg-2 col-md-6 mb-3 d-flex align-items-end justify-content-end">

                   <button class="btn btn-outline-dark btn-scroll-top mr-2">
                       <i class="fas fa-arrow-up mr-1"></i>
                       Top
                   </button>

                   <button type="button" class="btn btn-outline-secondary" id="repository-clear">
                       <i class="fas fa-times mr-1"></i>
                       Clear
                   </button>

               </div>

           </div>
       </div>
   </div>
