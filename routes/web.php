<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MainController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','App\Http\Controllers\MainController@index')->name('main');

Route::get('/basket','App\Http\Controllers\BasketController@basket')->name('basket');
Route::get('basket/place','App\Http\Controllers\BasketController@basketPlace')->name('basket-place');
 Route::post('/basket/add/{id}','App\Http\Controllers\BasketController@basketAdd')->name('basket-add');
 Route::post('/basket/remove/{id}','App\Http\Controllers\BasketController@basketRemove')->name('basket-remove');


Route::get('/categories','App\Http\Controllers\MainController@categories')->name('categories');
Route::get('category/{category}','App\Http\Controllers\MainController@category')->name('category');

Route::get('/{product}','App\Http\Controllers\MainController@product')->name('product');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
