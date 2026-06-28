$("#project").change(function () {
    let id = $(this).val();

    if (id == "") return;

    let tbody = $("#packageTable tbody");

    tbody.html(
        '<tr><td colspan="4" class="text-center"><i class="fas fa-spinner fa-spin"></i> Loading...</td></tr>',
    );

    $.get("/composer/" + id + "/packages", function (data) {
        let html = "";

        let i = 1;

        $.each(data, function (index, item) {
            html += `

                <tr>

                    <td>${i++}</td>

                    <td>${item.name}</td>

                    <td>${item.version}</td>

                    <td>

                        <span class="badge badge-${item.type == "Dependency" ? "success" : "warning"}">

                            ${item.type}

                        </span>

                    </td>

                </tr>

            `;
        });

        if (html == "")
            html =
                '<tr><td colspan="4" class="text-center">No packages found.</td></tr>';

        tbody.html(html);
    });
});
