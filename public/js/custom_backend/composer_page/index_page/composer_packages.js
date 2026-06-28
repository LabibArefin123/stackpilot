$(function () {
    $(".btn-composer-packages").click(function () {
        let id = $(this).data("id");

        $("#composerPackagesModal").modal("show");

        $("#composerPackagesBody").html(
            '<tr><td colspan="2" class="text-center">Loading...</td></tr>',
        );

        $.get("/composer/" + id + "/packages", function (data) {
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
                        <td colspan="2" class="text-center">
                            No Packages Found
                        </td>
                    </tr>
                `;
            }

            $("#composerPackagesBody").html(html);
        });
    });
});
