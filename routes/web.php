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
Route::post('/artworks/{id}/edit', 'ArtworkController@update')->name('artwork.update');
Route::get('/artworks/my-artworks', 'ArtworkController@myArtwork')->name('artwork.overview');
Route::get('/artworks/{id}/{artwork}', 'ArtworkController@show')->name('artworks.show');
Route::get('/artworks/leads', 'ArtworkController@lead')->name('view.leads');
Route::get('/artworks/messages', 'ArtworkController@messages')->name('view.messages');
Route::get('/kunstwerken/index', 'ArtworkController@allartworks')->name('all.artworks');

Route::post('/save/{id}', 'FavouriteController@saveArtwork')->name('save.artwork');
Route::post('/unsave/{id}', 'FavouriteController@unSaveArtwork')->name('unsave.artwork');

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
Route::post('/lead/destroy', 'ArtworkController@destroylead')->name('lead.delete');
Route::post('/message/destroy', 'ArtworkController@deletemessage')->name('message.delete');

Route::get('/kunstenaars/index', 'ArtworkController@allartists')->name('all.artists');

//user
Route::get('user/profile', 'UserController@index')->name('profile.index');
Route::post('user/profile/create', 'UserController@store')->name('profile.create');
Route::post('user/profile/address', 'UserController@saveaddress')->name('profile.create.address');
Route::post('/kunstwerken/{artworkid}/interesse', 'UserController@artworkrequest')->name('artwork.request');
Route::post('/kunstwerken/{artwork}/stuur-bericht', 'ArtworkController@sendmessagewithprofile')->name('send.message.profile');
Route::post('/kunstwerken/{artwork}/bericht-versturen', 'ArtworkController@sendmessage')->name('send.message');
Route::get('/favorieten', 'UserController@favourites')->name('favourites');

//Search
Route::get('/kunstwerken/zoeken', 'ArtworkController@searchArtworks');


