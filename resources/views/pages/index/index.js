// import Swiper from 'Swiper';
import { mapGetters } from 'vuex'

export default {


    data() {
        return {
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
        this.$store.dispatch('getToursForIndex');
    },

    computed: {
        ...mapGetters([
            'hotTours',
            'allTourTypes',
            'recommendedTours',
            'sliderTours',
            'hotToursCount',
            'recommendedToursCount'
        ])

        // hotTours() {
        //    return this.$store.getters.getHotTours;
        // },
        // allTourTypes() {
        //     return this.$store.getters.getAllTourTypes;
        // },
        // recommendedTours() {
        //     return this.$store.getters.getRecomendedTours;
        // },
        // sliderTours() {
        //     return this.$store.getters.getSliderTours;
        // }
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



