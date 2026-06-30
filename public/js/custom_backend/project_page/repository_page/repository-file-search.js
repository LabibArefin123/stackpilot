$(function () {
    function escapeRegExp(text) {
        return text.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");
    }

    function removeHighlight(target) {
        var container = $(target);

        var original = container.attr("data-original");

        if (original !== undefined) {
            container.html(original);
        }
    }

    function highlight(target, keyword) {
        var container = $(target);

        if (container.attr("data-original") === undefined) {
            container.attr("data-original", container.html());
        }

        var original = container.attr("data-original");

        if ($.trim(keyword) === "") {
            container.html(original);

            return;
        }

        var regex = new RegExp("(" + escapeRegExp(keyword) + ")", "gi");

        var html = original.replace(
            regex,

            "<mark class='repository-highlight-search'>$1</mark>",
        );

        container.html(html);

        var first = container.find(".repository-highlight-search").first();

        if (first.length) {
            container.stop().animate(
                {
                    scrollTop:
                        container.scrollTop() + first.position().top - 80,
                },
                300,
            );
        }
    }

    $(document).on("keyup input", "#repositoryFileSearch", function () {
        var target = $(this).data("target");

        highlight(target, $(this).val());
    });

    $("#repositoryFileModal").on("hidden.bs.modal", function () {
        $("#repositoryFileSearch").val("");

        removeHighlight("#repositoryFileContent");
    });
});
