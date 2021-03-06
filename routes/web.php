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

Route::get('/biblioteka', 'User\Orders\LibraryController@index');

Route::get('/koszyk', 'User\Orders\CartController@index');
Route::get('/koszyk/dodaj/{graId}', 'User\Orders\CartController@addGame');
Route::get('/koszyk/usun/{graId}', 'User\Orders\CartController@removeGame');
Route::post('/koszyk/kod-rabatowy/dodaj', 'User\Orders\CartController@addDiscountCode');
Route::get('/koszyk/kod-rabatowy/usun', 'User\Orders\CartController@removeDiscountCode');
Route::get('/koszyk/faktura/dodaj', 'User\Orders\CartController@addInvoice');
Route::post('/koszyk/faktura/edytuj', 'User\Orders\CartController@editInvoice');
Route::get('/koszyk/faktura/usun', 'User\Orders\CartController@removeInvoice');
Route::get('/koszyk/zakoncz', 'User\Orders\CartController@end');

Route::get('/panel', 'Dashboard\DashboardController@index');

Route::get('/panel/giery', 'Dashboard\Games\GameController@index');
Route::get('/panel/giery/dodaj', 'Dashboard\Games\GameAddController@showForm');
Route::post('/panel/giery/dodaj', 'Dashboard\Games\GameAddController@add');
Route::get('/panel/giery/{id}/edytuj', 'Dashboard\Games\GameEditController@showForm');
Route::post('/panel/giery/{id}/edytuj', 'Dashboard\Games\GameEditController@save');
Route::get('/panel/giery/{id}/usun', 'Dashboard\Games\GameRemoveController@remove');

Route::get('/panel/kody', 'Dashboard\Discounts\DiscountController@index');
Route::get('/panel/kody/dodaj', 'Dashboard\Discounts\DiscountAddController@showForm');
Route::post('/panel/kody/dodaj', 'Dashboard\Discounts\DiscountAddController@add');
Route::get('/panel/kody/{id}', 'Dashboard\Discounts\DiscountController@redirect');
Route::get('/panel/kody/{id}/edytuj', 'Dashboard\Discounts\DiscountEditController@showForm');
Route::post('/panel/kody/{id}/edytuj', 'Dashboard\Discounts\DiscountEditController@save');
Route::get('/panel/kody/{id}/usun', 'Dashboard\Discounts\DiscountRemoveController@remove');


Route::get('/panel/producenci', 'Dashboard\Producers\ProducerController@index');
Route::get('/panel/producenci/dodaj', 'Dashboard\Producers\ProducerAddController@showForm');
Route::post('/panel/producenci/dodaj', 'Dashboard\Producers\ProducerAddController@add');
Route::get('/panel/producenci/{id}/edytuj', 'Dashboard\Producers\ProducerEditController@showForm');
Route::post('/panel/producenci/{id}/edytuj', 'Dashboard\Producers\ProducerEditController@save');
Route::get('/panel/producenci/{id}/usun', 'Dashboard\Producers\ProducerRemoveController@remove');

Route::get('/panel/gatunki', 'Dashboard\Genres\GenreController@index');
Route::get('/panel/gatunki/dodaj', 'Dashboard\Genres\GenreAddController@showForm');
Route::get('/panel/gatunki/{id}/edytuj', 'Dashboard\Genres\GenreEditController@showForm');
Route::post('/panel/gatunki/{id}/edytuj', 'Dashboard\Genres\GenreEditController@save');
Route::get('/panel/gatunki/{id}/usun', 'Dashboard\Genres\GenreRemoveController@remove');
Route::post('/panel/gatunki/dodaj', 'Dashboard\Genres\GenreAddController@add');

Route::get('/panel/promocje', 'Dashboard\Sales\SaleController@index');
Route::get('/panel/promocje/dodaj', 'Dashboard\Sales\SaleAddController@showForm');
Route::get('/panel/promocje/{id}/edytuj', 'Dashboard\Sales\SaleEditController@showForm');
Route::post('/panel/promocje/{id}/edytuj', 'Dashboard\Sales\SaleEditController@save');
Route::get('/panel/promocje/{id}/usun', 'Dashboard\Sales\SaleRemoveController@remove');
Route::post('/panel/promocje/dodaj', 'Dashboard\Sales\SaleAddController@add');

Route::get('/panel/uzytkownicy', 'Dashboard\Users\UserController@index');
Route::get('/panel/uzytkownicy/{id}/edytuj', 'Dashboard\Users\UserEditController@showForm');
Route::post('/panel/uzytkownicy/{id}/edytuj', 'Dashboard\Users\UserEditController@save');
Route::get('/panel/uzytkownicy/{id}/usun', 'Dashboard\Users\UserRemoveController@remove');

Route::get('/panel/faktury', 'Dashboard\Facturies\FactureController@index');
Route::get('/panel/faktury/{id}/edytuj', 'Dashboard\Facturies\FactureEditController@showForm');
Route::post('/panel/faktury/{id}/edytuj', 'Dashboard\Facturies\FactureEditController@save');
Route::get('/panel/faktury/{id}/usun', 'Dashboard\Facturies\FactureRemoveController@remove');


Route::get('/panel/zamowienia', 'Dashboard\Orders\OrderController@index');


Route::get('/wyloguj', 'User\Auth\LogoutController@logout');

Route::get('/login', 'User\Auth\LoginController@showForm');
Route::post('/login', 'User\Auth\LoginController@login');

Route::get('/rejestracja', 'User\Auth\RegisterController@showForm');
Route::post('/rejestracja', 'User\Auth\RegisterController@register');
