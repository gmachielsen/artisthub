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

    Route::get('/leads', 'LeadController@index')->name('leads.index');

    Route::get('/artists', 'AdminArtistController@index')->name('artists.index');
    Route::get('/artists/{id}/edit', 'AdminArtistController@edit')->name('artists.edit');
    Route::post('artist/createpersonalinformation/{id}/update', 'AdminArtistController@savePersonalInformation')->name('create.personal.information');
    Route::post('artist/createcompanyinformation/{id}/update', 'AdminArtistController@saveCompanyInformation')->name('create.company.information');
    Route::post('artist/createbiography/{id}/update', 'AdminArtistController@saveStoryAboutArtist')->name('create.story.artist');
    Route::post('artist/profilephoto/{id}/update', 'AdminArtistController@profilePhoto')->name('profile.photo');

    Route::get('/users', 'AdminUserController@index')->name('users.index');
    Route::get('/users/{id}/edit', 'AdminUserController@edit')->name('users.edit');
    Route::post('/users/{id}/update', 'AdminUserController@update')->name('users.update');
    Route::post('/users/{id}/delete', 'AdminUserController@delete')->name('users.delete');

    Route::get('/artworks', 'AdminArtworkController@index')->name('artworks.index');
    Route::get('/artworks/create', 'AdminArtworkController@create')->name('artworks.create');
    Route::post('/artworks/store', 'AdminArtworkController@store')->name('artworks.store');
    Route::get('/artworks/{id}/edit', 'AdminArtworkController@edit')->name('artworks.edit');
    Route::post('/artworks/{id}/update', 'AdminArtworkController@update')->name('artworks.update');
    Route::post('/artworks/{id}/delete', 'AdminArtworkController@delete')->name('artworks.delete');

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

