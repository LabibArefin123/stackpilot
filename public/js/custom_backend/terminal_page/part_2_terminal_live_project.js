/*
|--------------------------------------------------------------------------
| Live Terminal - Project Handling
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Bind Live Project Events
|--------------------------------------------------------------------------
*/

function bindLiveProjectEvents() {
    $(document).on("change", "#live_project", function () {
        let option = $(this).find("option:selected");

        if ($(this).val() === "") {
            clearLiveInformation();
            return;
        }

        $("#currentProject").text(option.text());
        $("#workingDirectory").text("/home/labibwor");
        $("#live_domain").text(option.data("domain") || "-");
        $("#live_api").text(option.data("api") || "-");

        $("#server_status").html(
            '<span class="badge badge-secondary">Unknown</span>',
        );

        if (typeof appendLiveTerminal === "function") {
            appendLiveTerminal("Selected Live Project : " + option.text());
        }
    });
}

/*
|--------------------------------------------------------------------------
| Clear Live Information
|--------------------------------------------------------------------------
*/

function clearLiveInformation() {
    $("#live_domain").text("-");
    $("#live_api").text("-");
    $("#server_status").html(
        '<span class="badge badge-secondary">Unknown</span>',
    );
    $("#currentProject").text("Not Selected");
    $("#workingDirectory").text("-");
}
