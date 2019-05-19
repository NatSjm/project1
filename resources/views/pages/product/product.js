import Swiper from 'Swiper';

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
