const CronStatus = {
    init() {
        $(document).on("click", ".btn-cron-status", function () {
            let id = $(this).data("id");

            CronStatus.load(id);
        });
    },

    load(project) {
        CronHelper.loading("Checking Status...");

        $.get("/cron/" + project + "/status", function (response) {
            CronHelper.close();

            Swal.fire({
                title: "Server Status",

                width: 700,

                html: `

<table class="table table-bordered">

<tr>

<th>Project</th>

<td>${response.status.project}</td>

</tr>

<tr>

<th>Laravel</th>

<td>${response.status.laravel}</td>

</tr>

<tr>

<th>PHP</th>

<td>${response.status.php}</td>

</tr>

<tr>

<th>Scheduler</th>

<td>${response.status.scheduler}</td>

</tr>

<tr>

<th>Queue</th>

<td>${response.status.queue}</td>

</tr>

<tr>

<th>Timezone</th>

<td>${response.status.timezone}</td>

</tr>

<tr>

<th>Server Time</th>

<td>${response.status.server_time}</td>

</tr>

</table>

`,
            });
        });
    },
};
