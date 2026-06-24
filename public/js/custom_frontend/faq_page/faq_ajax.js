$(document).ready(function () {
    $("#faqSearch").on("keyup", function () {
        let search = $(this).val();

        $.ajax({
            url: faqAjaxUrl,

            type: "GET",

            data: {
                search: search,
            },

            success: function (response) {
                $("#faqResults").html(response);
            },
        });
    });
});
