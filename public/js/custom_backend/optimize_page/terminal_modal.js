//=====================================================
// Terminal Modal JS
//=====================================================

let currentProject = {
    id: null,
    name: "",
    domain: "",
    path: "",
};

//-----------------------------------------------------
// Open Terminal Modal
//-----------------------------------------------------

$(document).on("click", ".open-terminal", function () {
    currentProject.id = $(this).data("project");
    currentProject.name = $(this).data("name");
    currentProject.domain = $(this).data("domain");
    currentProject.path = $(this).data("path");

    $("#terminalProjectName").text(currentProject.name);

    clearTerminal();

    writeTerminal("========================================");
    writeTerminal(" Laravel Optimization Terminal");
    writeTerminal("========================================");
    writeTerminal("Project : " + currentProject.name);
    writeTerminal("Domain  : " + currentProject.domain);
    writeTerminal("");

    $("#terminalModal").modal("show");
});

//-----------------------------------------------------
// Run Command Card
//-----------------------------------------------------

$(document).on("click", ".command-card", function () {
    let button = $(this);

    let command = button.data("command");

    runCommand(command, button);
});

//-----------------------------------------------------
// Run Command
//-----------------------------------------------------

function runCommand(command, button = null) {
    if (currentProject.path === "") {
        writeTerminal("No project selected.");

        return;
    }

    if (button !== null) {
        button.addClass("disabled");
        button.css("pointer-events", "none");
    }

    writeTerminal("");
    writeTerminal("> php artisan " + command);
    writeTerminal("");

    $.ajax({
        url: "/optimization/terminal",

        type: "POST",

        dataType: "json",

        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),

            project_path: currentProject.path,

            php_version: $("#phpVersion").val(),

            command: command,
        },

        success: function (response) {
            if (response.success) {
                writeTerminal(response.output);
            } else {
                writeTerminal("ERROR:");
                writeTerminal(response.output);
            }
        },

        error: function (xhr) {
            if (xhr.responseJSON && xhr.responseJSON.output) {
                writeTerminal(xhr.responseJSON.output);
            } else {
                writeTerminal("Unexpected server error.");
            }
        },

        complete: function () {
            if (button !== null) {
                button.removeClass("disabled");
                button.css("pointer-events", "auto");
            }

            writeTerminal("");
            writeTerminal("----------------------------------------");
            writeTerminal("");
        },
    });
}

//-----------------------------------------------------
// Terminal Output
//-----------------------------------------------------

function writeTerminal(text) {
    let terminal = $("#terminal");

    terminal.append($("<div>").text(text));

    terminal.scrollTop(terminal[0].scrollHeight);
}

//-----------------------------------------------------
// Clear Terminal
//-----------------------------------------------------

function clearTerminal() {
    $("#terminal").html("");
}

//-----------------------------------------------------
// Clear when modal closes
//-----------------------------------------------------

$("#terminalModal").on("hidden.bs.modal", function () {
    clearTerminal();
});
