const CronActions = {
    init() {
        $("#refreshCron").click(function () {
            location.reload();
        });

        $("#copyCronCommand").click(function () {
            navigator.clipboard.writeText("* * * * * php artisan schedule:run");

            Swal.fire({
                icon: "success",

                title: "Copied",

                text: "Cron command copied.",
            });
        });

        $("#expandLogs").click(function () {
            $("#cronLogModal").toggleClass("modal-xl");
        });
    },
};
