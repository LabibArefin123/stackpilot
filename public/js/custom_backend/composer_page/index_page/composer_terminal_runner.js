const TerminalRunner = {
    init() {
        $("#runCommand").click(function () {
            TerminalRunner.run();
        });
    },

    run() {
        let project = $("#project").val();

        let command = $("#customCommand").val().trim();

        if (project === "") {
            Swal.fire({
                icon: "warning",

                title: "Project Required",

                text: "Please select a project.",
            });

            return;
        }

        if (command === "") {
            Swal.fire({
                icon: "warning",

                title: "Command Required",

                text: "Please enter a command.",
            });

            return;
        }

        TerminalOutput.info("Running composer " + command + "...");

        $.ajax({
            url: "/composer/" + project + "/terminal",

            type: "POST",

            data: {
                command: command,

                _token: $('meta[name="csrf-token"]').attr("content"),
            },

            beforeSend() {
                $("#runCommand")
                    .prop("disabled", true)

                    .html('<i class="fas fa-spinner fa-spin"></i> Running');
            },

            success(response) {
                TerminalOutput.print(command, response.output);
            },

            error(xhr) {
                let message = "Unknown Error";

                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }

                TerminalOutput.error(message);
            },

            complete() {
                $("#runCommand")
                    .prop("disabled", false)

                    .html('<i class="fas fa-play"></i> Run');
            },
        });
    },
};
