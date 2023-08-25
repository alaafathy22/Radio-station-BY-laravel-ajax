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

Route::get('/', 'App\Http\Controllers\Controller_HomePage@get_data');
Route::get('res', 'App\Http\Controllers\Controller_get_when_Selected@get_when_Selected')->name('res');
Route::get('res_search', 'App\Http\Controllers\Controller_search@search_for_player')->name('res_search');
// return to home page if you go to link not register  --------------------------
Route::fallback(function () {
    return redirect('/');
});
