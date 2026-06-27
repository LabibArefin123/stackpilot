  <div class="card card-outline card-primary">

      <div class="card-header">

          <h3 class="card-title">

              <i class="fas fa-filter mr-2"></i>

              Repository Filters

          </h3>

      </div>

      <div class="card-body">

          <div class="row">

              <div class="col-md-4">

                  <div class="form-group">

                      <label>

                          Search Repository

                      </label>

                      <input type="text" id="repositorySearch" class="form-control"
                          placeholder="Search by project name...">

                  </div>

              </div>

              <div class="col-md-3">

                  <div class="form-group">

                      <label>

                          Status

                      </label>

                      <select class="form-control">

                          <option>

                              All

                          </option>

                          <option>

                              Healthy

                          </option>

                          <option>

                              Inactive

                          </option>

                      </select>

                  </div>

              </div>

              <div class="col-md-3">

                  <div class="form-group">

                      <label>

                          Branch

                      </label>

                      <select class="form-control">

                          <option>

                              All Branches

                          </option>

                          @foreach ($projects->pluck('git_branch')->unique() as $branch)
                              <option>

                                  {{ $branch }}

                              </option>
                          @endforeach

                      </select>

                  </div>

              </div>

              <div class="col-md-2 d-flex align-items-end">

                  <button class="btn btn-primary btn-block">

                      <i class="fas fa-search mr-1"></i>

                      Search

                  </button>

              </div>

          </div>

      </div>

  </div>
