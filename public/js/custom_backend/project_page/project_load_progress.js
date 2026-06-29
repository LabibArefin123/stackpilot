$(function () {
    let percent = 0;

    const timer = setInterval(function () {
        if (percent < 95) {
            percent++;

            $("#loaderPercent").text(percent + "%");

            $(".loader-progress").css(
                "background",
                "conic-gradient(#28a745 " + percent * 3.6 + "deg,#e9ecef 0deg)",
            );
        } else {
            clearInterval(timer);
        }
    }, 40);
});
