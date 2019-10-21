import Swiper from 'Swiper';

export default {
    data() {
        return {
            hotTours: []
        };
    },
    created() {
        axios.get('/api/index').then((response) => {
            this.hotTours = response.data.hotTours;
        });
    },
    mounted() {
        // var mySwiper = new Swiper('.swiper-container', {
        //     autoplay: {
        //         delay: 3000,
        //         disableOnInteraction: false
        //     },
        //
        //     loop: true
        // });
        //

        // $(".about_button").click(function (e) {
        //     e.preventDefault();
        //     $(this).css("display", "none");
        //
        //     let newHeight = $(".about_info")[0].scrollHeight;
        //     $(".about_info").addClass("mod_full-size").height(newHeight);
        // });
    },
}



