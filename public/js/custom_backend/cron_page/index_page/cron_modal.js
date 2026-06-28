const CronModal = {
    loading(title = "Loading...") {
        $("#cronLoadingTitle").text(title);

        $("#cronLoadingModal").modal({
            backdrop: "static",

            keyboard: false,
        });
    },

    close() {
        $("#cronLoadingModal").modal("hide");
    },

    showOutput(title, output) {
        $("#cronOutputTitle").text(title);

        $("#cronOutputBody").html("<pre>" + output + "</pre>");

        $("#cronOutputModal").modal("show");
    },

    showLogs(logs) {
        $("#cronLogBody").html("<pre>" + logs + "</pre>");

        $("#cronLogModal").modal("show");
    },
};
