// Toggle file list
$(document).on("click", ".btn-files", function () {
    $(this).closest(".card").find(".commit-files").slideToggle();
});
