$(function () {
    let degree = 0;

    setInterval(function () {
        degree += 6;

        $(".loader-circle").css("transform", "rotate(" + degree + "deg)");
    }, 16);
});
