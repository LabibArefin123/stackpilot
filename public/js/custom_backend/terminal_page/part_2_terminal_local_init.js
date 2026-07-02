/*
|--------------------------------------------------------------------------
| Local Terminal - Init & Events
|--------------------------------------------------------------------------
*/

$(document).ready(function () {
    if (typeof loadLocalProjects === "function") {
        loadLocalProjects();
    }

    if (typeof loadPHPVersions === "function") {
        loadPHPVersions();
    }

    if (typeof loadNodeVersions === "function") {
        loadNodeVersions();
    }

    bindLocalTerminalEvents();
});

/*
|--------------------------------------------------------------------------
| Bind All Local Terminal Events
|--------------------------------------------------------------------------
*/

function bindLocalTerminalEvents() {
    bindRefreshLocalProjects();
    bindCreateFolder();
    bindLocalProjectChange();
}

/*
|--------------------------------------------------------------------------
| Refresh Local Data
|--------------------------------------------------------------------------
*/

function bindRefreshLocalProjects() {
    $(document).on("click", "#refreshLocal", function () {
        if (typeof loadLocalProjects === "function") {
            loadLocalProjects();
        }

        if (typeof loadPHPVersions === "function") {
            loadPHPVersions();
        }

        if (typeof loadNodeVersions === "function") {
            loadNodeVersions();
        }

        if (typeof appendTerminal === "function") {
            appendTerminal(
                "Local projects, PHP versions, and Node versions refreshed.",
                "info",
            );
        }
    });
}

/*
|--------------------------------------------------------------------------
| Create Folder Event
|--------------------------------------------------------------------------
*/

function bindCreateFolder() {
    $(document).on("click", "#createFolder", function () {
        let folder = $("#folder_name").val().trim();

        if (folder === "") {
            alert("Please enter a folder name.");
            return;
        }

        $.ajax({
            url: "/terminal/create-folder",
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                folder_name: folder,
            },
            success: function (response) {
                $("#newFolderModal").modal("hide");
                $("#folder_name").val("");

                if (typeof loadLocalProjects === "function") {
                    loadLocalProjects();
                }

                if (typeof appendTerminal === "function") {
                    appendTerminal(
                        "Folder created successfully : " + response.path,
                        "success",
                    );
                }
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
}
