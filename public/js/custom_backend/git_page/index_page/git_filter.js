console.log("✅ Git Filter loaded");

$(function () {
    initGitTable();

    let timer;

    $("#repositorySearch").on("input", function () {
        clearTimeout(timer);

        timer = setTimeout(loadGitRepositories, 300);
    });

    $("#branchFilter").on("change", loadGitRepositories);

    $("#statusFilter").on("change", loadGitRepositories);
});
