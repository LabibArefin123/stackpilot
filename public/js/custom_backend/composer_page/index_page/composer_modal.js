$(function () {
    $(".btn-composer-json").on("click", function () {
        let projectPath = $(this).data("path");

        $("#composerJsonModal").modal("show");

        $("#composerJsonContent").html("Loading...");

        $.ajax({
            url: composerShowRoute,

            type: "GET",

            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),

                project_path: projectPath,
            },

            success: function (data) {
                $("#composerJsonContent").text(JSON.stringify(data, null, 4));
            },

            error: function () {
                $("#composerJsonContent").html(
                    '<div class="text-danger">Unable to load composer.json</div>',
                );
            },
        });
    });
});
