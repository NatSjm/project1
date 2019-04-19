<article class="product-card seller_view">
    <header class="product-card_header">
        <img class="product-card_img" src="{{ asset('img/mountains.jpg') }}" alt="">
        <div class="product-card_mask">
            <div class="edit-icons">
                <a href="#"><div><svg class="edit-icon" viewBox="0 0 14 13.932">
                            <use xlink:href="#pencil"></use>
                        </svg></div></a>
                <a href="#"><div><svg class="delete-icon" viewBox="0 0 12 15.182 ">
                            <use xlink:href="#rubish-bin"></use>
                        </svg></div></a>
            </div>
        </div>
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
        <div class="delimiter mod_color-light-green"></div>
    </header>
    <div class="product-card_main">
        <h3 class="product-card_title headline-3 ">Индонезия (о.Бали)</h3>
        <h4 class="product-card_description headline-4">Вылет из Киева</h4>
        @include('components/buttons/button-green')
    </div>
</article>
