<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('about', function () {
    return view('about');
});

Route::get('shop', 'ShopController@index');

Route::get('about', function () {
    return view('about');
});

Route::get('login', 'MainController@index');
Route::post('/main/checklogin', 'MainController@checklogin');
Route::get('main/succeslogin', 'MainController@succeslogin');
Route::get('main/logout', 'MainController@logout');

Route::get('edit', 'EditController@index');
Route::post('edit/article', 'EditController@update');

Route::get('admin', 'ConfigController@index');
Route::post('config/setdelay', 'ConfigController@setdelay');

