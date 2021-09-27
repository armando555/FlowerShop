<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
//LANGUAGE ROUTE
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\Language\LanguageController@switchLang']);
Route::get('/languageDemo', 'App\Http\Controllers\Home\HomeController@languageDemo');

//HOME ROUTES

Route::get('/', 'App\Http\Controllers\Home\HomeController@index')->name("home.index");
Route::get('/home', 'App\Http\Controllers\Home\HomeController@index')->name('home');

//FLOWERS ROUTES



//CRUD FLOWER
Route::get('/admin/flower/index', 'App\Http\Controllers\Flower\FlowerController@index')->name('flower.index');
Route::get('/admin/flower/create', 'App\Http\Controllers\Flower\FlowerController@create')->name('flower.create');
Route::post('/admin/flower/created', 'App\Http\Controllers\Flower\FlowerController@save')->name('flower.save');
Route::redirect('/admin/flower/show/', '/admin/flower/index');
Route::get('/admin/flower/show/{id}', 'App\Http\Controllers\Flower\FlowerController@show')->name('flower.show');
Route::get('/admin/flower/edit/{id}','App\Http\Controllers\Flower\FlowerController@edit')->name('flower.edit');
Route::post('/admin/flower/update', 'App\Http\Controllers\Flower\FlowerController@update')->name('flower.update');


//CART ROUTES
Route::get('/admin/cart/show', 'App\Http\Controllers\Cart\CartController@show')->name('cart.show');
Route::get('/admin/cart/delete', 'App\Http\Controllers\Cart\CartController@deleteAll')->name('cart.delete');
Route::get('/admin/cart/deleteFlowers', 'App\Http\Controllers\Cart\CartController@deleteFlowers')->name('cart.deleteFlower');
Route::get('/admin/cart/deleteBouquets', 'App\Http\Controllers\Cart\CartController@deleteBouquets')->name('cart.deleteBouquets');
Route::get('/admin/cart/deleteCombos', 'App\Http\Controllers\Cart\CartController@deleteCombos')->name('cart.deleteCombos');
Route::get('/admin/cart/deleteCandies', 'App\Http\Controllers\Cart\CartController@deleteCandies')->name('cart.deleteCandies');
Route::post('/admin/cart/addFlower/{id}', 'App\Http\Controllers\Cart\CartController@addFlower')->name('cart.addFlower');
Route::post('/admin/cart/addBouquet/{id}', 'App\Http\Controllers\Cart\CartController@addBouquet')->name('cart.addBouquet');
Route::post('/admin/cart/addCombo/{id}', 'App\Http\Controllers\Cart\CartController@addCombo')->name('cart.addCombo');
Route::post('/admin/cart/buy', 'App\Http\Controllers\Cart\CartController@buy')->name('cart.buy');


//BOUQUET ROUTES

Route::get('/admin/bouquet/index', 'App\Http\Controllers\Bouquet\BouquetController@index')->name('bouquet.index');
Route::get('/admin/bouquet/create', 'App\Http\Controllers\Bouquet\BouquetController@create')->name('bouquet.create');
Route::post('/admin/bouquet/created', 'App\Http\Controllers\Bouquet\BouquetController@save')->name('bouquet.save');
Route::redirect('/admin/bouquet/show/', '/admin/bouquet/index');
Route::get('/admin/bouquet/show/{id}', 'App\Http\Controllers\Bouquet\BouquetController@show')->name('bouquet.show');
Route::get('/admin/bouquet/edit/{id}','App\Http\Controllers\Bouquet\BouquetController@edit')->name('bouquet.edit');
Route::post('/admin/bouquet/update', 'App\Http\Controllers\Bouquet\BouquetController@update')->name('bouquet.update');



//CRUD COMBO

Route::get('/admin/combo/index', 'App\Http\Controllers\Combo\ComboController@index')->name("combo.index");
Route::get('/admin/combo/create', 'App\Http\Controllers\Combo\ComboController@create')->name('combo.create');
Route::post('/admin/combo/saved', 'App\Http\Controllers\Combo\ComboController@save')->name('combo.save');
Route::redirect('/admin/combo/show/', '/admin/combo/index');
Route::get('/admin/combo/show/{id}', 'App\Http\Controllers\Combo\ComboController@show')->name('combo.show');
Route::get('/admin/combo/edit/{id}','App\Http\Controllers\Combo\ComboController@edit')->name('combo.edit');
Route::post('/admin/combo/update', 'App\Http\Controllers\Combo\ComboController@update')->name('combo.update');

//CRUD CANDY
Route::get('/admin/candy/index', 'App\Http\Controllers\Candy\CandyController@index')->name("candy.index");
Route::get('/admin/candy/create', 'App\Http\Controllers\Candy\CandyController@create')->name('candy.create');
Route::post('/admin/candy/saved', 'App\Http\Controllers\Candy\CandyController@save')->name('candy.save');
Route::redirect('/admin/candy/show/', '/admin/candy/index');
Route::get('/admin/candy/show/{id}', 'App\Http\Controllers\Candy\CandyController@show')->name('candy.show');
Route::get('/admin/candy/edit/{id}','App\Http\Controllers\Candy\CandyController@edit')->name('candy.edit');
Route::post('/admin/candy/update', 'App\Http\Controllers\Candy\CandyController@update')->name('candy.update');





//AUTH ROUTES
Auth::routes();


