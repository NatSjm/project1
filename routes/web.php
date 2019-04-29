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
    return view('/pages/index/index', ['name1' =>'img/mountains.jpg',
                                       'name2' =>'img/palm.jpg',
                                        'name3' =>'img/train.jpg',
                                       'name' => 'null',
                                       'title' => 'index',
                                        'body_class' => 'index']);

});

Route::get('/gydeline', function () {
    return view('/pages/gydeline/gydeline', ['name' => 'img/mountains.jpg']);
});

Route::get('/seller', function () {
    return view('/pages/seller/seller', ['name' => 'img/mountains.jpg',
                                                'body_class'=> 'seller-page',
                                                 'crumb_level2'=>'Михаил Павлов',
                                                 'crumb_level3'=> 'Мои предложения']);
});

Route::get('/search', function () {
    return view('/pages/search/search', ['name' => 'img/mountains.jpg',
                                         'body_class'=> 'search-page',
                                         'crumb_level2'=>'Поиск']);
});

