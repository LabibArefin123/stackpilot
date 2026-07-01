$(document).ready(function () {
    
    /* Detect Live Server*/
    $("#serverOptimizeModal").on("shown.bs.modal", function () {
        $("#hostingProvider").html(
            '<i class="fas fa-spinner fa-spin text-primary"></i> Checking...',
        );

        $("#hostingAccount").html(
            '<i class="fas fa-spinner fa-spin text-primary"></i> Checking...',
        );

        $("#serverStatus").html(
            '<i class="fas fa-spinner fa-spin text-primary"></i> Checking...',
        );

        $("#serverPhpVersion").html(
            '<i class="fas fa-spinner fa-spin text-primary"></i> Checking...',
        );

        $.ajax({
            url: "/optimization/live",
            type: "POST",
            dataType: "json",
            data: {
                project_id: $("#selectedProject").val(),
                _token: $('meta[name="csrf-token"]').attr("content"),
            },

            success: function (response) {
                $("#liveDomain").text(response.domain);
                $("#hostingProvider").html(response.hosting_provider);
                $("#hostingAccount").html(response.hosting_account);

                if (response.server_status === "Online") {
                    $("#serverStatus").html(
                        '<span class="badge badge-success">Online</span>',
                    );
                } else {
                    $("#serverStatus").html(
                        '<span class="badge badge-danger">Offline</span>',
                    );
                }

                $("#serverPhpVersion").html(response.php_version);
            },

            error: function () {
                $("#hostingProvider").html(
                    '<span class="text-danger">Unable to Detect</span>',
                );

                $("#hostingAccount").html("-");

                $("#serverStatus").html(
                    '<span class="badge badge-danger">Failed</span>',
                );

                $("#serverPhpVersion").html("-");
            },
        });
    });

    /* Run Optimize */
    $("#runServerOptimize").click(function () {
        Swal.fire({
            icon: "info",
            title: "Coming Soon",
            text: "Remote optimization execution will be implemented next.",
        });
    });
});
