<template>
    <section class="main-banner">
            <!-- swiper -->
            <swiper :options="swiperOption">

                <swiper-slide v-for="tour in sliderTours" v-bind:key="tour.id">
                    <div class="swiper-slide">
                        <img class="product-card_img" v-bind:src="'/storage/images/' + tour.main_img.path " alt="">
                        <div class="main-banner_text-block">
                            <h2 class="main-banner_title">{{tour.name}}</h2>
                            <h3 class="main-banner_description">Вся роскошь востока</h3>
                            <router-link class="main-banner_link button" to="/product">
                               Перейти к туру
                            </router-link>
                        </div>
                    </div>
                    </swiper-slide>
            </swiper>
    </section>
</template>

<script>
    export default {
        props: ['sliderTours'],
        data() {
            return {
                swiperOption: {
                    spaceBetween: 0,

                    // centeredSlides: true,
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: false
                    },



                }
            }
        }
    }
</script>

<style scoped>

</style>
