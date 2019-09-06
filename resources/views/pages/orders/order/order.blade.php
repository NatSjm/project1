

    <tr class="order js_order-details-switcher mod_color-light-milk">
        <td class="order_number">{{ $deal->id }}</td>
        <td class="order_date">{{ $deal->created_at }}
            <svg class="order_switcher-icon js_details-switcher mod_mobile">
                <use xlink:href="#selector"></use>
            </svg>
        </td>

        <td class="order_byer-link"><a class="link" href="#">{{(Request::route()->getName() == 'purchases-page')? $deal->seller->fullName : $deal->buyer->fullName}}</a></td>

        <td class="order_details-switcher js_details-switcher"><span>Подробности</span>
            <svg class="order_switcher-icon mod_desctop">
                <use xlink:href="#selector"></use>
            </svg>
        </td>
    </tr>
    <tr class="order_details">
        <td class="order_items" colspan="4">
            <div class="order_items-wrapper">
                @foreach ($deal->orders as $order)
                    @include('pages.orders.order.order-item.order-item', ['tour' => $order->tour])
                @endforeach

            </div>
        </td>
    </tr>



