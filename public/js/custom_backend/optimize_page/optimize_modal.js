$(document).ready(function () {
    // Open Choose Modal
    $(document).on("click", ".run-project", function (e) {
        e.preventDefault();
        $("#selectedProject").val($(this).data("project"));
        $("#liveDomain").text($(this).data("domain"));
        $("#optimizeMethodModal").modal("show");
    });

    // Local
    $(document).on("click", "#openLocalOptimize", function (e) {
        e.preventDefault();
        $("#optimizeMethodModal").data("next", "local").modal("hide");
    });

    // Live
    $(document).on("click", "#openServerOptimize", function (e) {
        e.preventDefault();
        $("#optimizeMethodModal").data("next", "live").modal("hide");
    });

    // After Choose Modal Closed
    $("#optimizeMethodModal").on("hidden.bs.modal", function () {
        removeBackdrop();
        let next = $(this).data("next");
        $(this).removeData("next");

        if (next === "local") {
            $("#localOptimizeModal").modal("show");
        } else if (next === "live") {
            $("#serverOptimizeModal").modal("show");
        }
    });

    // Remove leftover backdrop
    $("#localOptimizeModal, #serverOptimizeModal").on(
        "hidden.bs.modal",
        function () {
            removeBackdrop();
        },
    );

    function removeBackdrop() {
        $(".modal-backdrop").remove();
        $("body").removeClass("modal-open").css({
            overflow: "",
            paddingRight: "",
        });
    }
});
