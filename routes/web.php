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
Route::view('artist/register', 'auth.artist-register')->name('register.as.artist');
Route::post('artist/register', 'ArtistRegisterController@artistRegister')->name('artist.register');
Route::get('/artist/{id}/{artist}', 'ArtistController@index')->name('artist.index');
Route::get('artist/create', 'ArtistController@create');

//user
Route::get('user/profile', 'UserController@index');
Route::post('user/profile/create', 'UserController@store')->name('profile.create');
Route::post('user/profile/address', 'UserController@saveaddress')->name('profile.create.address');

