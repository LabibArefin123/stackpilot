const CronHistory = {
    init() {
        $(document).on("click", ".btn-cron-history", function () {
            let project = $(this).data("id");

            CronHistory.load(project);
        });
    },

    load(project) {
        CronHelper.loading("Loading History...");

        $.ajax({
            url: "/cron/" + project + "/history",

            type: "GET",

            success: function (response) {
                CronHelper.close();

                let html = "";

                if (response.history.length === 0) {
                    html = "<p class='text-muted'>No History Found.</p>";
                } else {
                    response.history.forEach(function (line) {
                        html +=
                            "<div style='border-bottom:1px solid #eee;padding:6px;font-family:Consolas'>" +
                            line +
                            "</div>";
                    });
                }

                $("#cronHistoryBody").html(html);

                $("#cronHistoryModal").modal("show");
            },

            error: function () {
                CronHelper.close();

                CronHelper.error("Unable to load history.");
            },
        });
    },
};
