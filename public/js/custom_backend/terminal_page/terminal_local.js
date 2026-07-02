$(document).ready(function () {
    loadLocalProjects();
    loadPHPVersions();
    loadNodeVersions();

    /**
     * Refresh Button
     */
    $(document).on("click", "#refreshLocal", function () {
        loadLocalProjects();
        loadPHPVersions();
        loadNodeVersions();
    });

    /**
     * Create Folder
     */
    $("#createFolder").click(function () {
        let folder = $("#folder_name").val().trim();

        if (folder === "") {
            alert("Please enter a folder name.");

            return;
        }

        $.ajax({
            url: "/backend/terminal/create-folder",

            method: "POST",

            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),

                folder_name: folder,
            },

            success: function (response) {
                $("#newFolderModal").modal("hide");

                $("#folder_name").val("");

                loadLocalProjects();

                appendTerminal(
                    "Folder created successfully : " + response.path,
                    "success",
                );
            },

            error: function (xhr) {
                let msg = "Unable to create folder.";

                if (xhr.responseJSON?.message) {
                    msg = xhr.responseJSON.message;
                }

                alert(msg);
            },
        });
    });

    /**
     * Project Selected
     */
    $("#local_project").change(function () {
        let project = $(this).val();

        if (project === "") return;

        $("#currentProject").text(project);

        $("#workingDirectory").text("E:\\laragon\\www\\" + project);

        appendTerminal("Selected Project : " + project, "info");
    });
});

/*
|--------------------------------------------------------------------------
| Load Local Projects
|--------------------------------------------------------------------------
*/

function loadLocalProjects() {
    $.get("/backend/terminal/projects", function (response) {
        let select = $("#local_project");

        select.empty();

        select.append('<option value="">Select Project</option>');

        $.each(response.local_projects, function (i, project) {
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
| PHP Versions
|--------------------------------------------------------------------------
*/

function loadPHPVersions() {
    $.get("/backend/terminal/php", function (response) {
        let select = $("#php_version");

        select.empty();

        $.each(response.php_versions, function (i, php) {
            select.append(
                '<option value="' + php.path + '">' + php.version + "</option>",
            );
        });

        if (response.php_versions.length > 0) {
            $("#runningPHP").text(response.php_versions[0].version);

            $("#phpLocation").text(response.php_versions[0].path);
        }
    });
}

/*
|--------------------------------------------------------------------------
| Node Versions
|--------------------------------------------------------------------------
*/

function loadNodeVersions() {
    $.get("/backend/terminal/node", function (response) {
        let select = $("#node_version");

        select.empty();

        $.each(response.node_versions, function (i, node) {
            select.append(
                '<option value="' + node.path + '">' + node.name + "</option>",
            );
        });

        if (response.node_versions.length > 0) {
            $("#runningNode").text(response.node_versions[0].name);

            $("#nodeLocation").text(response.node_versions[0].path);
        }
    });
}

/*
|--------------------------------------------------------------------------
| Terminal Output
|--------------------------------------------------------------------------
*/

function appendTerminal(message, type = "info") {
    let terminal = $("#terminalWindow");

    let time = new Date().toLocaleTimeString();

    terminal.append("\n[" + time + "] " + message);

    terminal.scrollTop(terminal[0].scrollHeight);
}
