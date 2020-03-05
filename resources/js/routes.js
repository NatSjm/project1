import Index from '../views/pages/index/index.vue';
import Orders from '../views/pages/orders/orders.vue';
import Purchases from '../views/pages/orders/purchases.vue';
import Cart from '../views/pages/cart/cart.vue';
import Search from '../views/pages/search/search.vue';
import Product from '../views/pages/product/product.vue';
import Enter from '../views/pages/enter/enter.vue';
import Person from '../views/pages/person/person.vue';
import ProductCreate from '../views/pages/product/product-create/product-create.vue';
import Seller from '../views/pages/seller/seller.vue';
import ProductUpdate from '../views/pages/product/product-update/product-update.vue';
import store from './store.js';

import VueRouterMiddleware,  { createMiddleware, middleware } from 'vue-router-middleware';


createMiddleware('require-auth', (args, to, from, next) => {

    if(store.getters['auth/authenticated'])
        next();
    else
        next({
            name: 'login',
        })

});
createMiddleware('check-permission', (args, to, from, next) => {

    if(store.getters['auth/authenticated'] && store.getters['auth/user'].id === to.params.id)

        next();
    else

        console.log('You have no permission for the operation');

        next(
            false
        )

});


export default [

    {
        path: '/',
        name: 'home',
        component: Index,
        meta: {
            breadcrumb: 'Главная'
        },

    },
    {
        path: '/enter',
        name: 'login',
        component: Enter,

    },
    {
        path: '/seller/:id',
        name: 'seller-page',
        component: Seller,
        props: true,
        meta: {
            breadcrumb: routeParameters => `${routeParameters.name}`
        }
    }, {
        path: '/cart',
        name: 'cart',
        component: Cart
    },
    {
        path: '/search',
        name: 'search-page',
        component: Search,
        props: (route) => route.query,
        // props: true,
        meta: {
            breadcrumb: 'Поиск'
        }
    },

    {
        path: '/product/:id',
        name: 'product-page',
        component: Product,
        props: true,
        beforeEnter(routeTo, routeFrom, next) {
            store.dispatch('getItemsForProduct', routeTo.params.id).then(() => {
                routeTo.params.propsTour = store.state.tour;
                next();
            })
        },

        meta: {
            breadcrumb: routeParameters => `${store.state.tour.name}`
        }
    },
    ...middleware('require-auth', [{
        path: '/orders/:id',
        name: 'orders-page',
        component: Orders,
        props: true,
        meta: {
            breadcrumb: 'Мои заказы'
        }
    },
    {
        path: '/purchases/:id',
        name: 'purchases-page',
        component: Purchases,
        props: true,
        meta: {
            breadcrumb: 'Мои покупки'
        }
    },
        ...middleware('check-permission', [
    {
        path: '/profile/:id/edit',
        name: 'person-page',
        props: true,
        component: Person,
        meta: {
            breadcrumb: 'Личные данные'
        }
    }]),
        {
            path: '/tour/:id/edit',
            name: 'product-edit-page',
            component: ProductUpdate,
            beforeEnter: (to, from, next) => {
                if (store.getters['auth/user'].id !== to.params.sellerId) {
                    console.log('wrong seller');
                    return next(false);
                }
                next();
            }
        },{
        path: '/tour/create',
        name: 'product-create-page',
        component: ProductCreate,
        meta: {
            breadcrumb: 'Новое объявление'
        },
        // beforeEnter: (to, from, next) => {
        //     if (!store.getters['auth/authenticated']) {
        //         return next({
        //             name: 'login'
        //         })
        //     }
        //     next();
        // }
    },]),
];
