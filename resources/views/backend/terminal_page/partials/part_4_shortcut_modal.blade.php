<div class="modal fade" id="shortcutModal" tabindex="-1">

    <div class="modal-dialog modal-xl">

        <div class="modal-content">

            <div class="modal-header bg-success">

                <h4 class="modal-title">

                    <i class="fas fa-bolt"></i>

                    Quick Terminal Commands

                </h4>

                <button class="close" data-dismiss="modal">

                    ×

                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    {{-- Laravel --}}

                    <div class="col-md-3">

                        <div class="card card-primary">

                            <div class="card-header">

                                Laravel

                            </div>

                            <div class="card-body">

                                <button class="btn btn-block btn-primary shortcut" data-command="artisan_optimize">

                                    Optimize

                                </button>

                                <button class="btn btn-block btn-primary shortcut"
                                    data-command="artisan_optimize_clear">

                                    Optimize Clear

                                </button>

                                <button class="btn btn-block btn-primary shortcut" data-command="artisan_migrate">

                                    Migrate

                                </button>

                                <button class="btn btn-block btn-primary shortcut" data-command="artisan_seed">

                                    Seed

                                </button>

                                <button class="btn btn-block btn-primary shortcut" data-command="artisan_storage">

                                    Storage Link

                                </button>

                                <button class="btn btn-block btn-primary shortcut" data-command="artisan_route_cache">

                                    Route Cache

                                </button>

                                <button class="btn btn-block btn-primary shortcut" data-command="artisan_config_cache">

                                    Config Cache

                                </button>

                                <button class="btn btn-block btn-primary shortcut" data-command="artisan_view_cache">

                                    View Cache

                                </button>

                            </div>

                        </div>

                    </div>

                    {{-- Composer --}}

                    <div class="col-md-3">

                        <div class="card card-success">

                            <div class="card-header">

                                Composer

                            </div>

                            <div class="card-body">

                                <button class="btn btn-block btn-success shortcut" data-command="composer_install">

                                    Composer Install

                                </button>

                                <button class="btn btn-block btn-success shortcut" data-command="composer_update">

                                    Composer Update

                                </button>

                                <button class="btn btn-block btn-success shortcut" data-command="composer_dump">

                                    Dump Autoload

                                </button>

                            </div>

                        </div>

                    </div>

                    {{-- NodeJS --}}

                    <div class="col-md-3">

                        <div class="card card-warning">

                            <div class="card-header">

                                NodeJS

                            </div>

                            <div class="card-body">

                                <button class="btn btn-block btn-warning shortcut" data-command="npm_install">

                                    npm install

                                </button>

                                <button class="btn btn-block btn-warning shortcut" data-command="npm_update">

                                    npm update

                                </button>

                                <button class="btn btn-block btn-warning shortcut" data-command="npm_dev">

                                    npm run dev

                                </button>

                                <button class="btn btn-block btn-warning shortcut" data-command="npm_build">

                                    npm run build

                                </button>

                            </div>

                        </div>

                    </div>

                    {{-- Git --}}

                    <div class="col-md-3">

                        <div class="card card-danger">

                            <div class="card-header">

                                Git

                            </div>

                            <div class="card-body">

                                <button class="btn btn-block btn-danger shortcut" data-command="git_status">

                                    Git Status

                                </button>

                                <button class="btn btn-block btn-danger shortcut" data-command="git_pull">

                                    Git Pull

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button class="btn btn-secondary" data-dismiss="modal">

                    Close

                </button>

            </div>

        </div>

    </div>

</div>
