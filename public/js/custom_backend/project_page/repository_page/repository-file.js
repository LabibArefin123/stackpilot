$(function () {
    $(document).on("click", ".repository-file", function () {
        var button = $(this);

        RepositoryModal.loading(
            "#repositoryFileModal",
            "#repositoryFileContent",
        );

        $.ajax({
            url: window.repositoryFileUrl,

            type: "GET",

            data: {
                hash: button.data("hash"),

                file: button.data("file"),
            },

            success: function (response) {
                if (!response.success) {
                    $("#repositoryFileContent").html(
                        "<div class='alert alert-danger m-3'>Unable to load file.</div>",
                    );

                    return;
                }

                RepositoryModal.showFile(
                    response.file,

                    response.hash,

                    response.code,
                );
            },

            error: function () {
                $("#repositoryFileContent").html(
                    "<div class='alert alert-danger m-3'>Server error.</div>",
                );
            },
        });
    });
});
