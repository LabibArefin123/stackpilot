/*
|--------------------------------------------------------------------------
| Live Terminal - Output Helper
|--------------------------------------------------------------------------
*/

function appendLiveTerminal(message) {
    let terminal = $("#terminalWindow");

    if (!terminal.length) return;

    let now = new Date().toLocaleTimeString();

    terminal.append("\n[" + now + "] " + message);

    terminal.scrollTop(terminal[0].scrollHeight);
}
