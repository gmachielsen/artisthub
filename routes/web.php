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

// artworks
Route::get('/', 'ArtworkController@index');
Route::get('/artworks/create', 'ArtworkController@create')->name('create.artwork');
Route::post('/artworks/store', 'ArtworkController@store')->name('artwork.store');
Route::get('/artworks/{id}/edit', 'ArtworkController@edit')->name('artwork.edit');
Route::post('/jobs/{id}/edit', 'ArtworkController@update')->name('artwork.update');
Route::get('artworks/my-artworks', 'ArtworkController@myArtwork')->name('artwork.overview');
Route::get('/artworks/{id}/{artwork}', 'ArtworkController@show')->name('artworks.show');
Route::get('/artworks/leads', 'ArtworkController@lead');
Route::get('/kunstwerken/index', 'ArtworkController@allartworks')->name('all.artworks');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//artist 
Route::view('artist/register', 'auth.artist-register')->name('register.as.artist');
Route::post('artist/register', 'ArtistRegisterController@artistRegister')->name('artist.register');
Route::get('/artist/{id}/{artist}', 'ArtistController@index')->name('artist.index');
Route::get('artist/create', 'ArtistController@create')->name('artist.dashboard');
Route::post('artist/createpersonalinformation', 'ArtistController@savePersonalInformation')->name('create.personal.information');
Route::post('artist/createcompanyinformation', 'ArtistController@saveCompanyInformation')->name('create.company.information');
Route::post('artist/createbiography', 'ArtistController@saveStoryAboutArtist')->name('create.story.artist');
Route::post('artist/profilephoto', 'ArtistController@profilePhoto')->name('profile.photo');
Route::get('/lead/{userid}/contactgegevens', 'ArtworkController@viewlead')->name('lead.view');
Route::post('/lead/destroy', 'ArtworkController@destroylead')->name('lead.delete');
Route::get('/lead/{id}/vernietig', 'ArtworkController@delete')->name('delete.lead');
Route::get('/kunstenaars/index', 'ArtworkController@allartists')->name('all.artists');

//user
Route::get('user/profile', 'UserController@index')->name('profile.index');
Route::post('user/profile/create', 'UserController@store')->name('profile.create');
Route::post('user/profile/address', 'UserController@saveaddress')->name('profile.create.address');
Route::post('/artworks/{artworkid}/interesse', 'UserController@artworkrequest')->name('artwork.request');




