  <div class="col-lg-5">
      <div class="card card-outline card-primary">
          <div class="card-header">
              <h5 class="mb-0">
                  <i class="fas fa-cloud mr-2"></i>
                  Hosting Connection
              </h5>
          </div>

          <div class="card-body">
              <div class="form-group">
                  <label>
                      Hosting Account
                  </label>

                  <select class="form-control" id="hostingAccountSelect">
                      <option value="">
                          Select Hosting Account
                      </option>
                      @foreach ($hostingAccounts as $hosting)
                          <option value="{{ $hosting->id }}">

                              {{ $hosting->name }}
                              ({{ $hosting->provider }})
                          </option>
                      @endforeach
                  </select>
              </div>

              <button class="btn btn-primary btn-block mt-3" id="checkLiveServer">
                  <i class="fas fa-search mr-2"></i>
                  Check Live Server
              </button>
          </div>
      </div>

      <!-- Checklist -->
      <div class="card card-outline card-warning">
          <div class="card-header">
              <h5 class="mb-0">
                  <i class="fas fa-check-circle mr-2"></i>
                  Verification Checklist
              </h5>
          </div>

          <div class="card-body">
              <ul class="list-unstyled mb-0">
                  <li class="mb-2">
                      <i class="fas fa-globe text-success mr-2"></i>
                      Domain Exists
                  </li>

                  <li class="mb-2">
                      <i class="fas fa-user-shield text-success mr-2"></i>
                      Hosting Account Found
                  </li>

                  <li class="mb-2">
                      <i class="fab fa-laravel text-danger mr-2"></i>
                      Laravel Installation
                  </li>

                  <li class="mb-2">
                      <i class="fab fa-php text-primary mr-2"></i>
                      PHP 8.2+

                  </li>

                  <li>
                      <i class="fas fa-terminal text-warning mr-2"></i>
                      SSH / API Access
                  </li>
              </ul>
          </div>
      </div>
  </div>
