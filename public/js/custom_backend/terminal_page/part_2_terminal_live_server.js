/*
|--------------------------------------------------------------------------
| Live Terminal - Server Actions
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Bind Live Server Events
|--------------------------------------------------------------------------
*/

function bindLiveServerEvents() {
    bindConnectServer();
    bindCheckServerStatus();
    bindRefreshLive();
}

/*
|--------------------------------------------------------------------------
| Connect Server
|--------------------------------------------------------------------------
*/

function bindConnectServer() {
    $(document).on("click", "#connectServer", function () {
        let project = $("#live_project").val();

        if (!project) {
            alert("Please select a live project.");
            return;
        }

        $("#terminalStatus").html(
            '<span class="badge badge-info">Connecting...</span>',
        );

        if (typeof appendLiveTerminal === "function") {
            appendLiveTerminal("Connecting to server...");
        }

        setTimeout(function () {
            $("#terminalStatus").html(
                '<span class="badge badge-success">Connected</span>',
            );

            if (typeof appendLiveTerminal === "function") {
                appendLiveTerminal("Connection successful.");
            }
        }, 800);
    });
}

/*
|--------------------------------------------------------------------------
| Check Server Status
|--------------------------------------------------------------------------
*/

function bindCheckServerStatus() {
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

                    if (typeof appendLiveTerminal === "function") {
                        appendLiveTerminal("Server is Online.");
                    }
                } else {
                    $("#server_status").html(
                        '<span class="badge badge-danger">Offline</span>',
                    );

                    if (typeof appendLiveTerminal === "function") {
                        appendLiveTerminal(
                            response.message || "Server appears to be offline.",
                        );
                    }
                }
            },
            error: function () {
                $("#server_status").html(
                    '<span class="badge badge-danger">Offline</span>',
                );

                if (typeof appendLiveTerminal === "function") {
                    appendLiveTerminal("Unable to contact server.");
                }
            },
        });
    });
}

/*
|--------------------------------------------------------------------------
| Refresh Live
|--------------------------------------------------------------------------
*/

function bindRefreshLive() {
    $(document).on("click", "#refreshLive", function () {
        $("#live_project").trigger("change");

        if (typeof appendLiveTerminal === "function") {
            appendLiveTerminal("Live project information refreshed.");
        }
    });
}
