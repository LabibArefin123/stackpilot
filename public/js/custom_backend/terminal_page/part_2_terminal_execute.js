/*
|--------------------------------------------------------------------------
| Terminal Execute & Clear
|--------------------------------------------------------------------------
*/

$(document).ready(function () {
    bindExecuteCommand();

    bindClearTerminal();
});

/*
|--------------------------------------------------------------------------
| Execute Button
|--------------------------------------------------------------------------
*/

function bindExecuteCommand() {
    $(document).on("click", "#executeCommand", function (e) {
        e.preventDefault();

        let command = $("#terminalCommand").val().trim();

        if (command === "") {
            Swal.fire({
                icon: "warning",

                title: "Empty Command",

                text: "Please type a command.",
            });

            $("#terminalCommand").focus();

            return;
        }

        let now = new Date().toLocaleTimeString();

        $("#terminalWindow").append("\n[" + now + "]\n$ " + command + "\n");

        $("#terminalWindow").scrollTop($("#terminalWindow")[0].scrollHeight);

        $("#lastCommand").text(command);

        $("#terminalStatus").html(
            '<span class="badge badge-info">Waiting...</span>',
        );

        /*
        |--------------------------------------------------------------------------
        | Future Ajax Execute
        |--------------------------------------------------------------------------
        */

        // $.post(...)

        $("#terminalCommand").val("").focus();
    });
}

/*
|--------------------------------------------------------------------------
| Clear Button
|--------------------------------------------------------------------------
*/

function bindClearTerminal() {
    $(document).on("click", "#clearTerminal", function (e) {
        e.preventDefault();

        Swal.fire({
            title: "Clear Terminal?",

            text: "Terminal history will be removed.",

            icon: "question",

            showCancelButton: true,

            confirmButtonText: "Clear",
        }).then((result) => {
            if (!result.isConfirmed) {
                return;
            }

            $("#terminalWindow").html(
                `====================================================
 Laravel Terminal
====================================================

Ready...
`,
            );

            $("#terminalCommand").val("");

            $("#lastCommand").text("--");

            $("#terminalStatus").html(
                '<span class="badge badge-secondary">Ready</span>',
            );
        });
    });
}
