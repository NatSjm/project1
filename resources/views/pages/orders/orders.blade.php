@extends('layout')
@section ('content')
    <div class="orders-page_container cont">
        <div class="orders-page_breadcrumbs">
            @include('components.breadcrumbs.breadcrumbs')
        </div>
        <h2 class="headline-2 orders-page_title">Мои заказы</h2>
        <section class="orders-page_orders mod_border-grey">
            <table class="orders">
                <tbody>

                <tr class="order mod_color-light-milk">
                    <td class="order_number">№ 222</td>
                    <td class="order_date">22.01.2018
                        <svg class="order_switcher-icon js_details-switcher mod_mobile">
                            <use xlink:href="#selector"></use>
                        </svg>
                    </td>
                    <td class="order_byer-link"><a class="link" href="#">Николай Семенов</a></td>
                    <td class="order_details-switcher js_details-switcher"><span>Подробности</span>
                        <svg class="order_switcher-icon mod_desctop">
                            <use xlink:href="#selector"></use>
                        </svg>
                    </td>
                </tr>
                <tr class="order_details">
                    <td class="order_items" colspan="4">
                        <div class="order_items-wrapper">
                            <div class="order-item">
                                <img class="order-item_img" src="img/islands.jpg">
                                <div class="order-item_info">
                                    <div class="order-item_tags">Мальдивы 5<sup>*</sup> Все включено</div>
                                    <div class="order-item_price">12 000 ₿</div>
                                </div>
                            </div>
                            <div class="order-item">
                                <img class="order-item_img" src="img/islands.jpg">
                                <div class="order-item_info">
                                    <div class="order-item_tags">Гавайи 4<sup>*</sup> Не все включено</div>
                                    <div class="order-item_price">5 000 ₿</div>
                                </div>
                            </div>
                            <div class="order-item">
                                <img class="order-item_img" src="img/islands.jpg">
                                <div class="order-item_info">
                                    <div class="order-item_tags">Египет 3<sup>*</sup> Без перелета</div>
                                    <div class="order-item_price">200 000 ₿</div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr class="order mod_color-light-milk">
                    <td class="order_number">№ 114</td>
                    <td class="order_date">20.01.2018
                        <svg class="order_switcher-icon js_details-switcher mod_mobile">
                            <use xlink:href="#selector"></use>
                        </svg>
                    </td>
                    <td class="order_byer-link"><a class="link" href="#">Георгий Смотрицкий</a></td>
                    <td class="order_details-switcher js_details-switcher"><span>Подробности</span>
                        <svg class="order_switcher-icon mod_desctop">
                            <use xlink:href="#selector"></use>
                        </svg>
                    </td>

                </tr>
                <tr class="order_details">
                    <td class="order_items" colspan="4">
                        <div class="order_items-wrapper">
                            <div class="order-item">
                                <img class="order-item_img" src="img/islands.jpg">
                                <div class="order-item_info">
                                    <div class="order-item_tags">Мальдивы 5<sup>*</sup> Все включено</div>
                                    <div class="order-item_price">12 000 ₿</div>
                                </div>
                            </div>
                            <div class="order-item">
                                <img class="order-item_img" src="img/islands.jpg">
                                <div class="order-item_info">
                                    <div class="order-item_tags">Гавайи 4<sup>*</sup> Не все включено</div>
                                    <div class="order-item_price">5 000 ₿</div>
                                </div>
                            </div>
                            <div class="order-item">
                                <img class="order-item_img" src="img/islands.jpg">
                                <div class="order-item_info">
                                    <div class="order-item_tags">Египет 3<sup>*</sup> Без перелета</div>
                                    <div class="order-item_price">200 000 ₿</div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr class="order mod_color-light-milk">
                    <td class="order_number">№ 25</td>
                    <td class="order_date">15.01.2018
                        <svg class="order_switcher-icon js_details-switcher mod_mobile">
                            <use xlink:href="#selector"></use>
                        </svg>
                    </td>

                    <td class="order_byer-link"><a class="link" href="#">Евгений Корж</a></td>
                    <td class="order_details-switcher js_details-switcher"><span>Подробности</span>
                        <svg class="order_switcher-icon mod_desctop">
                            <use xlink:href="#selector"></use>
                        </svg>
                    </td>

                </tr>
                <tr class="order_details">
                    <td class="order_items" colspan="4">
                        <div class="order_items-wrapper">
                            <div class="order-item">
                                <img class="order-item_img" src="img/islands.jpg">
                                <div class="order-item_info">
                                    <div class="order-item_tags">Мальдивы 5<sup>*</sup> Все включено</div>
                                    <div class="order-item_price">12 000 ₿</div>
                                </div>
                            </div>
                            <div class="order-item">
                                <img class="order-item_img" src="img/islands.jpg">
                                <div class="order-item_info">
                                    <div class="order-item_tags">Гавайи 4<sup>*</sup> Не все включено</div>
                                    <div class="order-item_price">5 000 ₿</div>
                                </div>
                            </div>
                            <div class="order-item">
                                <img class="order-item_img" src="img/islands.jpg">
                                <div class="order-item_info">
                                    <div class="order-item_tags">Египет 3<sup>*</sup> Без перелета</div>
                                    <div class="order-item_price">200 000 ₿</div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                </tbody>
            </table>
        </section>

    </div>

@endsection
