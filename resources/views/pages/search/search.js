import {mapGetters} from 'vuex'
import FilterTag from './filter/filter-tag.vue';

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
            sorter: null,
            page: 1,
            searchpage: true,
            filterToggler: false,
            filterList: [],
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
                    sorter: this.sorter,
                    recommended: this.recommended ? 1 : '',
                    hot: this.hot ? 1 : '',
                    page: this.page,
                }
            };
            this.$store.dispatch('getItemsForSearch', payload);
            this.renderFilterList(payload.params);
        },

        filterToggle() {
            this.filterToggler = !this.filterToggler;
        },

        renderFilterList(params) {
            if (params.recommended == 1) {
                params.recommended = "рекомендованные";
            }
            if (params.hot == 1) {
                params.hot = "горячие";
            }

            let filterList = Object.entries(params);
            filterList.pop();
            this.filterList = filterList.filter(function (el) {
                return el[1];
            });

        },

        resetFromList(param) {
            this[param] = null;
            this.filterResults();
        },

        windowResizeHandler() {
            let w = window.innerWidth;
            if (w > 1279 && this.filterToggler === false) {
                this.filterToggler = true;
            }
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
    components: {
        FilterTag,
    },


    mounted() {
        let w = window.innerWidth;
        if (w > 1279 && this.filterToggler === false) {
            this.filterToggler = true;
        }
        window.addEventListener('resize', this.windowResizeHandler);
    },
}

