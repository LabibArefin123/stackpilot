const CronLogs = {
    init() {
        $(document).on("click", ".btn-cron-log", function () {
            let id = $(this).data("id");

            CronLogs.load(id);
        });
    },

    load(project) {
        CronHelper.loading("Loading Logs...");

        $.get("/cron/" + project + "/logs", function (response) {
            CronHelper.close();

            Swal.fire({
                title: "Laravel Log",

                width: 1000,

                html: `

<pre style="text-align:left;
height:500px;
overflow:auto;
background:#111;
color:#00ff66;
padding:15px;
border-radius:5px;">

${response.logs}

</pre>

`,
            });
        });
    },
};
