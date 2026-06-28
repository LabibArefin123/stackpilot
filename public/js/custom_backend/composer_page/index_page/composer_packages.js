$(function () {
    $(".btn-composer-packages").click(function () {
        let id = $(this).data("id");

        $("#composerPackagesModal").modal("show");

        $("#composerPackagesBody").html(
            '<tr><td colspan="2" class="text-center">Loading...</td></tr>',
        );

        $.get("/composer/" + id + "/packages", function (data) {
            let html = "";

            $.each(data, function (name, version) {
                html += `
                    <tr>
                        <td>${name}</td>
                        <td>${version}</td>
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
