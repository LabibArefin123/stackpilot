/*
|--------------------------------------------------------------------------
| Live Server Log DataTable
|--------------------------------------------------------------------------
| Table ID:
| #liveServerLogTable
|--------------------------------------------------------------------------
*/

$(function () {
    const table = $("#liveServerLogTable");

    if (!table.length) {
        return;
    }

    table.DataTable({
        destroy: true,

        responsive: true,

        autoWidth: false,

        processing: true,

        deferRender: true,

        pageLength: 5,

        lengthMenu: [
            [5, 10, 25, 50, 100, -1],
            [5, 10, 25, 50, 100, "All"],
        ],

        order: [[3, "desc"]],

        columnDefs: [
            {
                targets: 0,
                searchable: false,
                orderable: false,
            },
            {
                targets: 5,
                searchable: false,
                orderable: false,
            },
        ],

        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search live server logs...",

            lengthMenu: "Show _MENU_ logs",

            info: "Showing _START_ to _END_ of _TOTAL_ logs",

            infoEmpty: "No logs available",

            zeroRecords: "No matching logs found",

            paginate: {
                previous: '<i class="fas fa-angle-left"></i>',
                next: '<i class="fas fa-angle-right"></i>',
            },
        },

        drawCallback: function () {
            const api = this.api();

            api.column(0, {
                page: "current",
            })
                .nodes()
                .each(function (cell, i) {
                    cell.innerHTML = api.page.info().start + i + 1;
                });
        },
    });
});
