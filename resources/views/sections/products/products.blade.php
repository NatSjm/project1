<section class="products">
    <div class="products-list">
        @foreach ($tours as $tour)
            @include ('components.product-card.product-card', ['tour' => $tour])
        @endforeach
    </div>
    @include('components.pagination.pagination')
</section>
