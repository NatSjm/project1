<?php

Breadcrumbs::for('index', function ($trail) {
    $trail->push('Главная', route('index'));
});

Breadcrumbs::for('search', function ($trail) {
    $trail->parent('index');
    $trail->push('Поиск', route('search-page'));
});

Breadcrumbs::for('seller', function ($trail, $user) {
    $trail->parent('index');
    $trail->push($user->fullName, route('seller-page', $user));
});

Breadcrumbs::for('product', function ($trail, $tour) {
    $trail->parent('seller', $tour->seller);
    $trail->push($tour->name . ' '
        . $tour->hotel->hotel_class . '*', route('product-page', $tour));
});

Breadcrumbs::for('cart', function ($trail) {
    $trail->parent('seller', auth()->user());
    $trail->push('Корзина', route('cart'));
});

Breadcrumbs::for('orders', function ($trail) {
    $trail->parent('seller', auth()->user());
    $trail->push('Мои заказы', route('orders-page'));
});

Breadcrumbs::for('purchases', function ($trail) {
    $trail->parent('seller', auth()->user());
    $trail->push('Мои покупки', route('purchases-page'));
});

Breadcrumbs::for('person', function ($trail, $user) {
    $trail->parent('seller', $user);
    $trail->push('Личные данные', route('person-page', $user));
});

Breadcrumbs::for('product-create', function ($trail) {
    $trail->parent('seller', auth()->user());
    $trail->push('Новое объявление', route('product-create-page'));
});







