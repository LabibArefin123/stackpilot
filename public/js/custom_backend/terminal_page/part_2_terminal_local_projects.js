/*
|--------------------------------------------------------------------------
| Local Terminal - Project Handling
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Load Local Projects
|--------------------------------------------------------------------------
*/

function loadLocalProjects() {
    $.get("/terminal/projects", function (response) {
        let select = $("#local_project");

        if (!select.length) return;

        select.empty();
        select.append('<option value="">Select Project</option>');

        $.each(response.local_projects || [], function (i, project) {
            select.append(
                '<option value="' +
                    project.name +
                    '">' +
                    project.name +
                    "</option>",
            );
        });
    });
}

/*
|--------------------------------------------------------------------------
| Project Change Event
|--------------------------------------------------------------------------
*/

function bindLocalProjectChange() {
    $(document).on("change", "#local_project", function () {
        let project = $(this).val();

        if (project === "") {
            $("#currentProject").text("--");
            $("#workingDirectory").text("--");
            return;
        }

        $("#currentProject").text(project);
        $("#workingDirectory").text("E:\\laragon\\www\\" + project);

        if (typeof appendTerminal === "function") {
            appendTerminal("Selected Project : " + project, "info");
        }
    });
}
