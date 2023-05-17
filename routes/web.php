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
Auth::routes();

Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    Route::get('/', 'PainelControllador@index')->name('admin.painel');
    Route::prefix('/stores')->name('admin.store.')->group(function () {
        Route::get('/', 'StoreController@index')->name('index');
        Route::get('/create', 'StoreController@create')->name('create');
        Route::post('/', 'StoreController@store')->name('store');
        Route::get('/{id}', 'StoreController@edit')->name('edit');
        Route::delete('/{id}', 'StoreController@destroy')->name('destroy');
        Route::post('/{id}', 'StoreController@update')->name('update');
    });

});
