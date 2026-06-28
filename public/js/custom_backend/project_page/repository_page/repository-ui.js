"use strict";

/*
|--------------------------------------------------------------------------
| Repository UI
|--------------------------------------------------------------------------
*/

window.RepositoryUI = {
    initialize() {
        this.theme();

        this.fontSize();
    },

    theme() {
        $(".btn-code-theme").click(function () {
            const theme = $("#highlight-theme");

            if (theme.attr("href").includes("github-dark")) {
                theme.attr(
                    "href",
                    "https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/styles/github.min.css",
                );
            } else {
                theme.attr(
                    "href",
                    "https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/styles/github-dark.min.css",
                );
            }
        });
    },

    fontSize() {
        $(".btn-font-plus").click(function () {
            $("pre").css("font-size", "+=1");
        });

        $(".btn-font-minus").click(function () {
            $("pre").css("font-size", "-=1");
        });
    },
};

$(function () {
    RepositoryUI.initialize();
});
