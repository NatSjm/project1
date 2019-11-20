<section class="products">
    <div class="products-list">
        @foreach ($tours as $tour)
            @include ('components.product-card.product-card', ['tour' => $tour])
        @endforeach
    </div>
    {{--{{$tours->appends(request()->query())->links('components.pagination.pagination', ['tours' => $tours])}}--}}
</section>
