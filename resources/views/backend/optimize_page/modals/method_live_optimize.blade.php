<!-- Live Server Optimization Modal -->
<div class="modal fade" id="serverOptimizeModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content shadow-lg border-0">
            <!-- Header -->
            @include('backend.optimize_page.modals.partials.part_1')
            <!-- Body -->
            <div class="modal-body">
                <!-- Information -->
                <div class="alert alert-info shadow-sm">
                    <i class="fas fa-info-circle mr-2"></i>
                    The system will verify the selected hosting account,
                    detect the Laravel installation, check the PHP version,
                    and confirm SSH/API access before optimization.
                </div>

                <div class="row">
                    <!-- LEFT SIDE -->
                   @include('backend.optimize_page.modals.partials.part_2_a')
                   <!-- RIGHT SIDE -->
                   @include('backend.optimize_page.modals.partials.part_2_b')
                </div>
            </div>

            <!-- Footer -->
            <div class="modal-footer justify-content-between">
                <button class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>
                    Close
                </button>

                <button class="btn btn-success btn-lg" id="runServerOptimize">
                    <i class="fas fa-bolt mr-2"></i>
                    Optimize Laravel Server
                </button>
            </div>
        </div>
    </div>
</div>
