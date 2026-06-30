  <div class="row">
      <div class="col-lg-3">
          <div class="info-box bg-gradient-success">
              <span class="info-box-icon">
                  <i class="fas fa-code-branch"></i>
              </span>

              <div class="info-box-content">
                  <span class="info-box-text">Current Branch</span>
                  <span class="info-box-number">{{ $git['branch'] }}</span>
              </div>
          </div>
      </div>

      <div class="col-lg-3">
          <div class="info-box bg-gradient-info">
              <span class="info-box-icon">
                  <i class="fas fa-code"></i>
              </span>

              <div class="info-box-content">
                  <span class="info-box-text">Commits</span>
                  <span class="info-box-number">{{ $git['commit_count'] }}</span>
              </div>
          </div>
      </div>

      <div class="col-lg-3">
          <div class="info-box bg-gradient-warning">
              <span class="info-box-icon">
                  <i class="fas fa-users"></i>
              </span>

              <div class="info-box-content">
                  <span class="info-box-text">Contributors</span>
                  <span class="info-box-number">
                      {{ $git['total_contributors'] }}
                  </span>
              </div>
          </div>
      </div>

      <div class="col-lg-3">
          <div class="info-box bg-gradient-danger">
              <span class="info-box-icon">
                  <i class="fab fa-github"></i>
              </span>

              <div class="info-box-content">
                  <span class="info-box-text">Repository</span>
                  <span class="info-box-number">
                      @if ($git['repository'])
                          Ready
                      @else
                          Missing
                      @endif
                  </span>
              </div>
          </div>
      </div>
  </div>
