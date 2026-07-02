<div class="card card-dark shadow mt-3">

    <div class="card-header">

        <div class="d-flex justify-content-between align-items-center">

            <h3 class="card-title">

                <i class="fas fa-terminal"></i>

                Working Terminal

            </h3>

            <div>

                <span class="badge badge-success">

                    <i class="fas fa-circle"></i>

                    Ready

                </span>

            </div>

        </div>

    </div>

    <div class="card-body p-0">

        {{-- Information Bar --}}

        <div class="bg-light border-bottom p-2">

            <div class="row text-sm">

                <div class="col-md-3">

                    <strong>Project</strong>

                    <div id="currentProject">

                        Not Selected

                    </div>

                </div>

                <div class="col-md-3">

                    <strong>Working Directory</strong>

                    <div id="workingDirectory">

                        -

                    </div>

                </div>

                <div class="col-md-3">

                    <strong>PHP Version</strong>

                    <div id="runningPHP">

                        -

                    </div>

                </div>

                <div class="col-md-3">

                    <strong>Node Version</strong>

                    <div id="runningNode">

                        -

                    </div>

                </div>

            </div>

        </div>

        {{-- Terminal Window --}}

        <div id="terminalWindow" class="terminal-window">

            Welcome to Laravel Terminal Manager

            Select a project to begin.

            ------------------------------------------------------------

            >

        </div>

        {{-- Command Input --}}

        <div class="p-3 bg-dark">

            <div class="input-group">

                <div class="input-group-prepend">

                    <span class="input-group-text bg-secondary">

                        >

                    </span>

                </div>

                <input type="text" class="form-control" id="terminalCommand"
                    placeholder="Type command here (shortcut commands only)">

                <div class="input-group-append">

                    <button class="btn btn-success" id="executeCommand">

                        <i class="fas fa-play"></i>

                        Execute

                    </button>

                    <button class="btn btn-danger" id="clearTerminal">

                        <i class="fas fa-trash"></i>

                    </button>

                </div>

            </div>

        </div>

        {{-- Footer --}}

        <div class="card-footer">

            <div class="row">

                <div class="col-md-4">

                    <strong>Status :</strong>

                    <span id="terminalStatus">

                        Waiting...

                    </span>

                </div>

                <div class="col-md-4">

                    <strong>Last Command :</strong>

                    <span id="lastCommand">

                        None

                    </span>

                </div>

                <div class="col-md-4">

                    <strong>Execution Time :</strong>

                    <span id="executionTime">

                        --

                    </span>

                </div>

            </div>

        </div>

    </div>

</div>
