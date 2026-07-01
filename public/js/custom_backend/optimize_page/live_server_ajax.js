$(document).on("click", "#checkLiveServer", function (e) {
    e.preventDefault();

    let hosting = $("#hostingAccountSelect").val();

    if (hosting == "") {
        Swal.fire({
            icon: "warning",
            title: "Hosting Account Required",
            text: "Please select a hosting account first.",
        });

        return;
    }

    let button = $(this);

    button.prop("disabled", true);

    button.html(
        '<i class="fas fa-spinner fa-spin mr-2"></i>Checking Server...',
    );

    /*
    |--------------------------------------------------------------------------
    | Reset UI
    |--------------------------------------------------------------------------
    */

    $("#hostingProvider").html("Checking...");
    $("#hostingAccount").html("Checking...");
    $("#serverHostname").html("Checking...");
    $("#serverStatus").html("Checking...");
    $("#serverPhpVersion").html("Checking...");
    $("#serverPhpBinary").html("Checking...");

    $("#serverReadyProgress")
        .css("width", "0%")
        .removeClass("bg-success bg-danger bg-warning")
        .text("0%");

    $("#serverReadyText").html("Checking...");

    $.ajax({
        url: checkServerRoute,

        type: "POST",

        data: {
            hosting_account_id: hosting,

            _token: $('meta[name="csrf-token"]').attr("content"),
        },

        success: function (response) {
            button.prop("disabled", false);

            button.html('<i class="fas fa-search mr-2"></i>Check Live Server');

            if (!response.success) {
                Swal.fire({
                    icon: "error",

                    title: "Connection Failed",

                    text: response.message,
                });

                return;
            }

            /*
            |--------------------------------------------------------------------------
            | Fill Information
            |--------------------------------------------------------------------------
            */

            $("#hostingProvider").html(
                '<span class="badge badge-info">' +
                    response.provider +
                    "</span>",
            );

            $("#hostingAccount").html(
                '<span class="badge badge-success">' +
                    response.username +
                    "</span>",
            );

            $("#serverHostname").html(response.hostname);

            $("#serverStatus").html(
                '<span class="badge badge-success">ONLINE</span>',
            );

            $("#serverPhpVersion").html(
                response.php82
                    ? '<span class="badge badge-success">' +
                          response.php_version +
                          "</span>"
                    : '<span class="badge badge-danger">' +
                          response.php_version +
                          "</span>",
            );

            $("#serverPhpBinary").html(response.php_binary);

            /*
            |--------------------------------------------------------------------------
            | Readiness Score
            |--------------------------------------------------------------------------
            */

            let score = 0;

            if (response.status === "Online") score += 20;

            if (response.php82) score += 20;

            if (response.laravel_found) score += 20;

            if (response.hostname) score += 20;

            if (response.php_binary) score += 20;

            $("#serverReadyProgress")
                .css("width", score + "%")
                .text(score + "%");

            if (score == 100) {
                $("#serverReadyProgress")
                    .removeClass("bg-warning bg-danger")
                    .addClass("bg-success");

                $("#serverReadyText").html(
                    '<span class="text-success"><b>Ready for Optimization</b></span>',
                );
            } else if (score >= 60) {
                $("#serverReadyProgress")
                    .removeClass("bg-success bg-danger")
                    .addClass("bg-warning");

                $("#serverReadyText").html(
                    '<span class="text-warning"><b>Needs Attention</b></span>',
                );
            } else {
                $("#serverReadyProgress")
                    .removeClass("bg-success bg-warning")
                    .addClass("bg-danger");

                $("#serverReadyText").html(
                    '<span class="text-danger"><b>Server Not Ready</b></span>',
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Laravel Projects
            |--------------------------------------------------------------------------
            */

            if (response.laravel_projects.length) {
                console.table(response.laravel_projects);

                console.log("Laravel Projects:");

                response.laravel_projects.forEach(function (project) {
                    console.log(project);
                });
            }

            Swal.fire({
                icon: "success",

                title: "Server Connected",

                text: "Live server verification completed successfully.",

                timer: 1800,

                showConfirmButton: false,
            });
        },

        error: function (xhr) {
            button.prop("disabled", false);

            button.html('<i class="fas fa-search mr-2"></i>Check Live Server');

            let message = "Unable to connect to server.";

            if (xhr.responseJSON) {
                if (xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
            }

            $("#serverStatus").html(
                '<span class="badge badge-danger">OFFLINE</span>',
            );

            $("#serverReadyProgress")
                .css("width", "0%")
                .removeClass("bg-success bg-warning")
                .addClass("bg-danger")
                .text("0%");

            $("#serverReadyText").html(
                '<span class="text-danger"><b>Connection Failed</b></span>',
            );

            Swal.fire({
                icon: "error",

                title: "SSH Connection Failed",

                text: message,
            });
        },
    });
});
