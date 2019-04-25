<section class="products">
    <div class="products-list">
        @for ($i = 0; $i < 12; $i++)
            @include ('components.product-card.product-card')
        @endfor
    </div>
    @include('components.pagination.pagination')
</section>
