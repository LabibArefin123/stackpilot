/*
|--------------------------------------------------------------------------
| Local Terminal - Output Helper
|--------------------------------------------------------------------------
*/

function appendTerminal(message, type = "info") {
    let terminal = $("#terminalWindow");

    if (!terminal.length) return;

    let time = new Date().toLocaleTimeString();

    let prefix = "[" + time + "] ";

    terminal.append("\n" + prefix + message);

    terminal.scrollTop(terminal[0].scrollHeight);
}
