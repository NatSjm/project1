import Index from '../views/pages/index/index.vue';
import Orders from '../views/pages/orders/orders.vue';
import Cart from '../views/pages/cart/cart.vue';
import Search from '../views/pages/search/search.vue';
import Product from '../views/pages/product/product.vue';


export default [
    {
        path: '/',
        name: 'home',
        component: Index
    }, {
        path: '/orders',
        name: 'orders',
        component: Orders
    }, {
        path: '/cart',
        name: 'cart',
        component: Cart
    }, {
        path: '/search',
        name: 'search',
        component: Search
    }, {
        path: '/product',
        name: 'product',
        component: Product
    },



];
