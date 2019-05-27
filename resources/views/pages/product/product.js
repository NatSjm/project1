import Swiper from 'Swiper';


function  sliderResiser() {
    if (window.matchMedia("screen and (min-width: 1280px)").matches) {

        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 4,
            loop: true,
            freeMode: true,
            loopedSlides: 5, //looped slides should be the same
            watchSlidesVisibility: true,
            watchSlidesProgress: true,

        });
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 10,
            loop:true,
            loopedSlides: 5,
            //looped slides should be the same

            thumbs: {
                swiper: galleryThumbs,

            },
        });

    } else {


        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 'auto',
            spaceBetween: 20,
            centeredSlides: true,


            autoplay: {
                delay: 3000,
                disableOnInteraction: false
            },

            loop: true
        });

    }
}
sliderResiser();
$(window).resize(sliderResiser);
