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

Route::get('/', 'Shop\ShopController@index');

Route::get('/domek', 'User\UserController@index');
Route::get('/koszyk', 'User\Orders\CartController@index');


Route::get('/panel', 'Dashboard\DashboardController@index');

Route::get('/panel/giery', 'Dashboard\Games\GameController@index');
Route::get('/panel/giery/dodaj', 'Dashboard\Games\GameAddController@showForm');
Route::post('/panel/giery/dodaj', 'Dashboard\Games\GameAddController@add');
Route::get('/panel/giery/{id}', 'Dashboard\Games\GameController@redirect');
Route::get('/panel/giery/{id}/edytuj', 'Dashboard\Games\GameEditController@showForm');
Route::post('/panel/giery/{id}/edytuj', 'Dashboard\Games\GameEditController@save');
Route::get('/panel/giery/{id}/usun', 'Dashboard\Games\GameRemoveController@remove');

Route::get('/panel/kody', 'Dashboard\Discounts\DiscountController@index');
Route::get('/panel/kody/dodaj', 'Dashboard\Discounts\DiscountAddController@showForm');
Route::post('/panel/kody/dodaj', 'Dashboard\Discounts\DiscountAddController@add');

Route::get('/panel/producenci', 'Dashboard\Producers\ProducerController@index');
Route::get('/panel/producenci/dodaj', 'Dashboard\Producers\ProducerAddController@showForm');
Route::post('/panel/producenci/dodaj', 'Dashboard\Producers\ProducerAddController@add');
Route::get('/panel/producenci/{id}', 'Dashboard\Producers\ProducerController@redirect');
Route::get('/panel/producenci/{id}/edytuj', 'Dashboard\Producers\ProducerEditController@showForm');
Route::post('/panel/producenci/{id}/edytuj', 'Dashboard\Producers\ProducerEditController@save');
Route::get('/panel/producenci/{id}/usun', 'Dashboard\Producers\ProducerRemoveController@remove');

Route::get('/panel/gatunki', 'Dashboard\Genres\GenreController@index');
Route::get('/panel/gatunki/dodaj', 'Dashboard\Genres\GenreAddController@showForm');
Route::get('/panel/gatunki/{id}', 'Dashboard\Genres\GenreController@redirect');
Route::get('/panel/gatunki/{id}/edytuj', 'Dashboard\Genres\GenreEditController@showForm');
Route::post('/panel/gatunki/{id}/edytuj', 'Dashboard\Genres\GenreEditController@save');
Route::get('/panel/gatunki/{id}/usun', 'Dashboard\Genres\GenreRemoveController@remove');
Route::post('/panel/gatunki/dodaj', 'Dashboard\Genres\GenreAddController@add');
Route::post('/panel/gatunki/dodaj', 'Dashboard\Genres\GenreAddController@add');

Route::get('/wyloguj', 'User\Auth\LogoutController@logout');

Route::get('/login', 'User\Auth\LoginController@showForm');
Route::post('/login', 'User\Auth\LoginController@login');

Route::get('/rejestracja', 'User\Auth\RegisterController@showForm');
Route::post('/rejestracja', 'User\Auth\RegisterController@register');
