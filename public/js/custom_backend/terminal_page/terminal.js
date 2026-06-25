window.runCommand = function (command) {
    const commandInput = document.getElementById("command-input");
    const terminalForm = document.getElementById("terminal-form");

    if (!commandInput) {
        console.error("command-input not found");
        return;
    }

    if (!terminalForm) {
        console.error("terminal-form not found");
        return;
    }

    commandInput.value = command;

    terminalForm.submit();
};
