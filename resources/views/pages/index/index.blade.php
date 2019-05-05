
@extends('layout')

@section('content')
    <section class="main-banner">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">

                    <img class="main-banner_img" src="img/main-banner.jpg" alt="">
                    <div class="main-banner_text-block">
                        <h2 class="main-banner_title">Чудеса Катара</h2>
                        <h3 class="main-banner_description">Вся роскошь востока</h3>
                        <a href="" class="main-banner_link button">Перейти к туру</a>
                    </div>
                </div>

                <div class="swiper-slide">

                    <img class="main-banner_img" src="img/main-banner.jpg" alt="">
                    <div class="main-banner_text-block">
                        <h2 class="main-banner_title">Чудеса Катара</h2>
                        <h3 class="main-banner_description">Вся роскошь востока</h3>
                        <a href="" class="main-banner_link button">Перейти к туру</a>
                    </div>
                </div>

                <div class="swiper-slide">

                    <img class="main-banner_img" src="img/main-banner.jpg" alt="">
                    <div class="main-banner_text-block">
                        <h2 class="main-banner_title">Чудеса Катара</h2>
                        <h3 class="main-banner_description">Вся роскошь востока</h3>
                        <a href="" class="main-banner_link button">Перейти к туру</a>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <section class="recreation-types">
        <div class="recreation-types_wrapper cont">
        <h3 class="headline-3">Виды отдыха &#8594;</h3>
         @include ('components.pictogram-line.pictogram-line')
        </div>
    </section>

    <section class="recommendations cont">
        <div class="section-headlines">
        <h3 class="headline-2">Colorlife рекомендует</h3>
        <a class="show-all" href="">Показать все (598) 	&#160;&#160;&#8594;</a>
        </div>
        <div class="products-list-top">
            @include ('components.product-card.product-card',['name' => $name2] )
            @include ('components.product-card.product-card',['name' => $name3] )
        </div>
        <div class="products-list">
            @for ($i = 0; $i < 6; $i++)
               @include ('components.product-card.product-card',['name' => $name1] )
            @endfor
        </div>
    </section>

    <section class="hot-tours cont ">

        <div class="section-headlines">
        <h3 class="headline-2">Горящие туры</h3>
        <a class="show-all" href="">Показать все (598) 	&#160;&#160;&#8594;</a>
        </div>

        <div class="products-list-top">
            @include ('components.product-card.product-card',['name' => $name2] )
            @include ('components.product-card.product-card',['name' => $name3] )
        </div>

        <div class="products-list">
            @for ($i = 0; $i < 6; $i++)
                @include ('components.product-card.product-card', ['name' => $name1])
            @endfor
        </div>
    </section>

    <section class="about cont  ">
        <h2 class="headline-2">О нас</h2>
        <p class="text mod_normal">Туроператор ООО «Джоин АП!», плательщик налога на прибыль предприятий на общих
            основаниях,
            лицензия:
            туроператорская № 1597 от 04.12.2015 г., руководствуясь законодательством Украины, публично предлагает Туристическим агентам, которые зарегистрированы как хозяйствующие субъекты на территории Украины, имеют соответствующий вид деятельности, и финансовое обеспечение своей гражданской ответственности (гарантию банка или другого кредитного учреждения) перед туристами, за вознаграждение оказать услуги Туроператору по реализации турпродукта путем заключения договора на туристическое обслуживание от имени, в интересах и под контролем Туроператора, а также осуществлять фактические действия, определенные Агентским договором о присоединении, по обеспечению предоставления Туроператором Тура и наделяется полномочиями заключать договора на обслуживание только на условиях указанных в Договоре на туристическое обслуживание. Все другие договора не возлагают на Туроператора никаких обязательств, поскольку заключенные от имени Туроператора без надлежащих на то полномочий (в таком случае исполнителем услуг является Турагент), одновременно подтверждения заказа и предоставления документов, дающих право получить туристический продукт не считаются одобрением Туроператором соглашения заключенного между Агентом и Туристом.</p>
        <a class="link show-more" href="">Показать еще</a>
    </section>


@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.js"></script>
@endpush

