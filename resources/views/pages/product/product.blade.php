@extends('layout')

@section('content')

    <div class="product-page_breadcrumbs cont">

        @include('components.breadcrumbs.breadcrumbs')
    </div>

    <section class="product">
        <h2 class="headline-2 product_title cont">Отель Мираколь Неаполь </h2>
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
    </section>





@endsection
