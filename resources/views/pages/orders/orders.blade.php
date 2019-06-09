@extends('layout')
@section ('content')
    <div class="orders-page_container cont">
        <div class="orders-page_breadcrumbs">
            @include('components.breadcrumbs.breadcrumbs')
        </div>
        <h2 class="headline-2 orders-page_title">Мои заказы</h2>
        <section class="orders-page_orders mod_border-grey">
            <table class="orders table">
                <tbody>
                @for ($i = 0; $i < 3; $i++)
                    @include('pages.orders.order.order')
                @endfor
                </tbody>
            </table>
        </section>

    </div>

@endsection
