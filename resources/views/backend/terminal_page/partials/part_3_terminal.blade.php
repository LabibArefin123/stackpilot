<div class="card terminal-card shadow-lg mt-3 border-0">
    {{-- Header --}}
    <div class="card-header terminal-card-header">
        <div class="terminal-header-inner">
            <div class="terminal-header-left">
                <div class="terminal-header-icon">
                    <i class="fas fa-terminal"></i>
                </div>

                <div class="terminal-header-text">
                    <h3 class="card-title mb-0 terminal-title">
                        Working Terminal
                    </h3>

                    <div class="terminal-subtitle">
                        Execute project commands, monitor environment, and manage shortcuts
                    </div>
                </div>
            </div>

            <div class="terminal-header-right">
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
        @include('backend.terminal_page.partials.part_3_terminal.part_1')

        {{-- Terminal Window --}}
        @include('backend.terminal_page.partials.part_3_terminal.part_2')

        {{-- Command Input --}}
        @include('backend.terminal_page.partials.part_3_terminal.part_3')

        {{-- Footer Stats --}}
        @include('backend.terminal_page.partials.part_3_terminal.part_4')
    </div>
</div>
