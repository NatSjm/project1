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
    return view('/pages/index', ['name1' =>'img/mountains.jpg',
                                       'name2' =>'img/palm.jpg',
                                        'name3' =>'img/train.jpg',
                                       'name' => 'null']);
});

Route::get('/gydeline', function () {
    return view('welcome', ['name' => 'img/mountains.jpg']);
});
