<div class="cart">

    <svg class="cart_icon" viewBox="0 0 12 12">
        <use xlink:href="#shopping-cart"></use>
    </svg>


    <span>Корзина</span> <span class="price">({{ session()->has('cart') ? session()->get('cart')->totalPrice : '' }}
        ₿ )
    </span>
</div>

