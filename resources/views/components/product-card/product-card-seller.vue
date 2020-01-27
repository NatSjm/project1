<template>
    <article class="product-card seller_view">
        <header class="product-card_header">
            <router-link class="product-card_link" :to="{name:'product-page', params: {id: tour.id,
                }}">
                <img class="product-card_img" v-bind:src="'/storage/images/' + tour.mainImg " alt="">
                <div class="product-card_mask">
                    <div class="edit-icons">
                        <router-link :to="{name:'product-edit-page', params: {id: tour.id}}">
                            <div>
                                <svg class="edit-icon" viewBox="0 0 14 13.932">
                                    <use xlink:href="#pencil"></use>
                                </svg>
                            </div>
                        </router-link>


                                <div @click.prevent="deleteProduct">
                                    <svg class="delete-icon" viewBox="0 0  12 15.182 ">
                                        <use xlink:href="#rubish-bin"></use>
                                    </svg>
                                </div>


                    </div>
                </div>
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
            <router-link class="product-card_link" :to="{name:'product-page', params: {id: tour.id
               }}">
                <h3 class="product-card_title headline-3">
                    {{tour.shortCountryName }} ({{tour.name}})</h3>
            </router-link>
            <h4 class="product-card_description headline-4">Вылет из
                {{tour.startLocationCity}}</h4>

            <a href="#" @click.prevent="" class="button mod_color-light-green">Заказать</a>
        </div>

    </article>

</template>

<script>
    import {mapState, mapGetters, mapActions} from 'vuex';
    export default {
        props: ['tour'],
        methods: {
            deleteProduct(){
                axios.delete('api/tour/'+ this.tour.id).then(() => {
                    this.$router.go(0);
                })
            }
        },
        computed: {
            ...mapGetters({
                user: 'auth/user',
            })
        },



    }
</script>

<style scoped>

</style>
