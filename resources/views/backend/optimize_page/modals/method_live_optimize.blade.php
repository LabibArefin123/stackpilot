<div class="modal fade" id="serverOptimizeModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">
                    <i class="fas fa-server mr-2"></i>
                    Live Server Optimization
                </h5>

                <div class="ml-auto d-flex align-items-center">
                    <button type="button" class="btn btn-sm btn-primary mr-3" id="openHostingAccountModal">
                        <i class="fas fa-plus-circle mr-1"></i>
                        Add Hosting Account
                    </button>

                    <button type="button" class="close text-white" data-bs-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
            </div>

            <div class="modal-body">
                <div class="alert alert-info">
                    The system will first verify whether this domain
                    belongs to one of your hosting providers.
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th width="220">
                            Project Domain
                        </th>

                        <td id="liveDomain">
                            --
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Hosting Provider
                        </th>

                        <td id="hostingProvider">
                            Checking...
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Hosting Account
                        </th>

                        <td id="hostingAccount">
                            Checking...
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Server Status
                        </th>

                        <td id="serverStatus">
                            Checking...
                        </td>
                    </tr>

                    <tr>
                        <th>
                            PHP Version
                        </th>

                        <td id="serverPhpVersion">
                            Checking...
                        </td>
                    </tr>
                </table>

                <div class="alert alert-warning">
                    Before running optimization, the system will verify:
                    <ul class="mb-0">
                        <li>Domain exists</li>
                        <li>Hosting account found</li>
                        <li>Laravel installation detected</li>
                        <li>PHP 8.2+</li>
                        <li>SSH/API access available</li>
                    </ul>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>

                <button class="btn btn-success" id="runServerOptimize">
                    <i class="fas fa-bolt"></i>
                    Optimize Server
                </button>
            </div>
        </div>
    </div>
</div>
