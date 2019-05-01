$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//$('body').css('background-color','red');

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
    })
});
