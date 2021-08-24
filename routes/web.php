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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");

Auth::routes();


Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/create', 'App\Http\Controllers\FormController@form')->name("create");
Route::get('/create/success', 'App\Http\Controllers\FormController@success')->name("create.success");

Route::post('/create/save', 'App\Http\Controllers\FormController@save')->name("create.save");



Route::get('/combos', 'App\Http\Controllers\CombosController@combos')->name("combos.list");
Route::get('/combos/show/{id}', 'App\Http\Controllers\CombosController@showCombo')->name("combos.show");

Route::delete('combo/delete/{id}','App\Http\Controllers\CombosController@deleteCombo')->name('combo.delete');

