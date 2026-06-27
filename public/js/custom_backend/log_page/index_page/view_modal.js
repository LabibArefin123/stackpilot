$(function () {
    $(document).on("click", ".view-log-details", function () {
        $("#modalProject").text($(this).data("project"));
        $("#modalLevel").text($(this).data("level"));
        $("#modalDate").text($(this).data("date"));
        $("#modalMessage").text($(this).data("message"));

        $("#modalDetails").text($(this).data("details"));

        $("#viewLogModal").modal("show");
    });
});
