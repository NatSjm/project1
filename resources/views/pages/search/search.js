import Swiper from 'Swiper';
import {mapGetters} from 'vuex'

export default {


    data() {
        return {
            country: null,
            hotel: null,
            tour_type: null,
            nutrition: null,
            category: null,
            price: null,
            children_accessibility: null,
            recommended: null,
            hot: null,


        };
    },
    methods: {
        sendSearchRequest() {
            axios.get('/api/search', {
                params: {
                    country: this.country,
                    hotel: this.hotel,
                    tour_type: this.tour_type,
                    nutrition: this.nutrition,
                    category: this.category,
                    price: this.price,
                    children_accessibility: this.children_accessibility,
                    recommended: this.recommended? 1 : '' ,
                    hot: this.hot? 1 : '',
                }
            })
                .then(response => {
                    this.$store.commit('setSearchTours', response.data.searchTours.tours);
                })
        },
        filterReset(){
                this.country = null;
                this.hotel = null;
                this.tour_type = null;
                this. nutrition = null;
                this.category = null;
                this.price = null;
                this.children_accessibility = null;
                this.recommended = null;
                this.hot = null;

                this.sendSearchRequest();
        }
    },

    created() {

        this.$store.dispatch('getItemsForSearch');
    },

    computed: {
        ...mapGetters([
            'allCountryNames',
            'allHotels',
            'allNutritionTypes',
            'allCategories',
            'allTourTypes',
            'allLocations',
            'prices',
            'searchTours',
        ])
    },


    mounted() {


    },
}

