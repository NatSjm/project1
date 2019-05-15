@extends('layout')

@section('content')

    <div class="product-page_breadcrumbs cont">

        @include('components.breadcrumbs.breadcrumbs')
    </div>
    <h2 class="headline-2 product_title cont">Отель Мираколь Неаполь </h2>


    <section class="product">


        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img class="product_img" src="img/islands.jpg" alt=""></div>
                <div class="swiper-slide">
                    <img class="product_img" src="img/islands.jpg" alt=""></div>
                <div class="swiper-slide">
                    <img class="product_img" src="img/islands.jpg" alt=""></div>
                <div class="swiper-slide">
                    <img class="product_img" src="img/islands.jpg" alt=""></div>
            </div>

        </div>


        <aside class="sidebar mod_cont-mobile">
            <div class="product_purchase mod_border-grey">
                <div class="product_price"><span>20 &#8383</span></div>
                <div class="product_buy-button">
                    <button class="button mod_color-med-blue"> В корзину</button>
                </div>
            </div>

            <div class="product_tags mod_border-grey">
                <div class="tag product_seller">
                    <h4 class="headline-4 tag_title">Продавец</h4>
                    <span>Михаил Павлов</span>
                </div>
                <div class="tag product_country">
                    <h4 class="headline-4 tag_title">Страна</h4>
                    <span>Кипр</span>
                </div>
                <div class="tag product_food">
                    <h4 class="headline-4 tag_title">Завтрак и ужин</h4>
                    <span>Кипр</span>
                </div>
                <div class="tag product_children-accessibility">
                    <h4 class="headline-4 tag_title">Доступно детям</h4>
                    <span>Да</span>
                </div>
                <div class="tag product_hotel-class">
                    <h4 class="headline-4 tag_title">Класс отеля</h4>
                    <span>2<sup>*</sup></span>
                </div>

            </div>
        </aside>

        <div class="product_description mod_cont-mobile mod_border-grey">
            <div class="product_categories">
                <button class="button">Luxury</button>
                <button class="button">Автобусный</button>
            </div>
            <div class="text mod_normal">
                <p>
                    Отель The Makadi Palace 5*, располагающий обширной территорией бассейнами, великолепными садами и
                    отличным песчаным пляжем. Рекомендуется для семейного отдыха с детьми, а также для всех кто ценит
                    покой и тишину. Элегантный променад соединяет отель с соседним отелем The Grand Makadi 5*. Благодаря
                    высокому уровню сервиса, развитой инфраструктуре, удачному расположению и великолепно обустроенной
                    территории Вы получите незабываемый отдых в этом отеле.
                </p>
            </div>

        </div>


    </section>







@endsection
