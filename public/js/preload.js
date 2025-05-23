/** @format */

$(window).on("load", function () {
    $("#loader-overlay").delay(800).fadeOut();
    $(".loader").delay(500).fadeOut("slow");

    $(window).trigger("scroll");
    $(window).trigger("resize");

    if (window.location.hash) {
        var hash_offset = $(window.location.hash).offset().top;
        $("html, body").animate({
            scrollTop: hash_offset,
        });
    }
});
