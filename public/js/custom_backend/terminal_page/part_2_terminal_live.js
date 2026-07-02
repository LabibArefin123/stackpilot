/*
|--------------------------------------------------------------------------
| Live Terminal
|--------------------------------------------------------------------------
*/

$(function () {
    /*
    |--------------------------------------------------------------------------
    | Live Project Selected
    |--------------------------------------------------------------------------
    */

    $("#live_project").on("change", function () {
        let option = $(this).find("option:selected");

        if ($(this).val() == "") {
            clearLiveInformation();

            return;
        }

        $("#currentProject").text(option.text());

        $("#workingDirectory").text("/home/labibwor");

        $("#live_domain").text(option.data("domain"));

        $("#live_api").text(option.data("api"));

        $("#server_status").html(
            '<span class="badge badge-secondary">Unknown</span>',
        );

        appendLiveTerminal("Selected Live Project : " + option.text());
    });

    /*
    |--------------------------------------------------------------------------
    | Connect Button
    |--------------------------------------------------------------------------
    */

    $(document).on("click", "#connectServer", function () {
        let project = $("#live_project").val();

        if (!project) {
            alert("Please select a live project.");

            return;
        }

        $("#terminalStatus").html(
            '<span class="badge badge-info">Connecting...</span>',
        );

        appendLiveTerminal("Connecting to server...");

        setTimeout(function () {
            $("#terminalStatus").html(
                '<span class="badge badge-success">Connected</span>',
            );

            appendLiveTerminal("Connection successful.");
        }, 800);
    });

    /*
    |--------------------------------------------------------------------------
    | Server Status
    |--------------------------------------------------------------------------
    */

    $(document).on("click", "#checkServerStatus", function () {
        let project = $("#live_project").val();

        if (!project) {
            alert("Please select a live project.");

            return;
        }

        $("#server_status").html(
            '<span class="badge badge-warning">Checking...</span>',
        );

        $.ajax({
            url: "/backend/terminal/server-status",

            type: "POST",

            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),

                project_id: project,
            },

            success: function (response) {
                if (response.success) {
                    $("#server_status").html(
                        '<span class="badge badge-success">Online</span>',
                    );

                    appendLiveTerminal("Server is Online.");
                } else {
                    $("#server_status").html(
                        '<span class="badge badge-danger">Offline</span>',
                    );

                    appendLiveTerminal(response.message);
                }
            },

            error: function () {
                $("#server_status").html(
                    '<span class="badge badge-danger">Offline</span>',
                );

                appendLiveTerminal("Unable to contact server.");
            },
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Refresh Live
    |--------------------------------------------------------------------------
    */

    $(document).on("click", "#refreshLive", function () {
        $("#live_project").trigger("change");
    });
});

/*
|--------------------------------------------------------------------------
| Terminal Output
|--------------------------------------------------------------------------
*/

function appendLiveTerminal(message) {
    let terminal = $("#terminalWindow");

    if (!terminal.length) return;

    let now = new Date().toLocaleTimeString();

    terminal.append("\n[" + now + "] " + message);

    terminal.scrollTop(terminal[0].scrollHeight);
}

/*
|--------------------------------------------------------------------------
| Clear Live Information
|--------------------------------------------------------------------------
*/

function clearLiveInformation() {
    $("#live_domain").text("-");

    $("#live_api").text("-");

    $("#server_status").html(
        '<span class="badge badge-secondary">Unknown</span>',
    );

    $("#currentProject").text("Not Selected");

    $("#workingDirectory").text("-");
}
