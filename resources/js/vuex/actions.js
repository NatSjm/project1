export default {
    getToursForIndex(store) {
        axios.get('/api/index').then((response) => {
            store.commit('setHotTours', response.data.hotTours);
            store.commit('setAllTourTypes', response.data.AllTourTypes);
            store.commit('setRecommendedTours', response.data.recommendedTours);
            store.commit('setSliderTours', response.data.sliderTours);
        });
    }
}
