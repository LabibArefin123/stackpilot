<div class="card card-success shadow">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-server"></i>
            Step 2 : Live Server
        </h3>
    </div>

    <div class="card-body">
          {{-- Project --}}
          @include('backend.terminal_page.partials.part_2_live.part_1')
          <hr>
          {{-- Live Card Stat --}}
          @include('backend.terminal_page.partials.part_2_live.part_2')
        <hr>

        <div class="text-center">
            <button class="btn btn-success">
                <i class="fas fa-plug"></i>
                Connect
            </button>

            <button class="btn btn-info">
                <i class="fas fa-heartbeat"></i>
                Server Status
            </button>

            <button class="btn btn-warning">
                <i class="fas fa-sync"></i>
                Refresh
            </button>
        </div>
    </div>
</div>
