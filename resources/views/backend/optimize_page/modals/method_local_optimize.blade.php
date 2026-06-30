<div class="modal fade" id="localOptimizeModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">
                    <i class="fas fa-laptop mr-2"></i>
                    Local Laravel Optimization
                </h5>

                <button class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="alert alert-info">
                    <b>System Detection</b>
                    <hr>
                    <p>
                        <i class="fas fa-spinner fa-spin"></i>
                        Checking installed development environment...
                    </p>
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th width="220">Development Environment</th>
                        <td id="environmentResult">
                            Detecting...
                        </td>
                    </tr>

                    <tr>
                        <th>PHP Version</th>
                        <td id="phpVersionResult">
                            Detecting...
                        </td>
                    </tr>

                    <tr>
                        <th>PHP Executable</th>
                        <td id="phpExecutableResult">
                            Detecting...
                        </td>
                    </tr>

                    <tr>
                        <th>Laravel Path</th>
                        <td id="projectPathResult">
                            Detecting...
                        </td>
                    </tr>
                </table>

                <div class="form-group">
                    <label>Select PHP Version</label>
                    <select class="form-control" id="phpVersionSelect">
                        <option>
                            Detecting available PHP versions...
                        </option>
                    </select>
                </div>

                <div class="alert alert-warning">
                    Before optimization the application will verify:
                    <ul class="mb-0">
                        <li>Laragon installed</li>
                        <li>Laravel Herd installed</li>
                        <li>XAMPP/WAMP (optional)</li>
                        <li>PHP Version 8.2 or newer</li>
                        <li>artisan file exists</li>
                    </ul>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">
                    Cancel
                </button>

                <button class="btn btn-success" id="runLocalOptimize">
                    <i class="fas fa-play"></i>
                    Run Optimize
                </button>
            </div>
        </div>
    </div>
</div>
