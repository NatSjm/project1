<template>
    <tbody>
    <tr class="order  js_order-details-switcher mod_color-light-milk" @click='showOrderDetails' v-bind:class="{
        'mod_opened':
        orderTabToggler }">
        <td class="order_number">{{ deal.id }}</td>
        <td class="order_date">{{ deal.created_at }}
            <svg class="order_switcher-icon js_details-switcher mod_mobile">
                <use xlink:href="#selector"></use>
            </svg>
        </td>

        <td class="order_byer-link">
            <router-link class="link" :to="{name:'seller-page', params: {id: deal.buyer.id,
                name: deal.buyer.last_name}}">
                {{deal.buyer.first_name}} {{deal.buyer
                .last_name}}
            </router-link>
        </td>


        <td class="order_details-switcher js_details-switcher"><span>Подробности</span>
            <svg class="order_switcher-icon mod_desctop">
                <use xlink:href="#selector"></use>
            </svg>
        </td>
    </tr>
    <tr class="order_details">
        <td class="order_items" colspan="4">
            <div v-if="orderTabToggler" class="order_items-wrapper">
                <order-item v-for="order in deal.orders" :key="order.id" :tour="order.tour"></order-item>
            </div>
        </td>
    </tr>
    </tbody>

</template>

<script>
    import OrderItem from './order-item/order-item.vue'

    export default {
        data() {
            return {

            }
        },
        props: [
            'deal',
            'index',
            'orderTabToggler',
        ],
        watch: {

            orderToggler: function () {
                //this.orderTabToggler = this.orderToggler;

            }
        },
        components: {
            OrderItem,
        },
        methods: {
            showOrderDetails() {
                this.$emit('toggleOpen', this.index);
            }
        },
    }
</script>
<style scoped>
    .order_items-wrapper {
        display: block;
    }
</style>




