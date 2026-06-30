$(function () {
    $(document).on("click", ".repository-copy", function () {
        var button = $(this);
        var target = button.data("target");
        var text = $(target).text().trim();

        if (text === "") {
            return;
        }

        navigator.clipboard.writeText(text).then(function () {
            var originalHtml = button.html();

            button
                .removeClass("btn-outline-primary btn-outline-success")
                .addClass("btn-success")
                .html('<i class="fas fa-check mr-1"></i>Copied');

            setTimeout(function () {
                button.removeClass("btn-success");
                if (target === "#repositoryDiffContent") {
                    button.addClass("btn-outline-primary");
                } else {
                    button.addClass("btn-outline-success");
                }

                button.html(originalHtml);
            }, 1800);
        });
    });
});
