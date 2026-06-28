const TerminalOutput = {
    terminal: $("#terminalOutput"),

    print(command, output) {
        this.terminal.append(`

<div class="terminal-command">

$ composer ${command}

</div>

<div class="terminal-result">

${output}

</div>

`);

        this.scroll();
    },

    info(text) {
        this.terminal.append(`<div class="terminal-info">${text}</div>`);

        this.scroll();
    },

    error(text) {
        this.terminal.append(`<div class="terminal-error">${text}</div>`);

        this.scroll();
    },

    clear() {
        this.terminal.html(`

<div class="terminal-info">

Welcome to Composer Terminal

<br>

Select a project and execute a Composer command.

</div>

`);
    },

    scroll() {
        this.terminal.scrollTop(this.terminal[0].scrollHeight);
    },
};
