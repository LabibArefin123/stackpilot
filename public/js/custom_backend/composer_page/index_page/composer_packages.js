$(function () {
    $(".btn-composer-packages").on("click", function () {
        let projectPath = $(this).data("path");

        $("#composerPackagesModal").modal("show");

        $("#composerPackagesBody").html(
            '<tr><td colspan="3" class="text-center">Loading...</td></tr>',
        );

        $.ajax({
            url: composerPackagesRoute,

            type: "GET",

            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),

                project_path: projectPath,
            },

            success: function (data) {
                let html = "";

                $.each(data, function (index, pkg) {
                    html += `
                        <tr>
                            <td>${pkg.name}</td>
                            <td>${pkg.version}</td>
                            <td>
                                <span class="badge badge-${pkg.type === "Dependency" ? "success" : "warning"}">
                                    ${pkg.type}
                                </span>
                            </td>
                        </tr>
                    `;
                });

                if (html === "") {
                    html = `
                        <tr>
                            <td colspan="3" class="text-center">
                                No Packages Found
                            </td>
                        </tr>
                    `;
                }

                $("#composerPackagesBody").html(html);
            },

            error: function () {
                $("#composerPackagesBody").html(
                    '<tr><td colspan="3" class="text-center text-danger">Unable to load packages.</td></tr>',
                );
            },
        });
    });
});
