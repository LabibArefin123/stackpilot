<div class="modal fade" id="repositoryFileModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white">
                    <i class="far fa-file-code mr-2"></i>
                    Full Source Code
                </h5>

                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body p-0">
                <div class="border-bottom p-3 bg-light">
                    <style>
                        .repository-highlight-search {
                            background: #ffe066;
                            color: #000;
                            padding: 1px 2px;
                            border-radius: 2px;
                        }
                    </style>
                    <div class="row">
                        <div class="col-md-8">
                            <strong>File</strong>
                            <div id="repositoryFileName" class="text-muted mt-1"></div>
                        </div>

                        <div class="col-md-4 text-right">
                            <strong>Commit</strong>
                            <div id="repositoryFileHash" class="text-muted mt-1"></div>
                        </div>
                    </div>
                </div>

                <div class="border-bottom p-3 bg-white">
                    <label class="font-weight-bold mb-2">
                        Search Inside Code
                    </label>
                    <input type="text" class="form-control repository-code-search" id="repositoryFileSearch"
                        data-target="#repositoryFileContent" placeholder="Search code...">
                </div>

                <pre id="repositoryFileContent" class="repository-code-view m-0 p-3">
Loading...
                </pre>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary repository-copy"
                    data-target="#repositoryFileContent">
                    <i class="far fa-copy mr-1"></i>
                    Copy Code
                </button>

                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times mr-1"></i>
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
