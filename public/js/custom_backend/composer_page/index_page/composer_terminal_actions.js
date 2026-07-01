const TerminalActions = {
    init() {
        $("#clearTerminal").click(function () {
            TerminalOutput.clear();
        });

        $("#downloadOutput").click(function () {
            TerminalActions.download();
        });

        $(document).keydown(function (e) {
            if (e.ctrlKey && e.key === "l") {
                e.preventDefault();

                TerminalOutput.clear();
            }
        });
    },

    download() {
        const text = $("#terminalOutput").text();

        const blob = new Blob([text], {
            type: "text/plain",
        });

        const url = URL.createObjectURL(blob);

        const link = document.createElement("a");

        link.href = url;

        link.download = "composer_terminal.txt";

        document.body.appendChild(link);

        link.click();

        document.body.removeChild(link);

        URL.revokeObjectURL(url);
    },
};
