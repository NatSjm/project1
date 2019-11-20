<template>
    <div>
        <article class="product-card">

            <header class="product-card_header">

                <router-link class="product-card_link" to="/product">
                    <img class="product-card_img" v-bind:src="'/storage/images/' + tour.mainImg " alt="">
                </router-link>

                <div class="product-card_info">
                    <div class="product-card_conditions">
                        <svg class="product-card_icon" viewBox="0 0 14 13">
                            <use v-bind:xlink:href="'#' + tour.tourTypeIcon "></use>
                        </svg>
                        <span class="product-card_term">{{tour.length}} дней/{{tour.length + 1}}
                            ночей {{tour.hotelClass}}*</span>
                    </div>
                    <div class="product-card_price">
                        <span>{{tour.price.toLocaleString()}} &#8383;</span>
                    </div>

                </div>

            </header>
            <div class="delimiter mod_color-light-green"></div>
            <div class="product-card_main">
                <router-link class="product-card_link" to="/product">
                    <h3 class="product-card_title headline-3">
                        {{tour.shortCountryName }} ({{tour.name}})</h3>
                </router-link>

                <h4 class="product-card_description headline-4">Вылет из
                    {{tour.startLocationCity}}</h4>

                <a href="#"  @click.prevent="addProductToCart(tour)" class="button mod_color-light-green">Заказать</a>
            </div>
        </article>
    </div>
</template>
<script type="text/javascript">
    import {mapState, mapGetters, mapActions} from 'vuex';
    export default {
        props: ['tour'],
        data() {
            return {};

        },
        methods: {
            ...mapActions({
                addProductToCart: 'cart/addProductToCart'
            })
        },

        computed: {

            //
            // length: function () {
            //     let finish = new Date(this.tour.finish_at),
            //         start = new Date(this.tour.start_at);
            //     return Math.ceil((finish - start) / (60 * 60 * 24 * 1000));
            //
            // }
        }
    }
</script>
