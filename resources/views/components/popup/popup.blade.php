<div class="popup cont-med mod_color-white">
    <div class="popup_main">
        <ul class="personal-menu">
            <li class="personal-menu_item my-propo active"><span class="personal-menu_icon"><svg viewBox="0 0 9.999 10">
                           <use class="personal-menu_use" xlink:href="#propositions"></use>
                       </svg></span><a href="{{ route('seller-page', Auth::user()) }}" class="personal-menu_link">Мои предложения</a></li>
            <li class="personal-menu_item my-purch"><span class="personal-menu_icon"><svg viewBox="0 0 9.999 10">
                           <use class="personal-menu_use" xlink:href="#purchases"></use>
                       </svg></span><a href="{{ route('purchases-page') }}" class="personal-menu_link">Мои покупки</a></li>
            <li class="personal-menu_item my-orders"><span class="personal-menu_icon"><svg viewBox="0 0 9.999 10">
                           <use class="personal-menu_use"xlink:href="#bell"></use>
                           </svg></span><a href="{{ route('orders-page') }}" class="personal-menu_link">Мои заказы</a>
            </li>
            <li class="personal-menu_item person-info"><span class="personal-menu_icon"><svg viewBox="0 0 9.999 10">
                           <use class="personal-menu_use" xlink:href="#user"></use>
                       </svg></span><a href="/profile/{{Auth::id()}}/edit" class="personal-menu_link">Личные данные</a>
            </li>
        </ul>
    </div>
    <div class="popup_bottom mod_color-dark-milk">
        <a class="popup-bottom_link" href="{{route('logout')}}" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">Выйти<span class="popup-bottom_icon"><svg viewBox="0 0 9.999 10">
                                        <use class="personal-menu_use" xlink:href="#logout"></use></svg></span></a>

        <form id=" logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>



