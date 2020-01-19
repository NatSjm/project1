export default {
    getToursForIndex(store) {
        axios.get('/api/index').then((response) => {
            store.commit('setHotTours', response.data.hotTours);
            store.commit('setRecommendedTours', response.data.recommendedTours);
            store.commit('setSliderTours', response.data.sliderTours);
        });
    },

    getCategories(store) {
        axios.get('/indexcat').then((response) => {
            store.commit('setAllCategories', response.data.AllCategories);
            store.commit('setAllCountryNames', response.data.AllCountryNames);
            store.commit('setAllHotels', response.data.AllHotels);
            store.commit('setAllNutritionTypes', response.data.AllNutritionTypes);
            store.commit('setAllLocations', response.data.AllLocations);
            store.commit('setAllTourTypes', response.data.AllTourTypes);
        });
    },

    getItemsForSearch(store, payload) {
        axios.get('/api/search', payload).then((response) => {
            store.commit('setPrices', response.data.prices);
            store.commit('setSearchTours', response.data.searchTours.tours);
            store.commit('setPaginator', {
                total: response.data.searchTours.total,
                last_page: response.data.searchTours.lastPage,
                current_page: response.data.searchTours.currentPage,
            });
        });
    },

    getItemsForProduct(store, id) {
        return axios.get('/api/product/' + id).then((response) => {
            store.commit('setTour', response.data.tour);
        });
    },

    getItemsForSeller(store, payload) {
        axios.get('/api/seller/' + payload.id, payload).then((response) => {
            store.commit('setPersonTours', response.data.data.tours);
            store.commit('setPaginator', {
                total: response.data.meta.total,
                last_page: response.data.meta.last_page,
                current_page: response.data.meta.current_page,
            });
        });
    },


    getOrders(store, id) {
        axios.get('/api/orders/' + id).then((response) => {
            var personOrders = response.data.deals.map(function (deal) {
                deal.opened = false;
                return deal;
            });
            store.commit('setPersonOrders', personOrders);
        });
    },
    getPurchases(store, id) {
        axios.get('/api/purchases/' + id).then((response) => {
            var personPurchases = response.data.deals.map(function (deal) {
                deal.opened = false;
                return deal;
            });
            store.commit('setPersonPurchases', personPurchases);
        });
    },




}
