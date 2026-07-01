<div class="modal fade" id="terminalModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content shadow-lg">
            {{-- Header --}}
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">
                    <i class="fas fa-terminal mr-2"></i>

                    <span id="terminalProjectName">
                        Laravel Project
                    </span>
                </h5>

                <button type="button" class="close text-white" data-bs-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            {{-- Body --}}
            <div class="modal-body">
                @include('backend.optimize_page.modals.partials.terminal_modal.part_1')

                <div class="row">
                    {{-- LEFT TERMINAL --}}
                    @include('backend.optimize_page.modals.partials.terminal_modal.part_2_a')
                    {{-- RIGHT COMMANDS --}}
                    @include('backend.optimize_page.modals.partials.terminal_modal.part_2_b')
                  
                </div>
            </div>

            {{-- Footer --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
