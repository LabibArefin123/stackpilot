$(document).ready(function () {
    const gitTable = $("#gitLogTable").DataTable();
    const serverTable = $("#serverLogTable").DataTable();

    $("#projectFilter").on("change", function () {
        let value = $(this).val();

        gitTable.column(1).search(value).draw();
        serverTable.column(1).search(value).draw();
    });
});
