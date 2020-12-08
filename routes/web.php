<?php

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard');

Route::get('/profiles', 'UsersController@show');
Route::post('/profile', 'UsersController@update');
Route::post('/profile_password', 'UsersController@update_password');

Route::resource('updates', 'UpdatesController');

Route::resource('products', 'ProductsController');

Route::get('orders', 'OrdersController@index');
Route::post('orders/{id}', 'OrdersController@pesan');
Route::delete('orders/{id}', 'OrdersController@delete');
Route::get('checkout', 'OrdersController@checkout');

Route::get('history', 'HistoryController@index');
Route::get('history/{id}', 'HistoryController@show');
Route::delete('history/{id}', 'HistoryController@delete');
Route::get('history/{id}/info', 'HistoryController@info');
Route::post('history/{id}', 'HistoryController@update');



