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




Route::get('/', 'IndexController')->name('index');



Route::get('search', 'ProductController@index')->name('search');
Route::get('tour/{id}', 'ProductController@show')->name('tour');

Route::get('seller/{user}', 'SellerController')->name('seller');

Route::get('cart/{tour}', 'CartController@add')->name('addToCart');
Route::get('cart', 'CartController@index')->name('cart');
Route::get('cart/{id}/delete', 'CartController@removeItem')->name('deleteFromCart');




Route::get('/gydeline', function () {
    return view('/pages/gydeline/gydeline', ['name' => 'img/mountains.jpg']);
});




Route::get('/orders', function () {
    return view('/pages/orders/orders', ['body_class'   => 'orders-page',
                                               'crumb_level2' => 'Михаил Павлов',
                                                'crumb_level3' => ['Мои заказы']
    ]);
});




Route::get('/person', function () {
    return view('/pages/person/person', ['body_class'   => 'person-page',
                                     'crumb_level2' => 'Михаил Павлов',
                                     'crumb_level3' => ['Личные данные']
    ]);
});

Route::get('/product/create', function () {
    return view('/pages/product/product-create/product-create', ['body_class'   => 'product-create-page',
                                         'crumb_level2' => 'Михаил Павлов',
                                         'crumb_level3' => ['Новое объявление'],
                                         'categories' => ['ind'=>'Индустриальный', 'luxury'=>'Luxury','all-inclus'=> 'Все включено',
                                                                                  'fam'=>'Семейный отдых', 'gastro'=>'Гастрономический', 'keep-calm'=>'Спокойный отдых',
                                                                                  'intertainment'=>'Программа развлечений', 'shop'=>'Шоппинг', 'extreem'=>'Экстрим',
                                                                                  'beach'=>'Пляжный', 'sp'=> 'SPA']
    ]);
});

Route::get('/enter', function () {
    return view('/pages/enter/enter', ['body_class'   => 'enter-page'

    ]);
});





