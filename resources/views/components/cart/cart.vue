<template>
    <div class="cart">
        <router-link class="cart_link" to="/cart">
            <svg class="cart_icon" viewBox="0 0 12 12">
                <use xlink:href="#shopping-cart"></use>
            </svg>
            <span>Корзина</span> <span class="cart_price">
             <span class="cart_price">{{total}}</span>
         </span>
        </router-link>
    </div>

</template>

<script>
    import {mapState, mapGetters, mapActions} from 'vuex';

    export default {
        computed: {
            ...mapGetters('cart', {
                total: 'cartTotal',
            }),
        }
    }
</script>

<style scoped>

</style>
