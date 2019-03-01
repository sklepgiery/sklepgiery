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
    return view('welcome');
});
Route::get('/domek', 'User\UserController@index');

Route::get('/wyloguj', 'User\Auth\LogoutController@logout');

Route::get('/login', 'User\Auth\LoginController@showForm');
Route::post('/login', 'User\Auth\LoginController@login');

Route::get('/rejestracja', 'User\Auth\RegisterController@showForm');
Route::post('/rejestracja', 'User\Auth\RegisterController@register');