@extends('layout')

@section('content')
    <section class="main-banner">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($sliderTours as $sliderTour)
                <div class="swiper-slide">
                    <img class="main-banner_img" src="/storage/images/{{$sliderTour->mainImg->path}}" alt="{{$sliderTour->mainImg->name}}">
                    <div class="main-banner_text-block">
                        <h2 class="main-banner_title">{{$sliderTour->name}}</h2>
                        <h3 class="main-banner_description">Вся роскошь востока</h3>
                        <a href="{{ route('tour', $sliderTour) }}" class="main-banner_link button">Перейти к туру</a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>






    <section class="recreation-types">
        <div class="recreation-types_wrapper cont">
            <h3 class="headline-3">Виды отдыха</h3>
            <span>
            <svg class="arrow">
                <use xlink:href="#arrow-right"></use>
            </svg>
            </span>

            @include ('components.pictogram-line.pictogram-line')
        </div>
    </section>


    @if(count($recommendedTours))
    <section class="recommendations cont">
        <div class="section-headlines">
            <h3 class="headline-2">ColorLife рекомендует</h3>

            <a class="show-all" href=""><span>Показать все<span> ({{$recommendedTours->count()}})</span></span>
                <span>
            <svg class="arrow">
                <use xlink:href="#arrow-right"></use>
            </svg>
            </span>
                </a>
            </div>

        <div class="products-list-top">
            @foreach($recommendedTours->slice(6, 2) as $recommendedTour)
            @include ('components.product-card.product-card',['name' => $name2,
                                                               'tour' => $recommendedTour] )
            @endforeach


        </div>
        <div class="products-list">
            @foreach ($recommendedTours->take(6) as $recommendedTour)
                @include ('components.product-card.product-card',['name' => $name1,
                                                                   'tour' => $recommendedTour] )
            @endforeach
        </div>
    </section>
    @endif
    <section class="hot-tours cont ">
        @if (count($hotTours))
        <div class="section-headlines">
            <h3 class="headline-2">Горящие туры</h3>

            <a class="show-all" href=""><span>Показать все<span> ({{$hotTours->count()}})</span></span>
                <span>
            <svg class="arrow">
                <use xlink:href="#arrow-right"></use>
            </svg>
            </span>
            </a>

        </div>

        <div class="products-list-top">
            @foreach($hotTours->slice(6, 2) as $hotTour)
            @include ('components.product-card.product-card',['name' => $name2,
                                                               'tour' => $hotTour] )
            @endforeach

        </div>

        <div class="products-list">
            @foreach ($hotTours->take(6) as $hotTour)

                @include ('components.product-card.product-card', ['name' => $name1,
                                                                    'tour' => $hotTour])
            @endforeach
        </div>
    </section>
    @endif
    <section class="about cont ">
        <h2 class="about_headline headline-2">О нас</h2>
        <p class="about_info text mod_normal">Туроператор ООО «Джоин АП!», плательщик налога на прибыль предприятий на
            общих
            основаниях,
            лицензия:
            туроператорская № 1597 от 04.12.2015 г., руководствуясь законодательством Украины, публично предлагает
            Туристическим агентам, которые зарегистрированы как хозяйствующие субъекты на территории Украины, имеют
            соответствующий вид деятельности, и финансовое обеспечение своей гражданской ответственности (гарантию банка
            или другого кредитного учреждения) перед туристами, за вознаграждение оказать услуги Туроператору по
            реализации турпродукта путем заключения договора на туристическое обслуживание от имени, в интересах и под
            контролем Туроператора, а также осуществлять фактические действия, определенные Агентским договором о
            присоединении, по обеспечению предоставления Туроператором Тура и наделяется полномочиями заключать договора
            на обслуживание только на условиях указанных в Договоре на туристическое обслуживание. Все другие договора
            не возлагают на Туроператора никаких обязательств, поскольку заключенные от имени Туроператора без
            надлежащих на то полномочий (в таком случае исполнителем услуг является Турагент), одновременно
            подтверждения заказа и предоставления документов, дающих право получить туристический продукт не считаются
            одобрением Туроператором соглашения заключенного между Агентом и Туристом.</p>
        <a class="about_button link " href="">Показать еще</a>
    </section>


@endsection
{{--@push('scripts')--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.js"></script>--}}
{{--@endpush--}}

