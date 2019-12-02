import Index from '../views/pages/index/index.vue';
import Orders from '../views/pages/orders/orders.vue';
import Cart from '../views/pages/cart/cart.vue';
import Search from '../views/pages/search/search.vue';
import Product from '../views/pages/product/product.vue';
import Enter from '../views/pages/enter/enter.vue';
import ProductCreate from '../views/pages/product/product-create/product-create.vue';


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
        name: 'search-page',
        component: Search
    }, {
        path: '/product/:id',
        name: 'product-page',
        component: Product,
        props: true,
    }, {
        path: '/enter',
        name: 'enter',
        component: Enter
    }, {
        path: '/tour/create',
        name: 'product-create-page',
        component: ProductCreate
    },
];
