$(function () {
    $(".copy-cron").click(function () {
        let command = $(this).data("command");

        navigator.clipboard.writeText(command);

        Swal.fire({
            icon: "success",

            title: "Copied",

            text: "Cron command copied.",
        });
    });
});
