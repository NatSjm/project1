export default {
    getToursForIndex(store) {
        axios.get('/api/index').then((response) => {
            store.commit('setHotTours', response.data.hotTours.tours);
            store.commit('setAllTourTypes', response.data.AllTourTypes);
            store.commit('setRecommendedTours', response.data.recommendedTours.tours);
            store.commit('setSliderTours', response.data.sliderTours.tours);
        });
    },

    getCategories(store) {
        axios.get('/indexcat').then((response) => {
            store.commit('setAllCategories', response.data.AllCategories);
        });
    }
}
