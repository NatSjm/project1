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



    //about_button

    $(".about_button").click(function(e){
        e.preventDefault();
        $(this).css("display", "none");

        let newHeight = $(".about_info")[0].scrollHeight;
        $(".about_info").addClass("mod_full-size").height(newHeight);
    });



//swiper
    if($("body").hasClass("index")) {
        var mySwiper = new Swiper('.swiper-container', {
            autoplay: {
                delay: 3000,
                disableOnInteraction: false
            },

            loop: true
        });
    }

//filter

    var filter = $(".filter-wrapper");

    $(".products-filter_toggler").click(function(){
        filter.show(600);
        $(this).hide();
    });

    $(".filter-close").click(function(){
        filter.hide(600);
        $(".products-filter_toggler").show();
    });

    $(window).resize(function(){
        var w = $(window).width();
        if(w > 1279 && filter.css('display')=='none') {
            filter.css('display', 'block');
        }
    });


});


