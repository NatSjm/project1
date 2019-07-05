@extends('layout')

@section('content')

    <div class="product-page_breadcrumbs cont">

        @include('components.breadcrumbs.breadcrumbs')
    </div>
    <h2 class="headline-2 product-page_title cont">{{ $tour->name }}</h2>

    <section class="product-page_main">
        <div class="product">

            <div class="product_slider mod_mobile">
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
                        <div class="swiper-slide">
                            <img class="product_img" src="img/islands.jpg" alt=""></div>
                        <div class="swiper-slide">
                            <img class="product_img" src="img/islands.jpg" alt=""></div>
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
            </div>
            <div class="product_slider  mod_desctop">
                <div class="swiper-container gallery-top">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" style="background-image:url('/img/islands.jpg')"></div>
                        <div class="swiper-slide" style="background-image:url('/img/islands.jpg')"></div>
                        <div class="swiper-slide" style="background-image:url('/img/islands.jpg')"></div>
                        <div class="swiper-slide" style="background-image:url('/img/islands.jpg')"></div>
                        <div class="swiper-slide" style="background-image:url('/img/islands.jpg')"></div>
                        <div class="swiper-slide" style="background-image:url('/img/islands.jpg')"></div>
                        <div class="swiper-slide" style="background-image:url('/img/islands.jpg')"></div>
                        <div class="swiper-slide" style="background-image:url('/img/islands.jpg')"></div>
                        <div class="swiper-slide" style="background-image:url('/img/islands.jpg')"></div>
                        <div class="swiper-slide" style="background-image:url('/img/islands.jpg')"></div>
                    </div>


                </div>
                <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" style="background-image:url('/img/islands.jpg')"></div>
                        <div class="swiper-slide" style="background-image:url('/img/islands.jpg')"></div>
                        <div class="swiper-slide" style="background-image:url('/img/islands.jpg')"></div>
                        <div class="swiper-slide" style="background-image:url('/img/islands.jpg')"></div>
                        <div class="swiper-slide" style="background-image:url('/img/islands.jpg')"></div>
                        <div class="swiper-slide" style="background-image:url('/img/islands.jpg')"></div>
                        <div class="swiper-slide" style="background-image:url('/img/islands.jpg')"></div>
                        <div class="swiper-slide" style="background-image:url('/img/islands.jpg')"></div>
                        <div class="swiper-slide" style="background-image:url('/img/islands.jpg')"></div>
                        <div class="swiper-slide" style="background-image:url('/img/islands.jpg')"></div>
                    </div>
                </div>
            </div>

            <aside class="product_info mod_cont-mobile">
                <div class="purchase mod_border-grey">
                    <div class="purchase_price"><span>20 000 &#8383</span></div>
                    <div class="purchase_buy-button">
                        <button class="button mod_color-med-blue"> В корзину</button>
                    </div>
                </div>

                <div class="tags mod_border-grey">
                    <div class="tags_item">
                        <div class="tag mod_seller">
                            <h4 class="headline-4 tag_title">Продавец</h4>
                            <span>Михаил Павлов</span>
                        </div>
                    </div>

                    <div class="tags_item">
                        <div class="tag">
                            <h4 class="headline-4 tag_title">Страна</h4>
                            <span>Кипр</span>
                        </div>
                    </div>

                    <div class="tags_item">
                        <div class="tag">
                            <h4 class="headline-4 tag_title">Питание</h4>
                            <span>Завтрак и ужин</span>
                        </div>
                    </div>

                    <div class="tags_item">
                        <div class="tag">
                            <h4 class="headline-4 tag_title">Доступно детям</h4>
                            <span>Да</span>
                        </div>
                    </div>

                    <div class="tags_item">
                        <div class="tag">
                            <h4 class="headline-4 tag_title">Класс отеля</h4>
                            <span>2<sup>*</sup></span>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="product_description mod_cont-mobile mod_border-grey">
                <div class="categories">
                    <div class="categories_button">
                        <button class="button mod_green-bordered">Luxury</button>
                    </div>
                    <div class="categories_button">
                        <button class="button mod_green-bordered">Автобусный</button>
                    </div>
                </div>
                <div class="description text  mod_normal">
                    <p>
                        Отель The Makadi Palace 5*, располагающий обширной территорией бассейнами, великолепными садами
                        и
                        отличным песчаным пляжем. Рекомендуется для семейного отдыха с детьми, а также для всех кто
                        ценит
                        покой и тишину. Элегантный променад соединяет отель с соседним отелем The Grand Makadi 5*.
                        Благодаря
                        высокому уровню сервиса, развитой инфраструктуре, удачному расположению и великолепно
                        обустроенной
                        территории Вы получите незабываемый отдых в этом отеле.
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
                                <h3 class="headline-2 revew_title">{{ $comment->user->first_name . ' ' . $comment->user->last_name}}</h3>
                            @endif

                            <div class="revew_date">22 сентября 2018</div>

                            @if($comment->user)
                                <a href="{{ route('seller', $comment->user->id ) }}" class="revew_revewer-link link">все
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
        <div class="similar">
            <h3 class="similar_title headline-2">Еще объявления Михаила</h3>
            <div class="similar_group">
                @for ($i = 0; $i < 3; $i++)
                    @include ('components.product-card.product-card',['name' => $name] )
                @endfor
                <article class="products-link product-card  mod_border-grey ">
                    <a href="" class="products-link_link">

                        <div class="products-link_icon"></div>
                        <p class="products-link_text">Перейти к объявлениям Михаила</p>
                    </a>
                </article>

            </div>

        </div>

        <div class="similar">
            <h3 class="similar_title headline-2">Еще в категории Luxury</h3>
            <div class="similar_group">
                @for ($i = 0; $i < 3; $i++)
                    @include ('components.product-card.product-card',['name' => $name] )
                @endfor

                <article class="products-link product-card mod_border-grey ">
                    <a href="" class="products-link_link">

                        <div class="products-link_icon"></div>
                        <p class="products-link_text">Перейти в категорию "Luxury"</p>
                    </a>
                </article>
            </div>
        </div>
    </section>

@endsection
