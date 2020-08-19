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

Route::get('/', 'ArtworkController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/artworks/{id}/{artwork}', 'ArtworkController@show')->name('artworks.show');


//artist 
Route::get('/artist/{id}/{artist}', 'ArtistController@index')->name('artist.index');
Route::get('user/profile', 'UserController@index');