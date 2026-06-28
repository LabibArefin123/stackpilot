  <div class="card card-outline card-danger">

      <div class="card-header">

          <h3 class="card-title">

              <i class="fas fa-server"></i>

              Laravel Logs (from GitHub Account)

          </h3>

      </div>

      <div class="card-body">

          <table id="serverLogTable" class="table table-bordered table-striped table-hover">

              <thead>

                  <tr>

                      <th>#</th>

                      <th>Project</th>

                      <th>Level</th>

                      <th>Date</th>

                      <th>Message</th>

                      <th>Details</th>

                  </tr>

              </thead>

              <tbody>

                  @forelse($serverLogs as $log)
                      <tr>

                          <td>{{ $loop->iteration }}</td>

                          <td>{{ $log['project'] }}</td>

                          <td>

                              <span class="badge badge-danger">

                                  {{ $log['level'] }}

                              </span>

                          </td>

                          <td>{{ $log['date'] }}</td>

                          <td>
                              {{ $log['message'] }}
                          </td>

                          <td>

                              @if (!empty($log['details']))
                                  <button type="button" class="btn btn-xs btn-info view-log-details"
                                      data-project="{{ $log['project'] }}" data-level="{{ $log['level'] }}"
                                      data-date="{{ optional($log['date'])->format('Y-m-d H:i:s') }}"
                                      data-message="{{ $log['message'] }}" data-details="{{ e($log['details']) }}">
                                      <i class="fas fa-eye"></i> View
                                  </button>
                              @else
                                  -
                              @endif

                          </td>

                      </tr>

                  @empty

                      <tr>

                          <td colspan="6" class="text-center text-muted">

                              <i class="fas fa-check-circle fa-3x text-success mb-2"></i>

                              <br>

                              No Laravel logs found.

                          </td>

                      </tr>
                  @endforelse

              </tbody>

          </table>
          @include('backend.log_page.modals.view_modal')
      </div>

  </div>
