RepositorySearch.bindEvents = function () {
    $("#repository-search").on("keyup", function () {
        clearTimeout(RepositorySearch.timer);

        RepositorySearch.timer = setTimeout(function () {
            RepositorySearch.load();
        }, 300);
    });

    // When user clears the search using mouse (×)
    $("#repository-search").on("search input", function () {
        if ($(this).val() === "") {
            RepositorySearch.load();
        }
    });
};
