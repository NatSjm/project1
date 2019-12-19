<template>
        <div class="orders-page_container cont">

            <h2 class="headline-2 orders-page_title">Мои заказы</h2>

            <section v-if="deals" class="orders-page_orders mod_border-grey">
                <table class="orders table">
                    <!--<order v-on:closeotherorders="closeTabs"-->
                           <order
                           v-for="(deal, i) in deals"
                           :index="i"
                           :key="i"
                           :deal="deal"
                           :order-tab-toggler="deal.opened"
                           @toggleOpen="toggleOpen">
                    </order>
                </table>
            </section>


        </div>
</template>
<script type="text/javascript">
    import {mapGetters} from 'vuex';
    import Order from './order/order.vue'

    export default {
        data() {
            return {

            }
        },
        methods: {
            toggleOpen: function(index){
                let newDeals = this.deals.map((deal, i) =>{
                    if (index === i) {
                        deal.opened = !deal.opened;
                    } else {
                        deal.opened = false;
                    }
                    return deal;
                });
                this.deals = newDeals;
            }
        },

        created() {
            this.$store.dispatch('getOrders', this.$route.params.id);
        },

        mounted(){

        },

        components: {
            Order,
        },

        computed: {
            ...mapGetters([
            'personOrders']),
            deals: {
                get(){
                    return this.personOrders;
                },
                set(newDeals){
                    return newDeals;
                }
            }
        },
    }
    </script>


