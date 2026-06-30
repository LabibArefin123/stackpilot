$(document).ready(function () {
    const table = $("#projectTables");

    if (!table.length) {
        return;
    }

    table.DataTable({
        pageLength: 5,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],

        ordering: true,
        searching: true,
        paging: true,
        info: true,
        responsive: true,
        autoWidth: false,

        language: {
            lengthMenu: "Show _MENU_ projects",
            search: "Search:",
            info: "Showing _START_ to _END_ of _TOTAL_ projects",
            infoEmpty: "No projects available",
            zeroRecords: "No matching projects found",
            paginate: {
                previous: "←",
                next: "→",
            },
        },
    });
});
