$(function () {
    $(".btn-composer-json").click(function () {
        let id = $(this).data("id");

        $("#composerJsonModal").modal("show");

        $("#composerJsonContent").html("Loading...");

        $.get("/composer/" + id + "/json", function (data) {
            $("#composerJsonContent").text(JSON.stringify(data, null, 4));
        });
    });
});
