$(document).ready(function () {
    // Open Choose Modal
    $(document).on("click", ".run-project", function (e) {
        e.preventDefault();

        $("#selectedProject").val($(this).data("project"));

        $("#liveDomain").text($(this).data("domain"));

        $("#optimizeMethodModal").modal("show");
    });

    // ===========================
    // LOCAL
    // ===========================

    $(document).on("click", "#openLocalOptimize", function (e) {
        e.preventDefault();
        e.stopPropagation();

        $("#optimizeMethodModal").modal("hide");
    });

    $("#optimizeMethodModal").on("hidden.bs.modal", function () {
        if ($(this).data("next") === "local") {
            $(this).removeData("next");

            $("#localOptimizeModal").modal("show");
        }

        if ($(this).data("next") === "live") {
            $(this).removeData("next");

            $("#serverOptimizeModal").modal("show");
        }
    });

    $(document).on("click", "#openLocalOptimize", function () {
        $("#optimizeMethodModal").data("next", "local");
    });

    // ===========================
    // LIVE
    // ===========================

    $(document).on("click", "#openServerOptimize", function (e) {
        e.preventDefault();
        e.stopPropagation();

        $("#optimizeMethodModal").data("next", "live");

        $("#optimizeMethodModal").modal("hide");
    });
});

