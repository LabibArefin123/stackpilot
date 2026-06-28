"use strict";

/*
|--------------------------------------------------------------------------
| Repository Navigation
|--------------------------------------------------------------------------
*/

window.RepositoryNavigation = {
    initialize() {
        this.expand();

        this.scrollTop();
    },

    expand() {
        $(document).on("click", ".btn-expand", function () {
            $(this)
                .closest(".repository-card")
                .find(".card-body")
                .slideToggle(200);
        });
    },

    scrollTop() {
        $(".btn-scroll-top").click(function () {
            $("html,body").animate(
                {
                    scrollTop: 0,
                },
                400,
            );
        });
    },
};

$(function () {
    RepositoryNavigation.initialize();
});
