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
            page: 1,
            searchpage: true


        };
    },
    methods: {
        sendSearchRequest() {
            let payload = {
                params: {
                    country: this.country,
                    hotel: this.hotel,
                    tour_type: this.tour_type,
                    nutrition: this.nutrition,
                    category: this.category,
                    price: this.price,
                    children_accessibility: this.children_accessibility,
                    recommended: this.recommended ? 1 : '',
                    hot: this.hot ? 1 : '',
                    page: this.page,
                }
            };
            this.$store.dispatch('getItemsForSearch', payload);
        },


        filterReset() {
            this.country = null;
            this.hotel = null;
            this.tour_type = null;
            this.nutrition = null;
            this.category = null;
            this.price = null;
            this.children_accessibility = null;
            this.recommended = null;
            this.hot = null;
            this.page = 1;
            this.sendSearchRequest();
        },

        changepage(page) {
            this.page = page;
            this.sendSearchRequest();
        },

        filterResults() {
            this.page = 1;
            this.sendSearchRequest();
            this.searchpage = !this.searchpage;
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
            'paginator'
        ])
    },


    mounted() {


    },
}

