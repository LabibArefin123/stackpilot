"use strict";

/*
|--------------------------------------------------------------------------
| Repository Highlight
|--------------------------------------------------------------------------
|
| Author: TimeTrack
|
*/

window.RepositoryHighlight = {
    initialize() {
        this.highlightAll();

        this.copyButtons();

        this.fullscreen();

        this.wrapCode();

        this.themeSwitcher();
    },

    /*
    |--------------------------------------------------------------------------
    | Highlight
    |--------------------------------------------------------------------------
    */

    highlightAll() {
        document.querySelectorAll("pre code").forEach((block) => {
            hljs.highlightElement(block);

            this.lineNumbers(block);
        });
    },

    refresh(container) {
        container.querySelectorAll("pre code").forEach((block) => {
            hljs.highlightElement(block);

            this.lineNumbers(block);
        });
    },

    /*
    |--------------------------------------------------------------------------
    | Line Numbers
    |--------------------------------------------------------------------------
    */

    lineNumbers(block) {
        if (block.dataset.numbered) return;

        block.dataset.numbered = true;

        const lines = block.innerHTML.split("\n");

        let html = "";

        lines.forEach(function (line, index) {
            html +=
                '<span class="repo-line">' +
                '<span class="repo-number">' +
                (index + 1) +
                "</span>" +
                '<span class="repo-code">' +
                line +
                "</span>" +
                "</span>";
        });

        block.innerHTML = html;
    },

    /*
    |--------------------------------------------------------------------------
    | Copy Code
    |--------------------------------------------------------------------------
    */

    copyButtons() {
        $(document).on("click", ".btn-copy-code", function () {
            let code = $(this).closest(".card").find("pre code").text();

            navigator.clipboard.writeText(code);

            toastr.success("Code copied.");
        });
    },

    /*
    |--------------------------------------------------------------------------
    | Fullscreen
    |--------------------------------------------------------------------------
    */

    fullscreen() {
        $(document).on("click", ".btn-fullscreen-code", function () {
            let pre = $(this).closest(".card").find("pre");

            pre.toggleClass("repo-fullscreen");
        });
    },

    /*
    |--------------------------------------------------------------------------
    | Wrap
    |--------------------------------------------------------------------------
    */

    wrapCode() {
        $(document).on("click", ".btn-wrap-code", function () {
            let pre = $(this).closest(".card").find("pre");

            pre.toggleClass("text-wrap");
        });
    },

    /*
    |--------------------------------------------------------------------------
    | Theme
    |--------------------------------------------------------------------------
    */

    themeSwitcher() {
        $(document).on("click", ".btn-code-theme", function () {
            let theme = $("link#highlight-theme");

            let current = theme.attr("href");

            if (current.indexOf("github-dark") !== -1) {
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
};

/*
|--------------------------------------------------------------------------
| Auto Init
|--------------------------------------------------------------------------
*/

$(function () {
    RepositoryHighlight.initialize();
});
