<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



Route::get('contact', 'ContactController@index');
Route::post('contact-submit', 'ContactController@Submit');



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

Route::get('add_article', 'AddController@index');
Route::post('submit_article', 'AddController@SubmitArticle');

Route::get('admin', 'ConfigController@index');
Route::post('config/setdelay', 'ConfigController@setdelay');
Route::post('adminlistefilter', 'ConfigController@filter');


Route::get('messages', 'MessageController@index');
Route::get('disable_msg', 'MessageController@DisableMessage');
