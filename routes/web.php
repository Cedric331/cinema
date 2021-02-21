<?php

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
Route::get('locale', 'LocalizationController@getLang')->name('getlang');

// Route qui permet de modifier la langue
Route::get('locale/{lang}', 'LocalizationController@setLang')->name('setlang');

Route::get('/', function () {
    return view('home');
});

Route::get('/products', 'ProductsController@index')->name('products-index');

Auth::routes();

Route::post('/cart/add/{id}', 'CartController@store')->name('cart-add');
Route::post('/cart/remove/{id}', 'CartController@remove')->name('cart-add');