<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

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



Auth::routes([
    'reset' => false,
    'confirm' => false,
]);

Route::get('reset', 'App\Http\Controllers\ResetController@reset')->name('reset');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('get-logout');
// Route::get('/proba','App\Http\Controllers\MainController@proba')->name('proba');
Route::get('/', 'App\Http\Controllers\MainController@index')->name('index');
//Route::get('test', 'App\Http\Controllers\TestController');
//Route::get('test',function(Request $request){
//     echo $request->method();
//     echo "<br>";
//     dump($_GET);
//     // print_r($_GET['price']);
//     // print_r($_POST);
//     echo 'stop';
// });
// Route::post('/',function(REQUEST $request){
//     dd($request->all());
// });
Route::middleware('auth')->group(function () {
    Route::group([
        'prefix' => 'person',
    ], function () {
        Route::get('order', 'App\Http\Controllers\Person\OrderController@index')->name('person.home');
        Route::get('order/{order}', 'App\Http\Controllers\Person\OrderController@show')->name('person.order.show');
    });

    Route::group([
        'middleware' => 'isAdmin',
        'prefix' => 'admin',
    ], function () {
        Route::get('/order', 'App\Http\Controllers\Admin\OrderController@index')->name('home');
        Route::get('/order/{order}', 'App\Http\Controllers\Admin\OrderController@show')->name('admin.order.show');
        Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    });
});


Route::post('/basket/add/{id}', 'App\Http\Controllers\BasketController@basketAdd')->name('basket-add');


Route::get('/basket', 'App\Http\Controllers\BasketController@basket')->name('basket');
Route::get('basket/place', 'App\Http\Controllers\BasketController@basketPlace')->name('basket-place');

Route::post('/basket/remove/{id}', 'App\Http\Controllers\BasketController@basketRemove')->name('basket-remove');
Route::post('/basket/confirm', 'App\Http\Controllers\BasketController@basketConfirm')->name('basket-confirm');





Route::get('/categories', 'App\Http\Controllers\MainController@categories')->name('categories');
Route::get('category/{category}', 'App\Http\Controllers\MainController@category')->name('category');


Route::get('/{product}', 'App\Http\Controllers\MainController@product')->name('product');
