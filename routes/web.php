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

Route::get('/', 'MainController@index');

Route::get('/akun', 'AkunController@index');
Route::get('/akun/create', 'AkunController@create');
Route::get('/akun/{admin}', 'AkunController@show');
Route::post('/akun', 'AkunController@store');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard');
Route::get('/news', 'HomeController@news');

