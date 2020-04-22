<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



Route::get('contact', 'ContactController@index');
Route::get('contact-custom_creation', 'ContactController@index');
Route::get('contact-existing_creation', 'ContactController@ShowExistingCreation');
Route::get('contact-informations', 'ContactController@ShowInformations');

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
Route::post('adminlistefilter', 'ConfigController@filter');

