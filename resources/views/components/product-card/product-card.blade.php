<article class="product-card">

    @isset($tour)
    <header class="product-card_header">


        <a class="product-card_link" href ="{{ route('tour', $tour) }}">
            <img class="product-card_img" src="/storage/images/{{$tour->mainImg->path}}" alt="">
        </a>

        <div class="product-card_info">
            <div class="product-card_conditions">
                <svg class="product-card_icon" viewBox="0 0 14 13">
                    <use xlink:href="#{{$tour->tourType->icon}}"></use>
                </svg>
                <span class="product-card_term">{{$tour->length}} дней/{{$tour->length + 1}} ночей {{$tour->hotel->hotel_class}}*</span>
            </div>
            <div class="product-card_price">
                <span>{{$tour->formattedPrice}} &#8383;</span>
            </div>

        </div>

    </header>
    <div class="delimiter mod_color-light-green"></div>
    <div class="product-card_main">
        <a class="product-card_link" href ="{{ route('tour', $tour) }}">
            <h3 class="product-card_title headline-3 ">{{$tour->country->name}} ({{$tour->name}})</h3>
        </a>
        <h4 class="product-card_description headline-4">Вылет из {{$tour->startLocation->city->name}}</h4>
        <a href="{{ route('addToCart', $tour) }}" class="button mod_color-light-green">Заказать</a>
    </div>
    @else
    <header class="product-card_header">

            <img class="product-card_img" src="{{ asset($name) }}" alt="">

        <div class="product-card_info">
            <div class="product-card_conditions">
                <svg class="product-card_icon" viewBox="0 0 14 13">
                    <use xlink:href="#pool"></use>
                </svg>
                <span class="product-card_term">4 дня/5 ночей 5*</span>
            </div>
            <div class="product-card_price">
                <span>35 895 &#8383;</span>
            </div>

        </div>

    </header>
    <div class="delimiter mod_color-light-green"></div>
    <div class="product-card_main">
        <h3 class="product-card_title headline-3 ">Индонезия (о.Бали)</h3>
        <h4 class="product-card_description headline-4">Вылет из Киева</h4>
        <a href="" class="button mod_color-light-green">Заказать</a>
    </div>
    @endif
</article>
