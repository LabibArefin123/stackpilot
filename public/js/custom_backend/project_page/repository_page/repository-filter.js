"use strict";

window.RepositoryFilter = {

    initialize() {

        this.bindEvents();

    },

    bindEvents();

    bindEvents() {

        $("#repository-author").on("change", function () {

            RepositorySearch.load();

        });

        $("#repository-date").on("change", function () {

            RepositorySearch.load();

        });

    }

};

$(function () {

    RepositoryFilter.initialize();

});