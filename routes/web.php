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


//CRUD COMBO

Route::get('/admin/combo/index', 'App\Http\Controllers\Combo\ComboController@index')->name("combo.index");
Route::get('/admin/combo/create', 'App\Http\Controllers\Combo\ComboController@create')->name('combo.create');
Route::post('/admin/combo/saved', 'App\Http\Controllers\Combo\ComboController@save')->name('combo.save');


//AUTH ROUTES
Auth::routes();


