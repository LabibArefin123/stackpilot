<div class="card terminal-card shadow-lg mt-3 border-0">

    {{-- Header --}}
    <div class="card-header terminal-card-header">

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">

            <div class="d-flex align-items-center">
                <div class="terminal-header-icon mr-3">
                    <i class="fas fa-terminal"></i>
                </div>

                <div>
                    <h3 class="card-title mb-0 font-weight-bold text-white">
                        Working Terminal
                    </h3>

                    <small class="terminal-subtitle">
                        Execute project commands, monitor environment, and manage shortcuts
                    </small>
                </div>
            </div>

            <div class="d-flex align-items-center flex-wrap gap-2">

                <span class="terminal-status-badge" id="terminalReadyBadge">
                    <i class="fas fa-circle"></i>
                    Ready
                </span>

                <button class="btn terminal-shortcut-btn" id="openShortcutModal">
                    <i class="fas fa-bolt mr-1"></i>
                    Quick Commands
                </button>
            </div>

        </div>

    </div>

    <div class="card-body p-0">

        {{-- Info Cards --}}
        <div class="terminal-info-wrapper">
            <div class="row mx-0">

                <div class="col-md-3 col-sm-6 px-2 mb-3 mb-md-0">
                    <div class="terminal-info-card">
                        <div class="terminal-info-icon bg-primary-soft">
                            <i class="fas fa-folder-open text-primary"></i>
                        </div>

                        <div class="terminal-info-content">
                            <div class="terminal-info-label">Current Project</div>
                            <div class="terminal-info-value" id="currentProject">
                                Not Selected
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 px-2 mb-3 mb-md-0">
                    <div class="terminal-info-card">
                        <div class="terminal-info-icon bg-warning-soft">
                            <i class="fas fa-folder-tree text-warning"></i>
                        </div>

                        <div class="terminal-info-content">
                            <div class="terminal-info-label">Working Directory</div>
                            <div class="terminal-info-value terminal-path" id="workingDirectory">
                                -
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 px-2 mb-3 mb-md-0">
                    <div class="terminal-info-card">
                        <div class="terminal-info-icon bg-success-soft">
                            <i class="fab fa-php text-success"></i>
                        </div>

                        <div class="terminal-info-content">
                            <div class="terminal-info-label">Running PHP</div>
                            <div class="terminal-info-value" id="runningPHP">
                                -
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 px-2">
                    <div class="terminal-info-card">
                        <div class="terminal-info-icon bg-info-soft">
                            <i class="fab fa-node-js text-info"></i>
                        </div>

                        <div class="terminal-info-content">
                            <div class="terminal-info-label">Running Node</div>
                            <div class="terminal-info-value" id="runningNode">
                                -
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Terminal Window --}}
        <div class="terminal-console-wrapper">
            <div class="terminal-console-topbar">
                <div class="terminal-dots">
                    <span class="dot dot-red"></span>
                    <span class="dot dot-yellow"></span>
                    <span class="dot dot-green"></span>
                </div>

                <div class="terminal-console-title">
                    StackPilot Terminal Console
                </div>
            </div>

            <div id="terminalWindow" class="terminal-window">
                Welcome to StackPilot Terminal Manager

                Select a project to begin.
                Use shortcut commands or run approved terminal actions safely.

                ------------------------------------------------------------

                >
            </div>
        </div>

        {{-- Command Input --}}
        <div class="terminal-command-bar">
            <div class="input-group terminal-input-group">

                <div class="input-group-prepend">
                    <span class="input-group-text terminal-prompt">
                        <i class="fas fa-angle-right mr-1"></i>
                        cmd
                    </span>
                </div>

                <input type="text" class="form-control" id="terminalCommand"
                    placeholder="Type command here (shortcut commands only)">

                <div class="input-group-append">
                    <button class="btn terminal-execute-btn" id="executeCommand">
                        <i class="fas fa-play mr-1"></i>
                        Execute
                    </button>

                    <button class="btn terminal-clear-btn" id="clearTerminal" title="Clear Terminal">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>

            </div>
        </div>

        {{-- Footer Stats --}}
        <div class="terminal-footer-bar">
            <div class="row mx-0">

                <div class="col-md-4 px-2 mb-2 mb-md-0">
                    <div class="terminal-footer-card">
                        <div class="terminal-footer-label">
                            <i class="fas fa-signal mr-1"></i>
                            Status
                        </div>
                        <div class="terminal-footer-value" id="terminalStatus">
                            Waiting...
                        </div>
                    </div>
                </div>

                <div class="col-md-4 px-2 mb-2 mb-md-0">
                    <div class="terminal-footer-card">
                        <div class="terminal-footer-label">
                            <i class="fas fa-terminal mr-1"></i>
                            Last Command
                        </div>
                        <div class="terminal-footer-value" id="lastCommand">
                            None
                        </div>
                    </div>
                </div>

                <div class="col-md-4 px-2">
                    <div class="terminal-footer-card">
                        <div class="terminal-footer-label">
                            <i class="fas fa-stopwatch mr-1"></i>
                            Execution Time
                        </div>
                        <div class="terminal-footer-value" id="executionTime">
                            --
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
