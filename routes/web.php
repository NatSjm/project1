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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/indexcat', 'HomeController@categories');




Route::get('/api/index', 'IndexController')->name('index');
Route::get('/api/search', 'ProductController@index');

Route::get('/api/product/{id}', 'ProductController@show');
Route::get('/api/seller/{id}', 'SellerController');

Route::get('/api/orders/{id}', 'OrderController@index');
Route::get('/api/purchases/{id}', 'PurchaseController');

Route::patch('api/profile/{user}', 'ProfileController@update');

Route::post('api/makeOrder', 'OrderController@handleOrder');

Route::post('api/tour', 'ProductController@store');
Route::patch('api/tour/{tour}', 'ProductController@update');
Route::delete('api/tour/{tour}', 'ProductController@destroy');

Route::post('api/tour/{id}/comment', 'ProductController@makeComment');





Route::get('tour/create', 'ProductController@create')->name('product-create-page')->middleware('auth');
Route::post('tour', 'ProductController@store')->name('tour.store')->middleware('auth');


Route::get('search', 'ProductController@index')->name('search-page');
Route::get('tour/{id}', 'ProductController@show')->name('product-page');

Route::get('tour/{tour}/edit', 'ProductController@edit')->name('product-edit-page');
Route::patch('tour/{tour}', 'ProductController@update')->name('tour.update');
Route::delete('tour/{tour}', 'ProductController@destroy')->name('tour.destroy');


Route::get('seller/{user}', 'SellerController')->name('seller-page');

Route::get('cart/{tour}', 'CartController@add')->name('addToCart');
Route::get('cart', 'CartController@index')->name('cart');
Route::get('cart/{id}/delete', 'CartController@removeItem')->name('deleteFromCart');


Route::middleware(['auth'])->group(function () {
    Route::get('makeOrder', 'OrderController@handleOrder')->name('makeOrder');
    Route::get('orders', 'OrderController@index')->name('orders-page');


    Route::get('purchases', 'PurchaseController')->name('purchases-page');


    Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('person-page');
    Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

});


Route::get('/gydeline', function () {
    return view('/pages/gydeline/gydeline', ['name' => 'img/mountains.jpg']);
});


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

//Route::get('/home', 'HomeController@index')->name('home');
