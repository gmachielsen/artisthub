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


Route::prefix('dashboard')->name('admin.')->middleware('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/categories', 'CategoryController@index')->name('categories.index');
    Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
    Route::post('/categories/store', 'CategoryController@store')->name('categories.store');
    Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('categories.edit');
    Route::post('/categories/{id}/update', 'CategoryController@update')->name('categories.update');
    Route::post('/categories/{id}/delete', 'CategoryController@delete')->name('categories.delete');

    Route::get('/styles', 'StyleController@index')->name('styles.index');
    Route::get('/styles/create', 'StyleController@create')->name('styles.create');
    Route::post('/styles/store', 'StyleController@store')->name('styles.store');
    Route::get('/styles/{id}/edit', 'StyleController@edit')->name('styles.edit');
    Route::post('/styles/{id}/update', 'StyleController@update')->name('styles.update');
    Route::post('/styles/{id}/delete', 'StyleController@delete')->name('styles.delete');

    Route::get('/techniques', 'TechnicController@index')->name('techniques.index');
    Route::get('/techniques/create', 'TechnicController@create')->name('techniques.create');
    Route::post('/techniques/store', 'TechnicController@store')->name('techniques.store');
    Route::get('/techniques/{id}/edit', 'TechnicController@edit')->name('techniques.edit');
    Route::post('/techniques/{id}/update', 'TechnicController@update')->name('techniques.update');
    Route::post('/techniques/{id}/delete', 'TechnicController@delete')->name('techniques.delete');
});

