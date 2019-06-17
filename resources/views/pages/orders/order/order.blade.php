

    <tr class="order js_order-details-switcher mod_color-light-milk">
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
                @for ($i = 0; $i < 3; $i++)
                    @include('pages.orders.order.order-item.order-item')
                @endfor

            </div>
        </td>
    </tr>



