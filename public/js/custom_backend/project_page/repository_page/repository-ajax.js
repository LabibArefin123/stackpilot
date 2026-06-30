RepositorySearch.load = function () {
    $.ajax({
        url: window.repositorySearchUrl,
        type: "GET",

        data: {
            keyword: $("#repository-search").val().trim(),
            author: $("#repository-author").val(),
            date: $("#repository-date").val(),
        },

        success: function (response) {
            if (response.success) {
                RepositorySearch.render(response.data);
            }
        },
    });
};
