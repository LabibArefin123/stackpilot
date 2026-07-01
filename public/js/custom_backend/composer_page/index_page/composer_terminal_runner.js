const TerminalRunner = {
    init() {
        $("#runCommand").click(function () {
            TerminalRunner.run();
        });
    },

    run() {
        const projectPath = $("#project").val();
        const command = $("#customCommand").val().trim();

        if (!projectPath) {
            Swal.fire({
                icon: "warning",
                title: "Project Required",
                text: "Please select a project.",
            });
            return;
        }

        if (!command) {
            Swal.fire({
                icon: "warning",
                title: "Command Required",
                text: "Please enter a command.",
            });
            return;
        }

        TerminalOutput.info("Running composer " + command + "...");

        $.ajax({
            url: composerTerminalRoute,
            method: "GET",
            data: {
                project_path: projectPath,
                command: command,
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

                if (xhr.responseJSON) {
                    message =
                        xhr.responseJSON.output ||
                        xhr.responseJSON.message ||
                        message;
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
