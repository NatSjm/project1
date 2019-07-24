<div class="cart">
    <a href="{{ route('cart') }}" class="cart_link">
    <svg class="cart_icon" viewBox="0 0 12 12">
        <use xlink:href="#shopping-cart"></use>
    </svg>


    <span>Корзина</span> <span class="cart_price">({{ session()->has('cart') ? session()->get('cart')->totalPrice :
    '' }}
        ₿ )
    </span>
    </a>
</div>

