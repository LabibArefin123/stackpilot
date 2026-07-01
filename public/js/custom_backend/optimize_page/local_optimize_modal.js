$(document).ready(function () {
    /* Local Optimize Modal */
    $("#localOptimizeModal").on("shown.bs.modal", function () {
        $("#environmentResult").html(
            '<i class="fas fa-spinner fa-spin text-primary"></i> Detecting...',
        );

        $("#phpVersionResult").html(
            '<i class="fas fa-spinner fa-spin text-primary"></i> Detecting...',
        );

        $("#phpExecutableResult").html(
            '<i class="fas fa-spinner fa-spin text-primary"></i> Detecting...',
        );

        $("#projectPathResult").html(
            '<i class="fas fa-spinner fa-spin text-primary"></i> Detecting...',
        );

        $("#phpVersionSelect").html("<option>Detecting...</option>");

        $.ajax({
            url: "/optimization/local",
            type: "POST",
            dataType: "json",

            data: {
                project_id: $("#selectedProject").val(),
                _token: $('meta[name="csrf-token"]').attr("content"),
            },

            success: function (response) {
                let environments = "Not Found";
                if (response.environment.length > 0) {
                    environments = response.environment.join(", ");
                }

                $("#environmentResult").html(environments);
                $("#projectPathResult").html(response.project_path ?? "-");
                $("#phpExecutableResult").html(
                    response.artisan
                        ? '<span class="badge badge-success">artisan Found</span>'
                        : '<span class="badge badge-danger">artisan Missing</span>',
                );

                $("#phpVersionSelect").empty();

                if (response.php_versions.length > 0) {
                    $.each(response.php_versions, function (index, version) {
                        $("#phpVersionSelect").append(
                            `<option value="${version}">
                                ${version}
                            </option>`,
                        );
                    });

                    $("#phpVersionResult").html(response.php_versions[0]);
                } else {
                    $("#phpVersionResult").html(
                        '<span class="text-danger">No PHP Version Found</span>',
                    );

                    $("#phpVersionSelect").append(
                        "<option>No PHP Installed</option>",
                    );
                }
            },

            error: function (xhr) {
                $("#environmentResult").html(
                    '<span class="text-danger">Unable to detect.</span>',
                );

                $("#phpVersionResult").html("-");
                $("#phpExecutableResult").html("-");
                $("#projectPathResult").html("-");
                console.log(xhr.responseText);
            },
        });
    });

    /* Run Local Optimize*/
    $("#runLocalOptimize").click(function () {
        let phpVersion = $("#phpVersionSelect").val();

        if (!phpVersion) {
            Swal.fire({
                icon: "warning",
                title: "PHP Version Required",
                text: "Please select a PHP version.",
            });
            return;
        }

        Swal.fire({
            title: "Coming Soon",
            text: "Local optimization execution will be added next.",
            icon: "info",
        });
    });
});
