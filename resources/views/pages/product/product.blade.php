@extends('layout')

@section('content')

    <div class="product-page_breadcrumbs cont">

        @include('components.breadcrumbs.breadcrumbs')
    </div>
    <h2 class="headline-2 product-page_title cont">{{ $tour->name }}</h2>
    {{--    <img src="/storage/images/{{$tour->mainImg->path}}">--}}

    <section class="product-page_main">
        <div class="product">
            @if(count($tour->medias))
                <div class="product_slider mod_mobile">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($tour->medias as $media)
                                <div class="swiper-slide">
                                    <img class="product_img" src="/storage/images/{{$media->path}}"
                                         alt="{{$media->name}}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="product_slider  mod_desctop">
                    <div class="swiper-container gallery-top">
                        <div class="swiper-wrapper">
                            @foreach($tour->medias as $media)
                                <div class="swiper-slide"
                                     style="background-image:url('/storage/images/{{$media->path}}')"></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                            @foreach($tour->medias as $media)
                                <div class="swiper-slide"
                                     style="background-image:url('/storage/images/{{$media->path}}')"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <aside class="product_info mod_cont-mobile">
                <div class="purchase mod_border-grey">
                    <div class="purchase_price"><span>{{$tour->formattedPrice}} &#8383</span></div>
                    <div class="purchase_buy-button">
                        <a href="{{ route('addToCart', $tour) }}" class="button mod_color-med-blue"> В корзину</a>
                    </div>
                </div>

                <div class="tags mod_border-grey">
                    <div class="tags_item">
                        <div class="tag mod_seller">
                            <img class="tag_avatar" src="{{$tour->seller->avatar}}" alt="">
                            <h4 class="headline-4 tag_title">Продавец</h4>
                            <span>{{$crumb_level2}}</span>
                        </div>
                    </div>

                    <div class="tags_item">
                        <div class="tag">
                            <h4 class="headline-4 tag_title">Страна</h4>
                            <span>{{$tour->country->name}}</span>
                        </div>
                    </div>

                    <div class="tags_item">
                        <div class="tag">
                            <h4 class="headline-4 tag_title">Питание</h4>
                            <span>{{$tour->nutrition->nutrition_type}}</span>
                        </div>
                    </div>

                    <div class="tags_item">
                        <div class="tag">
                            <h4 class="headline-4 tag_title">Доступно детям</h4>
                            <span>{{$tour->for_children}}</span>
                        </div>
                    </div>

                    <div class="tags_item">
                        <div class="tag">
                            <h4 class="headline-4 tag_title">Класс отеля</h4>
                            <span>{{$tour->hotel->hotel_class}}<sup>*</sup></span>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="product_description mod_cont-mobile mod_border-grey">
                <div class="categories">
                    <div class="categories_button">
                        <button class="button mod_green-bordered">{{$tour->tourType->name}}</button>
                    </div>
                    <div class="categories_button">
                        <button class="button mod_green-bordered">{{$tour->category->name}}</button>
                    </div>
                </div>
                <div class="description text  mod_normal">
                    <p>
                        {{$tour->description}}
                    </p>
                </div>

            </div>
        </div>

    </section>
    <section class="product-page_revews cont">

        <div class="revews">

            @if(count($tour->comments))
                <h2 class=" revews_title headline-2">Отзывы</h2>

                <div class="revews_group mod_border-grey">
                    @foreach($tour->comments as $comment)
                        <div class="revew">
                            @if($comment->user)
                                <img class="revew_avatar" src="{{$comment->user->avatar}}" alt="">
                                <h3 class="headline-2 revew_title">{{ $comment->user->fullName}}</h3>
                            @endif

                            <div class="revew_date">{{$comment->created_at}}</div>

                            @if($comment->user)
                                <a href="{{ route('seller-page', $comment->user) }}" class="revew_revewer-link link">все
                                    объявления</a>
                            @endif

                            <div class="revew_text text mod_normal">
                                <p>{{ $comment->content }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="revews_form">
                <form class="revew-form" action="" id="revew">
                    @csrf
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
        @if (count($sellerTours))
            <div class="similar">
                <h3 class="similar_title headline-2">Еще объявления продавца {{$tour->seller->first_name}}</h3>
                <div class="similar_group">

                    @foreach ($sellerTours->take(3) as $sellerTour)
                        @include ('components.product-card.product-card',['tour' => $sellerTour] )
                    @endforeach

                    @if (count($sellerTours) > 3)
                        <article class="products-link product-card  mod_border-grey ">
                            <a href="{{ route('seller-page', $tour->seller) }}" class="products-link_link">
                                <div class="products-link_icon"></div>
                                <p class="products-link_text">Перейти к объявлениям
                                    продавца {{$tour->seller->first_name}}</p>
                            </a>
                        </article>
                    @endif
                </div>

            </div>
        @endif

        @if(count($similarTours))
        <div class="similar">
            <h3 class="similar_title headline-2">Еще в категории {{$tour->tourType->name}}</h3>
            <div class="similar_group">
                @foreach ($similarTours->take(3) as $similarTour)
                    @include ('components.product-card.product-card',['tour' => $similarTour] )
                @endforeach

                @if (count($similarTours) > 3)
                    <article class="products-link product-card mod_border-grey ">
                        <a href="{{ route('search-page').'?tour_type='.$tour->tourType->name }}"
                           class="products-link_link">
                            <div class="products-link_icon"></div>
                            <p class="products-link_text">Перейти в категорию "{{$tour->tourType->name}}"</p>
                        </a>
                    </article>
                @endif
            </div>
        </div>
         @endif
    </section>

@endsection
