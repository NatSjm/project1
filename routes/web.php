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

Route::get('makeOrder', 'OrderController@handleOrder')->name('makeOrder')->middleware('auth');

Route::get('purchases', 'PurchaseController')->name('purchases')->middleware('auth');


Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');




Route::get('/gydeline', function () {
    return view('/pages/gydeline/gydeline', ['name' => 'img/mountains.jpg']);
});




//Route::get('/orders', function () {
//    return view('/pages/orders/orders', ['body_class'   => 'orders-page',
//                                               'crumb_level2' => 'Михаил Павлов',
//                                                'crumb_level3' => ['Мои заказы']
//    ]);
//});




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

//Route::get('/enter', function () {
//    return view('/pages/enter/enter', ['body_class'   => 'enter-page'
//
//    ]);
//});






//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//POST запрос аутентификации на сайте
Route::post('login', 'Auth\LoginController@login');
//POST запрос на выход из системы (логаут)
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

/**
 * Маршруты регистрации...
 */

//страница с формой Laravel регистрации пользователей
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//POST запрос регистрации на сайте
Route::post('register', 'Auth\RegisterController@register');

/**
 * URL для сброса пароля...
 */

//POST запрос для отправки email письма пользователю для сброса пароля
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//ссылка для сброса пароля (можно размещать в письме)
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//страница с формой для сброса пароля
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//POST запрос для сброса старого и установки нового пароля
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('/home', 'HomeController@index')->name('home');
