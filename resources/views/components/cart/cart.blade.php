<div class="cart">
    <a href="{{ route('cart') }}" class="cart_link">
    <svg class="cart_icon" viewBox="0 0 12 12">
        <use xlink:href="#shopping-cart"></use>
    </svg>


    <span>Корзина</span> <span class="cart_price">{{ session()->has('cart') ? "( "
    .number_format(session()->get('cart')->totalPrice, 0, ".", " ")
    ." ₿ )" : '' }}</span>
    </a>
</div>

