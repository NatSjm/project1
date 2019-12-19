<template>

    <div>
        <breadcrumbs/>
        <h2 class="headline-2 product-page_title cont">{{ tour.name }} {{tour.hotelClass}} *</h2>
        <section class="product-page_main">
            <div class="product">
                <div v-if="tour.medias!=undefined && tour.medias.length > 0" class="product_slider mod_mobile">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div v-for="media in tour.medias" class="swiper-slide">
                                <img class="product_img" :src="'/storage/images/'+ media.path"
                                     :alt="media.name">
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="tour.medias!=undefined && tour.medias.length > 0" class="product_slider  mod_desctop">
                    <div class="swiper-container gallery-top">
                        <div class="swiper-wrapper">
                            <div v-for="media in tour.medias" class="swiper-slide"
                                 :style="'background-image:url(/storage/images/' + media.path+')'"></div>
                        </div>
                    </div>
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                            <div v-for="media in tour.medias" class="swiper-slide"
                                 :style="'background-image:url(/storage/images/'+ media.path + ')'"></div>
                        </div>
                    </div>
                </div>


                <div class="product_info mod_cont-mobile">
                    <div class="purchase mod_border-grey">
                        <div class="purchase_price"><span> {{Number(tour.price).toLocaleString()}} &#8383</span></div>
                        <div class="purchase_buy-button">
                            <a href="#" @click.prevent="addProductToCart(tour)"
                               class="button mod_color-med-blue"> В корзину</a>
                        </div>
                    </div>

                    <div class="tags mod_border-grey">
                        <div class="tags_item">
                            <div class="tag mod_seller">
                                <img class="tag_avatar" v-bind:src="'/storage/' + tour.sellerAvatar " alt="">
                                <h4 class="headline-4 tag_title">Продавец</h4>
                                <span>{{tour.sellerName}}</span>
                            </div>
                        </div>

                        <div class="tags_item">
                            <div class="tag">
                                <h4 class="headline-4 tag_title">Страна</h4>
                                <span>{{tour.shortCountryName}}</span>
                            </div>
                        </div>

                        <div class="tags_item">
                            <div class="tag">
                                <h4 class="headline-4 tag_title">Питание</h4>
                                <span>{{tour.nutrition}}</span>
                            </div>
                        </div>

                        <div class="tags_item">
                            <div class="tag">
                                <h4 class="headline-4 tag_title">Доступно детям</h4>
                                <span>{{tour.for_children}}</span>
                            </div>
                        </div>

                        <div class="tags_item">
                            <div class="tag">
                                <h4 class="headline-4 tag_title">Класс отеля</h4>
                                <span>{{tour.hotelClass}}<sup>*</sup></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product_description mod_cont-mobile mod_border-grey">
                    <div class="categories">
                        <div class="categories_button">
                            <button class="button mod_green-bordered">{{tour.tourTypeName}}</button>
                        </div>
                        <div class="categories_button">
                            <button class="button mod_green-bordered">{{tour.category}}</button>
                        </div>
                    </div>
                    <div class="description text  mod_normal">
                        <p>
                            {{tour.description}}
                        </p>
                    </div>

                </div>
            </div>

        </section>
        <section class="product-page_revews cont">

            <div class="revews">
                <h2 class=" revews_title headline-2">Отзывы</h2>
                <div class="revews_group mod_border-grey">
                    <div v-for="comment in tour.comments" class="revew"><span>hello</span>
                        <img class="revew_avatar" :src="'/storage/' + comment.user.avatar" alt="">
                        <h3 class="headline-2 revew_title">{{ comment.user.first_name + ' ' + comment.user.last_name
                            }}</h3>
                        <div class="revew_date">{{comment.created_at}}</div>
                        <a href="#" class="revew_revewer-link link">все
                            объявления</a>
                        <div class="revew_text text mod_normal">
                            <p>{{ comment.content }}</p>
                        </div>
                    </div>

                </div>
                <div class="revews_form">
                    <form class="revew-form" action="" id="revew">

                        <label class="revew-form_label" for="revew">Написать отзыв</label>
                        <fieldset class="revew-form_fieldset mod_border-grey">
                            <div class="revew-form_fieldset-wrapper">
                                <div class="revew-form_textarea-wrapper">
        <textarea class="revew-form_input mod_text"
                  placeholder="Сообщение"></textarea>
                                </div>
                                <div class="revew-form_input-wrapper">
                                    <input class="revew-form_input mod_name" type="text" placeholder="Ваше имя">
                                    <input class="revew-form_input mod_email" type="email" placeholder="email">
                                    <input class="button revew-form_submit mod_color-dark-blue" type="submit">
                                </div>
                            </div>
                        </fieldset>

                    </form>

                </div>
            </div>
        </section>
        <section class="product-page_similar cont">
            <div class="similar">
                <h3 class="similar_title headline-2">Еще объявления продавца {{tour.sellerFirstName}}</h3>
                <div class="similar_group">
                    <product-card v-for="(productCardTour, index) in tour.sellerTours"
                                  v-if="index < 3" :key="productCardTour.id"
                                  :tour="productCardTour"></product-card>
                    <article class="products-link product-card  mod_border-grey ">
                        <router-link class="products-link_link" :to="{name:'seller-page', params:
                           {id: tour.sellerId,
                            name: tour.sellerName}}">
                            <div class="products-link_icon"></div>
                            <p class="products-link_text">Перейти к объявлениям
                                продавца {{ tour.sellerFirstName}}</p>
                        </router-link>
                    </article>

                </div>

            </div>

            <div class="similar">
                <h3 class="similar_title headline-2">Еще в категории {{tour.tourTypeName}}</h3>
                <div class="similar_group">
                    <product-card v-for="(tour, index) in tour.similarTours"
                                  v-if="index < 3" :key="tour.id"
                                  :tour="tour"></product-card>
                    <article class="products-link product-card  mod_border-grey ">
                        <a href="#" class="products-link_link">
                            <div class="products-link_icon"></div>
                            <p class="products-link_text">Перейти в категорию {{ tour.tourTypeName}}</p>
                        </a>
                    </article>

                </div>

            </div>
        </section>
    </div>
