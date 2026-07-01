<div class="modal fade" id="hostingAccountModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">
                    <i class="fas fa-server mr-2"></i>
                    Add Hosting Account
                </h5>

                <button class="close text-white" data-bs-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form id="hostingAccountForm">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Account Name
                                </label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="DianaHost Production">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Hosting Provider
                                </label>

                                <select name="provider" class="form-control">
                                    <option>DianaHost</option>
                                    <option>Hostinger</option>
                                    <option>Namecheap</option>
                                    <option>DigitalOcean</option>
                                    <option>AWS</option>
                                    <option>Vultr</option>
                                    <option>Other</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>
                                    SSH Host
                                </label>
                                <input type="text" name="host" class="form-control"
                                    placeholder="server.example.com">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>
                                    Port
                                </label>
                                <input type="number" name="port" class="form-control" value="22">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    SSH Username
                                </label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Private Key Path
                                </label>
                                <input type="text" name="private_key_path" class="form-control"
                                    placeholder="storage/app/ssh/id_rsa">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>
                            Default Laravel Project Path
                        </label>
                        <input type="text" name="default_project_path" class="form-control"
                            placeholder="/home/username/public_html">
                    </div>

                    <div class="form-group">
                        <label>
                            Description
                        </label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" checked class="custom-control-input" id="hostingActive" name="is_active">
                        <label class="custom-control-label" for="hostingActive">
                            Active Account
                        </label>
                    </div>
                </div>
            </form>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save mr-1"></i>
                    Save Hosting Account
                </button>
            </div>

        </div>
    </div>
</div>
