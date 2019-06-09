<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('/pages/index/index', ['name1'      => 'img/mountains.jpg',
                                       'name2'      => 'img/palm.jpg',
                                       'name3'      => 'img/train.jpg',
                                       'name'       => 'null',
                                       'title'      => 'index',
                                       'body_class' => 'index'
                                       ]);

});

Route::get('/gydeline', function () {
    return view('/pages/gydeline/gydeline', ['name' => 'img/mountains.jpg']);
});

Route::get('/seller', function () {
    return view('/pages/seller/seller', ['name'         => 'img/mountains.jpg',
                                         'body_class'   => 'seller-page',
                                         'crumb_level2' => 'Михаил Павлов',
                                         'crumb_level3' => ['Мои предложения'],
                                         'categories' => ['ind'=>'Индустриальный', 'luxury'=>'Luxury','all-inclus'=> 'Все включено',
                                                              'fam'=>'Семейный отдых', 'gastro'=>'Гастрономический', 'keep calm'=>'Спокойный отдых',
                                                              'intertainment'=>'Программа развлечений', 'shop'=>'Шоппинг', 'extreem'=>'Экстрим',
                                                              'beach'=>'Пляжный', 'sp'=> 'SPA']
    ]);
});

Route::get('/search', function () {
    return view('/pages/search/search', ['name'         => 'img/mountains.jpg',
                                         'body_class'   => 'search-page',
                                         'crumb_level2' => 'Поиск',
                                          'categories' => ['ind'=>'Индустриальный', 'luxury'=>'Luxury','all-inclus'=> 'Все включено',
                                                           'fam'=>'Семейный отдых', 'gastro'=>'Гастрономический', 'keep calm'=>'Спокойный отдых',
                                                           'intertainment'=>'Программа развлечений', 'shop'=>'Шоппинг', 'extreem'=>'Экстрим',
                                                           'beach'=>'Пляжный', 'sp'=> 'SPA']
    ]);
});

Route::get('/product', function () {
    return view('/pages/product/product', ['name'         => 'img/mountains.jpg',
                                           'body_class'   => 'product-page',
                                           'crumb_level2' => 'Михаил Павлов',
                                           'crumb_level3' => ['Отель Мираколь', 'Неаполь', '4*']
                                           ]);
});

Route::get('/orders', function () {
    return view('/pages/orders/orders', ['body_class'   => 'orders-page',
                                               'crumb_level2' => 'Михаил Павлов',
                                                'crumb_level3' => ['Мои заказы']
    ]);
});


Route::get('/cart', function () {
    return view('/pages/cart/cart', ['body_class'   => 'cart-page',
                                         'crumb_level2' => 'Михаил Павлов',
                                         'crumb_level3' => ['Корзина']
    ]);
});




