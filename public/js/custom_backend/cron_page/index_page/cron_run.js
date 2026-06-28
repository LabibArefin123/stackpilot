const CronRun = {
    init() {
        $(document).on("click", ".btn-run-cron", function () {
            let id = $(this).data("id");

            CronRun.execute(id);
        });
    },

    execute(project) {
        CronHelper.loading("Running Scheduler...");

        $.ajax({
            url: "/cron/" + project + "/run",

            type: "POST",

            data: {
                _token: CronHelper.csrf(),
            },

            success: function (response) {
                CronHelper.close();

                CronHelper.success("Scheduler executed successfully.");

                console.log(response);
            },

            error: function (xhr) {
                CronHelper.close();

                CronHelper.error(xhr.responseJSON.message);
            },
        });
    },
};
