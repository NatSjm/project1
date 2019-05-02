$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//menu

let addition = $(".additional-block");
$(document).ready(function(){
    $(".hamburger").click(function (e) {
        e.preventDefault();
        $(this).toggleClass("is-active");
        addition.slideToggle(500);
    });


// swiper
    var mySwiper = new Swiper ('.swiper-container', {
        autoplay: {
            delay: 3000,
            disableOnInteraction: false
        },

        loop: true
    });


//filter

    $(".products-filter_toggler").click(function(){
        $(".filter-wrapper").show(600);
        $(this).hide();
    });

    $(".filter-close").click(function(){
        $(".filter-wrapper").hide(600);
        $(".products-filter_toggler").show();
    });
});


