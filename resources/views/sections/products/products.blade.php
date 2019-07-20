<section class="products">
    <div class="products-list">
        @foreach ($tours as $tour)
            @include ('components.product-card.product-card', ['tour' => $tour])
        @endforeach
    </div>
    {{$tours->links('components.pagination.pagination', ['tours' => $tours])}}
</section>
