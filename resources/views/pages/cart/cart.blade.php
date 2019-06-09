@extends('layout')

@section('content')

    <div class="cart-page_container cont">

        <div class="cart-page_breadcrumbs">
            @include('components.breadcrumbs.breadcrumbs')
        </div>

        <h2 class="cart-page_title headline-2">Корзина</h2>

        <section class="cart-page_main">
            <div class="full-cart">
                <div class="full-cart_main">
                    <table class="cart-products table mod_border-grey">
                        <thead>
                        <tr class="cart-products_head mod_color-light-milk">
                            <td class="cart-products_name">Название</td>
                            <td class="cart-products_price">Цена</td>
                            <td class="cart-products_delete">Удаление</td>
                        </tr>
                        </thead>
                        <tbody class="cart-products_body">
                        <tr class="cart-product">
                            <td class="cart-product_name">
                                <div class="cart-product_details">
                                    <img class="cart-product_img" src="img/islands.jpg">
                                    <div class="cart-product_info">
                                        <a href="" class="cart-product_link">Мальдивы 4-5 <sup> &#42;</sup> Все включено</a>
                                    </div>
                                </div>
                            </td>

                            <td class="cart-product_price">14 000 ₿</td>
                            <td class="cart-product_delete">
                                <div class="cart-product_delete-container">
                                    <svg class="cart-product_delete-icon">
                                        <use xlink:href="#rubbish-bin-grey"></use>
                                    </svg>
                                </div>
                            </td>

                        </tr>

                        <tr class="cart-product">
                            <td class="cart-product_name">
                                <div class="cart-product_details">
                                    <img class="cart-product_img" src="img/islands.jpg">
                                    <div class="cart-product_info">
                                        <a href="" class="cart-product_link">Мальдивы 4-5 <sup>*</sup> Все включено</a>
                                    </div>
                                </div>
                            </td>

                            <td class="cart-product_price">12 000 ₿</td>
                            <td class="cart-product_delete">
                                <div class="cart-product_delete-container">
                                    <svg class="cart-product_delete-icon">
                                        <use xlink:href="#rubbish-bin-grey"></use>
                                    </svg>
                                </div>
                            </td>

                        </tr>

                        <tr class="cart-product">
                            <td class="cart-product_name">
                                <div class="cart-product_details">
                                    <img class="cart-product_img" src="img/islands.jpg">
                                    <div class="cart-product_info">
                                        <a href="" class="cart-product_link">Мальдивы 4-5 <sup> &#42;</sup> Все включено</a>
                                    </div>
                                </div>
                            </td>

                            <td class="cart-product_price">24 000 </td>
                            <td class="cart-product_delete">
                                <div class="cart-product_delete-container">
                                    <svg class="cart-product_delete-icon">
                                        <use xlink:href="#rubbish-bin-grey"></use>
                                    </svg>
                                </div>
                            </td>

                        </tr>

                        </tbody>
                    </table>
                </div>

                <div class="full-cart_total mod_border-grey">
                    <div class="sum">
                    <span>Итого:</span><span class="sum_value"></span>
                    </div>
                    <button class="full-cart_order-button button mod_color-med-blue">Заказать</button>


                </div>
            </div>

        </section>
    </div>
@endsection
