console.log("✅ Git Ajax loaded");

function destroyGitTable() {
    if ($.fn.dataTable && $.fn.dataTable.isDataTable("#gitTable")) {
        $("#gitTable").DataTable().clear().destroy();
    }
}

function initGitTable() {
    destroyGitTable();

    $("#gitTable").DataTable({
        destroy: true,
        responsive: true,
        autoWidth: false,
        pageLength: 5,
        lengthMenu: [
            [5, 10, 25, 50],
            [5, 10, 25, 50],
        ],
        searching: false,
        ordering: true,
        paging: true,
        info: true,
        lengthChange: true,
        processing: true,
    });
}

function loadGitRepositories() {
    $.ajax({
        url: gitAjaxUrl,
        type: "GET",

        data: {
            search: $("#repositorySearch").val(),
            branch: $("#branchFilter").val(),
            status: $("#statusFilter").val(),
        },

        beforeSend: function () {
            console.log("Loading repositories...");

            destroyGitTable();
        },

        success: function (response) {
            console.log("Repositories loaded.");

            $("#gitRepositoryContainer").replaceWith(response);

            initGitTable();
        },

        error: function (xhr) {
            console.error(xhr.responseText);
        },
    });
}
