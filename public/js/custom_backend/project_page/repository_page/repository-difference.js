$(function () {
    $(document).on("click", ".repository-diff", function () {
        var button = $(this);

        RepositoryModal.loading(
            "#repositoryDiffModal",
            "#repositoryDiffContent",
        );

        $.ajax({
            url: window.repositoryDiffUrl,

            type: "GET",

            data: {
                hash: button.data("hash"),

                file: button.data("file"),
            },

            success: function (response) {
                if (!response.success) {
                    $("#repositoryDiffContent").html(
                        "<div class='alert alert-danger m-3'>Unable to load diff.</div>",
                    );

                    return;
                }

                RepositoryModal.showDiff(
                    response.file,

                    response.hash,

                    response.html,
                );
            },

            error: function () {
                $("#repositoryDiffContent").html(
                    "<div class='alert alert-danger m-3'>Server error.</div>",
                );
            },
        });
    });
});
