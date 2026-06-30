window.RepositoryFilter = {
    initialize: function () {
        this.bindEvents();
    },

    bindEvents: function () {
        $("#repository-author").on("change", function () {
            RepositorySearch.load();
        });

        $("#repository-date").on("change", function () {
            RepositorySearch.load();
        });

        $("#repository-clear").on("click", function () {
            $("#repository-search").val("");
            $("#repository-author").val("");
            $("#repository-date").val("");

            RepositorySearch.load();
        });
    },
};

$(function () {
    RepositoryFilter.initialize();
});
