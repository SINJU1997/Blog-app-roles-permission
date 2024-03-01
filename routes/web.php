<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('about',function(){
    return view('about');
});
Route::get('/','\App\Http\Controllers\BlogController@index');
Route::get('/blog/{id}','\App\Http\Controllers\BlogController@show');

Route::group(['middleware' => ['can:add blog']], function () {
    Route::get('/blog','\App\Http\Controllers\BlogController@create');
});
Route::post('/blog/store','\App\Http\Controllers\BlogController@store');


Route::delete('/blog/{id}/delete','\App\Http\Controllers\BlogController@destroy');

Route::get('/permission','\App\Http\Controllers\BlogController@createPermission');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

