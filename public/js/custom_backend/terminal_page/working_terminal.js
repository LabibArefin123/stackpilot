$(function () {
    $(".method-card").click(function () {
        $(".method-card").removeClass("border-success shadow");

        $(this).addClass("border-success shadow");

        let method = $(this).data("method");

        if (method == "local") {
            $("#localSection").slideDown();

            $("#liveSection").hide();

            $("#terminalSection").slideDown();
        } else {
            $("#liveSection").slideDown();

            $("#localSection").hide();

            $("#terminalSection").slideDown();
        }
    });
});
