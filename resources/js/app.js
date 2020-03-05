/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vuex from 'vuex'


$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    require('./../views/sections/header/header');


    require('./index');


    if ($("body").hasClass("index")) {
        // require('./../views/pages/index/index');
    } else if ($("body").hasClass("product-page")) {
        //  require('./../views/pages/product/product');
    } else if ($("body").hasClass("search-page")) {
        // require('./../views/pages/search/filter/filter');
    } else if ($("body").hasClass("cart-page")) {
        // require('./../views/pages/cart/cart');
    } else if ($("body").hasClass("orders-page") || $("body").hasClass("purchases-page")) {
        // require('./../views/pages/orders/order/order');
    } else if ($("body").hasClass("seller-page")) {
        require('./../views/pages/seller/seller');
    } else if ($("body").hasClass("product-create-page") || $("body").hasClass("product-edit-page")) {
        require('./../views/pages/product/product-create/product-create');
    } else if ($("body").hasClass("person-page")) {
        require('./../views/pages/person/person');
    }
});
//

// window.Vue = require('vue');
import VueRouter from 'vue-router';
import Vue from 'vue';
import routes from './routes';
import VueBreadcrumbs from 'vue-2-breadcrumbs';
import VueRouterMiddleware from 'vue-router-middleware';



import Paginate from 'vuejs-paginate'

Vue.component('paginate', Paginate);


import ProductCard from '../views/components/product-card/product-card.vue';

Vue.component('product-card', ProductCard);

import PictogramLine from '../views/components/pictogram-line/pictogram-line.vue';

Vue.component('pictogram-line', PictogramLine);

import Header from '../views/sections/header/header-component.vue';

Vue.component('header-component', Header);

import HeaderMobile from '../views/sections/header/header_mobile_opened/header-mobile.vue';

Vue.component('header-mobile', HeaderMobile);

import Logo from '../views/components/logo/logo.vue';

Vue.component('logo', Logo);

import UserUnauthorized from '../views/components/user-block/user_unauthorized/user-unauthorized.vue';

Vue.component('user-unauthorized', UserUnauthorized);

import UserAuthorized from '../views/components/user-block/user_authorized/user-authorized.vue';

Vue.component('user-authorized', UserAuthorized);

import Popup from '../views/components/popup/popup.vue';

Vue.component('popup', Popup);


import HeaderCart from '../views/components/cart/cart.vue';

Vue.component('header-cart', HeaderCart);

import Footer from '../views/sections/footer/footer-component.vue';

Vue.component('footer-component', Footer);

import Products from '../views/sections/products/products.vue';

Vue.component('products', Products);


import VueAwesomeSwiper from 'vue-awesome-swiper';

// require styles
// import 'swiper/dist/css/swiper.css';

Vue.use(VueAwesomeSwiper /* { default global options } */);


import Carusel from '../views/components/swiper/carusel.vue';

Vue.component('carusel', Carusel);

import Vuelidate from 'vuelidate';
Vue.use(Vuelidate);


Vue.use(VueRouter);
Vue.use(VueBreadcrumbs, {
    template:
        '        <nav v-if="$breadcrumbs.length" aria-label="breadcrumb">\n' +
        '            <ul class="breadcrumbs">\n' +
        '      <li  class="breadcrumbs_item">\n' +
        '                    <router-link to="/">Главная</router-link>' +
        '                    </li>\n' +
        '                <li v-for="(crumb, key) in $breadcrumbs" v-if="crumb.meta.breadcrumb" :key="key"' +
        '                class="breadcrumbs_item" aria-current="mod_current">\n' +
        '                    <router-link :to="{ path: getPath(crumb) }">{{ getBreadcrumb(crumb.meta.breadcrumb) }}</router-link>' +
        '                </li>\n' +
        '            </ul>\n' +
        '        </nav>'
});


const router = new VueRouter({
    routes
});
router.afterEach((to, from) => {
    document.body.className = to.name;
});


Vue.use(Vuex);
import store from './store.js'

// import state from './vuex/state.js';
// import mutations from './vuex/mutations.js';
// import getters from './vuex/getters.js';
// import actions from './vuex/actions.js';
// import cart from './vuex/modules/cart.js';
//
//  const store = new Vuex.Store({
//     state,
//     mutations,
//     getters,
//     actions,
//     modules: {
//         cart,
//     },
//
// });
require('./vuex/subscriber');
Vue.use(VueRouterMiddleware, { router })
store.dispatch('auth/attempt', localStorage.getItem('token')).then(()=>{
    const app = new Vue({
        router,
        store,
        data: {},
        methods: {},

        created() {

            this.$store.dispatch('getCategories');

            // axios.get('/indexcat').then((response) => {
            //     this.AllCategories = response.data.AllCategories;
            // });

        },
    }).$mount('#app');
});






//
// /**
//  * The following block of code may be used to automatically register your
//  * Vue components. It will recursively scan this directory for the Vue
//  * components and automatically register them with their "basename".
//  *
//  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
//  */
//
// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))
//
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
//
// const app = new Vue({
//     el: '#app'
// });


