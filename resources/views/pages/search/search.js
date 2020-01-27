import {mapGetters} from 'vuex'
import FilterTag from './filter/filter-tag.vue';

export default {
    data() {
        return {
            search: null,
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
    props: ['routeParamsCategory',
        'routeParamsSearch',
        'routeParamsTourType',
        'routeParamsHot',
        'routeParamsRecommended'],

    methods: {
        sendSearchRequest() {
            let payload = {
                params: {
                    search: this.search,
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
            let clone = Object.assign({}, params);

            if (clone.recommended) {
                clone.recommended = "рекомендованные";
            }
            if (clone.hot) {
                clone.hot = "горящие";
            }
            let filterList = Object.entries(clone);
            // to remove the page number from the rendered list
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

        resetData() {
            this.search = null;
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
        },


        filterReset() {
            this.resetData();
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
    beforeRouteUpdate(to, from, next) {
        this.resetData();
        this.category = to.query.routeParamsCategory;
        this.search = to.query.routeParamsSearch;
        this.sendSearchRequest();
        next();
    },

    created() {
        this.category = this.routeParamsCategory;
        this.search = this.routeParamsSearch;
        this.tour_type = this.routeParamsTourType;
        this.hot = this.routeParamsHot;
        this.recommended = this.routeParamsRecommended;
        this.sendSearchRequest();
    },
//
//     watch: {
//         '$route' : {
//             deep: true,
//             immediate: true,
//             handler : function (to, from) {
//                 console.log('hello');
//             this.category = to.params.routeParamsCategory;
//                 this. sendSearchRequest();
//         }
//     },
// },


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

