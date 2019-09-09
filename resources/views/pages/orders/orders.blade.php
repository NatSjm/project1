@extends('layout')
@section ('content')
    <div class="orders-page_container cont">
        <div class="orders-page_breadcrumbs">
            @if(Request::route()->getName() == 'purchases-page')
                {{ Breadcrumbs::render('purchases') }}
            @else
                {{ Breadcrumbs::render('orders') }}
            @endif
        </div>
        <h2 class="headline-2 orders-page_title">{{ $title }}</h2>
        @if(count($deals))
            <section class="orders-page_orders mod_border-grey">
                <table class="orders table">
                    <tbody>
                    @foreach($deals as $deal)
                        @include('pages.orders.order.order', ['deal' => $deal])
                    @endforeach
                    </tbody>
                </table>
            </section>
        @endif

    </div>

@endsection
