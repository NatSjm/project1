export default {
    getToursForIndex(store) {
        axios.get('/api/index').then((response) => {
            store.commit('setHotTours', response.data.hotTours.tours);
            store.commit('setRecommendedTours', response.data.recommendedTours.tours);
            store.commit('setSliderTours', response.data.sliderTours.tours);
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

    getItemsForSearch(store) {
        axios.get('/api/search').then((response) => {
            store.commit('setPrices', response.data.prices);
            store.commit('setSearchTours', response.data.searchTours.tours)
        });
    },




}
