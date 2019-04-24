@extends('layout')

@section('content')


@include('components.breadcrumbs.breadcrumbs')

<h2>Мои предложения</h2>

<div class="content-wrapper">
<section class="filter"></section>

<section class="products">
    <div class="products-list">
        @for ($i = 0; $i < 12; $i++)
            @include ('components.product-card.product-card')
        @endfor
    </div>
    @include('components.pagination.pagination')
</section>


</div>




@endsection


