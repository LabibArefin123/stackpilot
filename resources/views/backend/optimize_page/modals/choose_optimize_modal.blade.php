<div class="modal fade" id="optimizeMethodModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title">
                    <i class="fas fa-bolt mr-2"></i>
                    Optimize Project
                </h5>

                <button class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body text-center">
                <h5 class="mb-4">
                    Where do you want to optimize this Laravel project?
                </h5>
                <input type="hidden" id="selectedProject">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <button type="button" class="btn btn-primary btn-block p-4" id="openLocalOptimize">
                            <i class="fas fa-laptop fa-3x mb-3"></i>

                            <h5>Optimize Locally</h5>

                            <small>
                                Run Artisan Optimize on your computer
                            </small>
                        </button>
                    </div>

                    <div class="col-md-6">
                        <button type="button" class="btn btn-warning btn-block p-4" id="openServerOptimize">
                            <i class="fas fa-server fa-3x mb-3"></i>
                            <h5>Optimize Live Server</h5>

                            <small>
                                Optimize project hosted online
                            </small>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
