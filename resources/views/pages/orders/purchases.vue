<template>


    <div class="orders-page_container cont">
        <breadcrumbs class="orders-page_breadcrumbs"></breadcrumbs>
        <h2 class="headline-2 orders-page_title">Мои покупки</h2>

        <section v-if="deals" class="orders-page_orders mod_border-grey">
            <table class="orders table">
                <!--<order v-on:closeotherorders="closeTabs"-->
                <order v-for="(deal, i) in deals"
                       :index="i"
                       :key="i"
                       :deal="deal"
                       :mode="mode"
                       :order-tab-toggler="deal.opened"
                       @toggleOpen="toggleOpen">
                </order>
            </table>
        </section>


    </div>

</template>

<script>
    import {mapGetters} from 'vuex';
    import Order from './order/order.vue'

    export default {
        data() {
            return {
                mode: "purchases"
            }
        },
        methods: {
            toggleOpen: function (index) {
                let newDeals = this.deals.map((deal, i) => {
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
            this.$store.dispatch('getPurchases', this.$route.params.id)
        },

        mounted() {

        },

        components: {
            Order,
        },

        computed: {
            ...mapGetters([
                'personPurchases']),
            deals: {
                get() {
                    return this.personPurchases;
                },
                set(newDeals) {
                    return newDeals;
                }
            }
        },
    }

</script>

<style scoped>

</style>
