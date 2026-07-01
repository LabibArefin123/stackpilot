$("#project").change(function () {
    const projectPath = $(this).val();

    if (!projectPath) {
        return;
    }

    const tbody = $("#packageTable tbody");

    tbody.html(`
        <tr>
            <td colspan="4" class="text-center">
                <i class="fas fa-spinner fa-spin"></i>
                Loading Packages...
            </td>
        </tr>
    `);

    $.ajax({
        url: composerPackagesRoute,

        method: "GET",

        data: {
            project_path: projectPath,
        },

        success(response) {
            let html = "";

            let i = 1;

            $.each(response, function (_, item) {
                html += `
                    <tr>

                        <td>${i++}</td>

                        <td>${item.name}</td>

                        <td>${item.version}</td>

                        <td>

                            <span class="badge badge-${
                                item.type === "Dependency"
                                    ? "success"
                                    : "warning"
                            }">

                                ${item.type}

                            </span>

                        </td>

                    </tr>
                `;
            });

            if (html === "") {
                html = `
                    <tr>

                        <td colspan="4" class="text-center">

                            No Composer Packages Found

                        </td>

                    </tr>
                `;
            }

            tbody.html(html);
        },

        error(xhr) {
            let message = "Unable to load packages.";

            if (xhr.responseJSON) {
                message =
                    xhr.responseJSON.message ||
                    xhr.responseJSON.output ||
                    message;
            }

            tbody.html(`
                <tr>

                    <td colspan="4" class="text-danger text-center">

                        ${message}

                    </td>

                </tr>
            `);
        },
    });
});
