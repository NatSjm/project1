<div class="order-item">
    <img class="order-item_img" src="/storage/images/{{$tour->mainImg->path}}">
    <div class="order-item_info">
        <div class="order-item_tags">{{ $tour->country->name }} {{ $tour->hotel->hotel_class }}<sup>*</sup>
            {{ $tour->tourType->name }}</div>
        <div class="order-item_price">{{ $tour->formattedPrice }} ₿</div>
    </div>
</div>
