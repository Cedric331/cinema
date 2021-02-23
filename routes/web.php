<?php

use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route qui permet de connaître la langue active
// Route::get('locale', 'LocalizationController@getLang')->name('getlang');

// Route qui permet de modifier la langue
Route::get('locale/{lang}', 'LocalizationController@setLang')->name('setlang');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/products', 'ProductsController@index')->name('products-index');

Auth::routes();

Route::middleware('auth')->group(function () {
   Route::get('/account', 'AccountController@index')->name('account-index');
   Route::post('/create-checkout-session', 'StripeController@index');
   Route::get('/order', 'OrderController@index')->name('order');
   Route::get('/cart/index', 'CartController@index')->name('cart-index');
   Route::post('/cart/add/{id}', 'CartController@store')->name('cart-add');
   Route::post('/cart/remove/{id}', 'CartController@removeItem')->name('cart-remove');
   Route::post('/cart/deleteItem/{id}', 'CartController@deleteItem')->name('cart-deleteItem');
   Route::post('/cart/deleteCart', 'CartController@deleteCart')->name('cart-deleteCart');
   });