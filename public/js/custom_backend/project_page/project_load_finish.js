$(window).on("load", function () {
    $("#loaderPercent").text("100%");

    $(".loader-progress").css(
        "background",
        "conic-gradient(#28a745 360deg,#e9ecef 0deg)",
    );

    setTimeout(function () {
        $("#projectLoadingModal").fadeOut(500);
    }, 5000); // Keep it visible for 5 seconds
});
