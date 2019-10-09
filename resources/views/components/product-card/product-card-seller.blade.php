<article class="product-card seller_view">
    <header class="product-card_header">
        <a class="product-card_link" href="{{ route('product-page', $tour) }}">
            <img class="product-card_img" src="/storage/images/{{$tour->mainImg->path}}" alt="">

            <div class="product-card_mask">
                <div class="edit-icons">
                    <a href="{{ route('product-edit-page', $tour)}}">
                        <div>
                            <svg class="edit-icon" viewBox="0 0 14 13.932">
                                <use xlink:href="#pencil"></use>
                            </svg>
                        </div>
                    </a>
                    <form method="POST" action="{{route('tour.destroy', $tour)}}">
                        @method('DELETE')
                        @csrf
                        <input type="submit" id="delete-input">
                        <label for="delete-input">
                            <div>
                                <svg class="delete-icon" viewBox="0 0  12 15.182 ">
                                    <use xlink:href="#rubish-bin"></use>
                                </svg>
                            </div>
                            </label>
                    </form>
                </div>
            </div>
        </a>
        <div class="product-card_info">
            <div class="product-card_conditions">
                <svg class="product-card_icon" viewBox="0 0 14 13">
                    <use xlink:href="#{{$tour->tourType->icon}}"></use>
                </svg>
                <span class="product-card_term">{{$tour->length}} дней/{{$tour->length + 1}}
                    ночей {{$tour->hotel->hotel_class}}*</span>
            </div>
            <div class="product-card_price">
                <span>{{$tour->formattedPrice}} &#8383;</span>
            </div>

        </div>
    </header>
    <div class="delimiter mod_color-light-green"></div>
    <div class="product-card_main">
        <a class="product-card_link" href="{{ route('product-page', $tour) }}">
            <h3 class="product-card_title headline-3">
                {{ $tour->country->shortName }} ({{$tour->name}})</h3>
        </a>
        <h4 class="product-card_description headline-4">{{$tour->startLocation? "Вылет из ".
            $tour->startLocation->city->name : ''}}</h4>
        <a href="{{ route('addToCart', $tour) }}" class="button mod_color-light-green">Заказать</a>
    </div>

</article>
