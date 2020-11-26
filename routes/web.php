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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard');

Route::get('/profiles', 'UsersController@show');
Route::post('/profile', 'UsersController@update');
Route::post('/profile_password', 'UsersController@update_password');

Route::resource('updates', 'UpdatesController');
Route::resource('products', 'ProductsController');
Route::resource('orders', 'OrdersController');


