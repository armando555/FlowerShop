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
Route::get('/admin/flower/delete/{id}', 'App\Http\Controllers\Flower\FlowerController@delete')->name("flower.delete");
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
Route::post('/admin/cart/addCandy/{id}', 'App\Http\Controllers\Cart\CartController@addCandy')->name('cart.addCandy');
Route::post('/admin/cart/buy', 'App\Http\Controllers\Cart\CartController@buy')->name('cart.buy');


//BOUQUET ROUTES

Route::get('/admin/bouquet/index', 'App\Http\Controllers\Bouquet\BouquetController@index')->name('bouquet.index');
Route::get('/admin/bouquet/create', 'App\Http\Controllers\Bouquet\BouquetController@create')->name('bouquet.create');
Route::post('/admin/bouquet/created', 'App\Http\Controllers\Bouquet\BouquetController@save')->name('bouquet.save');
Route::redirect('/admin/bouquet/show/', '/admin/bouquet/index');
Route::get('/admin/bouquet/show/{id}', 'App\Http\Controllers\Bouquet\BouquetController@show')->name('bouquet.show');
Route::get('/admin/bouquet/edit/{id}','App\Http\Controllers\Bouquet\BouquetController@edit')->name('bouquet.edit');
Route::get('/admin/bouquet/delete/{id}', 'App\Http\Controllers\Bouquet\BouuetController@delete')->name("bouquet.delete");
Route::post('/admin/bouquet/update', 'App\Http\Controllers\Bouquet\BouquetController@update')->name('bouquet.update');



//CRUD COMBO

Route::get('/admin/combo/index', 'App\Http\Controllers\Combo\ComboController@index')->name("combo.index");
Route::get('/admin/combo/create', 'App\Http\Controllers\Combo\ComboController@create')->name('combo.create');
Route::post('/admin/combo/saved', 'App\Http\Controllers\Combo\ComboController@save')->name('combo.save');
Route::redirect('/admin/combo/show/', '/admin/combo/index');
Route::get('/admin/combo/show/{id}', 'App\Http\Controllers\Combo\ComboController@show')->name('combo.show');
Route::get('/admin/combo/edit/{id}','App\Http\Controllers\Combo\ComboController@edit')->name('combo.edit');
Route::get('/admin/combo/delete/{id}', 'App\Http\Controllers\Combo\ComboController@delete')->name("combo.delete");
Route::post('/admin/combo/update', 'App\Http\Controllers\Combo\ComboController@update')->name('combo.update');

//CRUD CANDY
Route::get('/admin/candy/index', 'App\Http\Controllers\Candy\CandyController@index')->name("candy.index");
Route::get('/admin/candy/create', 'App\Http\Controllers\Candy\CandyController@create')->name('candy.create');
Route::post('/admin/candy/saved', 'App\Http\Controllers\Candy\CandyController@save')->name('candy.save');
Route::redirect('/admin/candy/show/', '/admin/candy/index');
Route::get('/admin/candy/show/{id}', 'App\Http\Controllers\Candy\CandyController@show')->name('candy.show');
Route::get('/admin/candy/edit/{id}','App\Http\Controllers\Candy\CandyController@edit')->name('candy.edit');
Route::get('/admin/candy/delete/{id}', 'App\Http\Controllers\Candy\CandyController@delete')->name("candy.delete");
Route::post('/admin/candy/update', 'App\Http\Controllers\Candy\CandyController@update')->name('candy.update');


//ADMIN PANEL
Route::get('/admin/panel/index', 'App\Http\Controllers\Admin\PanelController@index')->name("panel.index");
Route::get('/admin/panel/search/', 'App\Http\Controllers\Admin\PanelController@searchProducts')->name("panel.search");
Route::get('/admin/cart/generatePdf/{id}', 'App\Http\Controllers\Admin\DynamicPDFController@generatePdf')->name('cart.generatePdf');

//USER ROUTES COMBO

Route::get('/combo/index', 'App\Http\Controllers\Combo\ComboControllerUser@index')->name("combo.index.user");
Route::redirect('/combo/show/', 'combo/index');
Route::get('/combo/show/{id}', 'App\Http\Controllers\Combo\ComboControllerUser@show')->name('combo.show.user');

//USER ROUTES CANDY
Route::get('/candy/index', 'App\Http\Controllers\Candy\CandyControllerUser@index')->name("candy.index.user");
Route::redirect('candy/show/', 'candy/index');
Route::get('/candy/show/{id}', 'App\Http\Controllers\Candy\CandyControllerUser@show')->name('candy.show.user');


//CRUD FLOWER
Route::get('/flower/index', 'App\Http\Controllers\Flower\FlowerControllerUser@index')->name('flower.index.user');
Route::redirect('/flower/show/', '/flower/index');
Route::get('/flower/show/{id}', 'App\Http\Controllers\Flower\FlowerControllerUser@show')->name('flower.show.user');


//CRUD BOUQUET
Route::get('/bouquet/index', 'App\Http\Controllers\Bouquet\BouquetControllerUser@index')->name('bouquet.index.user');
Route::redirect('/bouquet/show/', '/bouquet/index');
Route::get('/bouquet/show/{id}', 'App\Http\Controllers\Bouquet\BouquetControllerUser@show')->name('bouquet.show.user');



//AUTH ROUTES
Auth::routes();