</template>

<script type="text/javascript">
    import {mapGetters, mapActions} from 'vuex';
    import Swiper from 'Swiper';

    export default {
        data: function () {
            return {}
        },

        methods: {
            sliderResiser() {
                if (window.matchMedia("screen and (min-width: 1280px)").matches) {

                    var galleryThumbs = new Swiper('.gallery-thumbs', {
                        spaceBetween: 20,
                        slidesPerView: 4,
                        loop: true,
                        freeMode: true,
                        loopedSlides: 10, //looped slides should be the same
                        watchSlidesVisibility: true,
                        watchSlidesProgress: true,
                        width: 340,


                    });

                    var galleryTop = new Swiper('.gallery-top', {
                        spaceBetween: 10,
                        loop: true,
                        loopedSlides: 10,

                        thumbs: {
                            swiper: galleryThumbs,

                        },
                    });
                } else {
                    var swiper = new Swiper('.swiper-container', {
                        slidesPerView: 'auto',
                        spaceBetween: 20,
                        centeredSlides: true,

                        autoplay: {
                            delay: 2000,
                            disableOnInteraction: false
                        },

                        breakpointsInverse: true,
                        breakpoints: {

                            1279: {
                                autoplay: false
                            }

                        },
                        loop: true

                    });


                }
            },
            fetchData() {
                this.$store.dispatch('getItemsForProduct', this.$route.params.id);

            },
            changeRouteName() {
                this.$route.meta.breadcrumb = this.tour.name;

            },
            ...mapActions({
                addProductToCart: 'cart/addProductToCart',

            })

        },


        created() {
            this.fetchData();
        },
        watch: {
            $route() {
                this.fetchData();
            }
        },


        computed: {
            ...mapGetters([
                'tour',
            ]),


        },


        updated() {
            this.$route.meta.breadcrumb = this.tour.name;
        },

        mounted() {
            this.sliderResiser();
            window.addEventListener('resize', this.sliderResiser);
        },


    }
</script>

