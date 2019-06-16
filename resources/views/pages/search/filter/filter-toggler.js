var filter = $(".filter-wrapper");

$(".products-filter_toggler").click(function () {
    filter.show(600);
    $(this).hide();
});

$(".filter-close").click(function () {
    filter.hide(600);
    $(".products-filter_toggler").show();
});

$(window).resize(function () {
    var w = $(window).width();
    if (w > 1279 && filter.css('display') == 'none') {
        filter.css('display', 'block');
    }
});
