@extends('layout')
@section ('content')
    <div class="orders-page_container cont">
        <div class="orders-page_breadcrumbs">
            @include('components.breadcrumbs.breadcrumbs')
        </div>
        <h2 class="headline-2 orders-page_title">Мои покупки</h2>
        @isset($deals)
        <section class="orders-page_orders mod_border-grey">
            <table class="orders table">
                <tbody>
                @foreach($deals as $deal)
                    @include('pages.orders.order.order', ['deal' => $deal])
                @endforeach
                </tbody>
            </table>
        </section>
            @endisset

    </div>

@endsection
