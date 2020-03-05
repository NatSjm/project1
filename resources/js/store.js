import Vuex from 'vuex';
Vue.use(Vuex);

import state from './vuex/state.js';
import mutations from './vuex/mutations.js';
import getters from './vuex/getters.js';
import actions from './vuex/actions.js';
import cart from './vuex/modules/cart.js';
import auth from './vuex/modules/auth.js';
import createPersistedState from "vuex-persistedstate";
import Vue from "vue";

const store = new Vuex.Store({
    state,
    mutations,
    getters,
    actions,
    modules: {
        cart,
        auth
    },
    plugins: [createPersistedState()],

});
export default store;
