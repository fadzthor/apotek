<?php

use App\Http\Controllers\ProfileController;
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

Route::group(['namespace' => 'App\Http\Controllers'], function(){
    Route::prefix('dashboard')->group(function(){
        Route::get('/', 'DashboardController@index')->name('dashboard.index');  
    });

    Route::prefix('jenis-obat')->group(function(){
        Route::get('/', 'JenisObatController@index')->name('jenisobat.index');
        Route::get('create', 'JenisObatController@create')->name('jenisobat.create');
        Route::post('/', 'JenisObatController@store')->name('jenisobat.store');
        Route::get('show/{id}', 'JenisObatController@show')->name('jenisobat.show');
        Route::get('edit/{id}', 'JenisObatController@edit')->name('jenisobat.edit');
        Route::post('update/{id}', 'JenisObatController@update')->name('jenisobat.update');
        Route::delete('delete/{id}', 'JenisObatController@destroy')->name('jenisobat.destroy');     
    });

    Route::prefix('obat')->group(function(){
        Route::get('/', 'ObatController@index')->name('obat.index');
        Route::get('create', 'ObatController@create')->name('obat.create');
        Route::post('/', 'ObatController@store')->name('obat.store');
        Route::get('show/{id}', 'ObatController@show')->name('obat.show');
        Route::get('edit/{id}', 'ObatController@edit')->name('obat.edit');
        Route::post('update/{id}', 'ObatController@update')->name('obat.update');
        Route::delete('delete/{id}', 'ObatController@destroy')->name('obat.destroy');     
    });

    Route::prefix('obat-masuk')->group(function(){
        Route::get('/', 'ObatMasukController@index')->name('obatmasuk.index');
        Route::get('create', 'ObatMasukController@create')->name('obatmasuk.create');
        Route::post('/', 'ObatMasukController@store')->name('obatmasuk.store');
        Route::get('show/{id}', 'ObatMasukController@show')->name('obatmasuk.show');
        Route::get('edit/{id}', 'ObatMasukController@edit')->name('obatmasuk.edit');
        Route::post('update/{id}', 'ObatMasukController@update')->name('obatmasuk.update');
        Route::delete('delete/{id}', 'ObatMasukController@destroy')->name('obatmasuk.destroy');     
    });
    
    Route::prefix('obat-keluar')->group(function(){
        Route::get('/', 'ObatKeluarController@index')->name('obatkeluar.index');
        Route::get('create', 'ObatKeluarController@create')->name('obatkeluar.create');
        Route::post('/', 'ObatKeluarController@store')->name('obatkeluar.store');
        Route::get('show/{id}', 'ObatKeluarController@show')->name('obatkeluar.show');
        Route::get('edit/{id}', 'ObatKeluarController@edit')->name('obatkeluar.edit');
        Route::post('update/{id}', 'ObatKeluarController@update')->name('obatkeluar.update');
        Route::delete('delete/{id}', 'ObatKeluarController@destroy')->name('obatkeluar.destroy');     
    });    
});

Route::get('/', function () {
    return view('welcome');
});
