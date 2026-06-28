"use strict";

window.RepositoryFilter = {
    initialize() {
        this.events();
    },

    events() {
        $("#repository-author,#repository-date").change(() => {
            $.ajax({
                url: window.repositoryFilterUrl,

                type: "GET",

                data: {
                    author: $("#repository-author").val(),

                    date: $("#repository-date").val(),
                },

                success: (response) => {
                    RepositorySearch.render(response.data);
                },
            });
        });
    },
};

$(function () {
    RepositoryFilter.initialize();
});
