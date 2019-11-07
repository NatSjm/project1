import Swiper from 'Swiper';

export default {


    data() {
        return {
            hotTours: [],
            AllTourTypes: [],
            recommendedTours: [],
            sliderTours: [],
            toggle: false,
            aboutHeight: 0,
            newHeight: 400,
        };
    },
    methods: {
        aboutHeightChange: function () {
            this.toggle = true;
            this.newHeight = this.aboutHeight;
        }

    },

    created() {
        axios.get('/api/index').then((response) => {
            this.hotTours = response.data.hotTours;
            this.AllTourTypes = response.data.AllTourTypes;
            this.recommendedTours = response.data.recommendedTours;
            this.sliderTours = response.data.sliderTours;
        });
    },
    beforeDestroy() {

    },


    mounted() {
        this.aboutHeight = this.$refs.about.scrollHeight;

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



