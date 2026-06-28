const TerminalEvents = {
    init() {
        $("#quickCommand").change(function () {
            $("#customCommand").val($(this).val());
        });

        $("#customCommand").keypress(function (e) {
            if (e.which === 13) {
                $("#runCommand").click();
            }
        });
    },
};
