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
        let text = $("#terminalOutput").text();

        let blob = new Blob([text], {
            type: "text/plain",
        });

        let link = document.createElement("a");

        link.href = URL.createObjectURL(blob);

        link.download = "composer_terminal.txt";

        document.body.appendChild(link);

        link.click();

        document.body.removeChild(link);
    },
};
