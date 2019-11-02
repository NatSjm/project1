<template>
    <div>
        <!--<section class="main-banner">-->
            <!--&lt;!&ndash;<div class="swiper-container">&ndash;&gt;-->
                <!--&lt;!&ndash;<div class="swiper-wrapper">&ndash;&gt;-->
                    <!--&lt;!&ndash;<div class="swiper-slide">&ndash;&gt;-->
                        <!--&lt;!&ndash;&lt;!&ndash;<img class="main-banner_img" src="/storage/images/{{$sliderTour->mainImg->path}}"&ndash;&gt;&ndash;&gt;-->
                        <!--&lt;!&ndash;&lt;!&ndash;alt="{{$sliderTour->mainImg->name}}">&ndash;&gt;&ndash;&gt;-->
                        <!--&lt;!&ndash;<div class="main-banner_text-block">&ndash;&gt;-->
                            <!--&lt;!&ndash;<h2 class="main-banner_title"></h2>&ndash;&gt;-->
                            <!--&lt;!&ndash;<h3 class="main-banner_description">Вся роскошь востока</h3>&ndash;&gt;-->
                            <!--&lt;!&ndash;&lt;!&ndash;<a href="{{ route('product-page', $sliderTour) }}" class="main-banner_link button">Перейти к&ndash;&gt;&ndash;&gt;-->
                            <!--&lt;!&ndash;&lt;!&ndash;туру</a>&ndash;&gt;&ndash;&gt;-->
                        <!--&lt;!&ndash;</div>&ndash;&gt;-->
                    <!--&lt;!&ndash;</div>&ndash;&gt;-->

                <!--&lt;!&ndash;</div>&ndash;&gt;-->
            <!--&lt;!&ndash;</div>&ndash;&gt;-->
            <!--<carusel></carusel>-->
        <!--</section>-->
        <carusel :sliderTours="sliderTours"></carusel>
        <section class="recreation-types">
            <div class="recreation-types_wrapper cont">
                <h3 class="headline-3">Виды отдыха</h3>
                <span>
            <svg class="arrow">
                <use xlink:href="#arrow-right"></use>
            </svg>
            </span>
                <div v-for="type in AllTourTypes">
                    <pictogram-line :type="type"></pictogram-line>
                </div>
            </div>
        </section>


        <section class="recommendations cont">
            <div class="section-headlines" v-if="recommendedTours.length > 0">
                <h3 class="headline-2">ColorLife рекомендует</h3>
                <router-link class="show-all" to="/search">
                    <span>Показать все <span>({{recommendedTours.length}})</span></span>
                    <span>
            <svg class="arrow">
                <use xlink:href="#arrow-right"></use>
            </svg>
            </span>
                </router-link>
            </div>
            <div class="products-list-top">
                <div v-for="tour in recommendedTours.slice(0,2)">
                    <product-card :tour="tour"></product-card>
                </div>

            </div>
            <div class="products-list">
                <div v-for="tour in recommendedTours.slice(2,8)">
                    <product-card :tour="tour"></product-card>
                </div>
            </div>
        </section>

        <section class="hot-tours cont ">
            <div class="section-headlines" v-if="hotTours.length > 0">
                <h3 class="headline-2">Горящие туры</h3>
                <router-link class="show-all" to="/search">
                    <span>Показать все <span>({{hotTours.length}})</span></span>
                    <span>
            <svg class="arrow">
                <use xlink:href="#arrow-right"></use>
            </svg>
            </span>
                </router-link>
            </div>
            <div class="products-list-top">
                <div v-for="tour in hotTours.slice(0,2)">
                    <product-card :tour="tour"></product-card>
                </div>

            </div>
            <div class="products-list">
                <div v-for="tour in hotTours.slice(2,8)">
                    <product-card :tour="tour"></product-card>
                </div>
            </div>
        </section>

        <section class="about cont ">
            <h2 class="about_headline headline-2" @click='aboutHeightChange'>О нас</h2>
            <p class="about_info  text mod_normal"
               v-bind:class="{ 'mod_full-size': toggle }"
               ref="about"
               v-bind:style="{ height: newHeight + 'px' }">Туроператор
                ООО «Джоин
                АП!», плательщик налога на
                прибыль
                предприятий
                на
                общих
                основаниях,
                лицензия:
                туроператорская № 1597 от 04.12.2015 г., руководствуясь законодательством Украины, публично предлагает
                Туристическим агентам, которые зарегистрированы как хозяйствующие субъекты на территории Украины, имеют
                соответствующий вид деятельности, и финансовое обеспечение своей гражданской ответственности (гарантию
                банка
                или другого кредитного учреждения) перед туристами, за вознаграждение оказать услуги Туроператору по
                реализации турпродукта путем заключения договора на туристическое обслуживание от имени, в интересах и
                под
                контролем Туроператора, а также осуществлять фактические действия, определенные Агентским договором о
                присоединении, по обеспечению предоставления Туроператором Тура и наделяется полномочиями заключать
                договора
                на обслуживание только на условиях указанных в Договоре на туристическое обслуживание. Все другие
                договора
                не возлагают на Туроператора никаких обязательств, поскольку заключенные от имени Туроператора без
                надлежащих на то полномочий (в таком случае исполнителем услуг является Турагент), одновременно
                подтверждения заказа и предоставления документов, дающих право получить туристический продукт не
                считаются
                одобрением Туроператором соглашения заключенного между Агентом и Туристом.</p>
            <a class="about_button link " @click.prevent='aboutHeightChange' href="" v-if="!toggle">Показать еще</a>
        </section>
    </div>
</template>

<script src="./index.js"></script>
