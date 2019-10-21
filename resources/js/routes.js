import Index from '../views/pages/index/index.vue';
import Orders from '../views/pages/orders/orders.vue';

export default [
    {
        path: '/',
        name: 'home',
        component: Index
    }, {
        path: '/orders',
        name: 'orders',
        component: Orders
    }
];
