window.RepositorySearch = {
    timer: null,

    initialize: function () {
        this.bindEvents();
    },
};

$(function () {
    RepositorySearch.initialize();
});
