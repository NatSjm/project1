export default {
    setHotTours(state, tours) {
        state.hotTours = tours;
    },
    setAllTourTypes(state, tours) {
        state.allTourTypes = tours;
    },
    setRecommendedTours(state, tours) {
        state.recommendedTours = tours;
    },
    setSliderTours(state, tours) {
        state.sliderTours = tours;
    },
    setHotToursCount(state, count) {
        state.hotToursCount = count;
    },
    setRecommendedToursCount(state, count) {
        state.recommendedToursCount = count;
    },

    setAllCategories(state, categories) {
        state.allCategories = categories;
    },
    setAllHotels(state, hotels) {
        state.allHotels = hotels;
    },
    setAllCountryNames(state, countries) {
        state.allCountryNames = countries;
    },

    setAllNutritionTypes(state, nutritions) {
        state.allNutritionTypes = nutritions;
    },

    setAllLocations(state, locations) {
        state.allLocations = locations;
    },

    setPrices(state, prices) {
        state.prices = prices;
    },
    setSearchTours(state, tours) {
        state.searchTours = tours;
    },

    setTour(state, tour) {
        state.tour = tour;
    },
    setPersonTours(state, tours) {
        state.personTours = tours;
    },

    setPersonOrders(state, orders) {
        state.personOrders = orders;
    },
    setPersonPurchases(state, orders) {
        state.personPurchases = orders;
    },

    setPaginator(state, paginator) {
        state.paginator = paginator;
    },
}
