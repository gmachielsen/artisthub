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

    Route::get('/messages', 'MessageController@index')->name('messages.index');
    Route::post('/message/destroy', 'MessageController@destroymessage')->name('message.delete');

    Route::get('/leads', 'LeadController@index')->name('leads.index');
    Route::post('/lead/destroy', 'LeadController@destroylead')->name('lead.delete');

    Route::get('/profiles', 'CustomerController@index')->name('profiles.index');
    Route::get('/profile/{id}/edit', 'CustomerController@edit')->name('profiles.edit');
    Route::post('/profile/{id}/details', 'CustomerController@contactdetails')->name('profiles.contact.details.update');
    Route::post('/profile/{id}/address', 'CustomerController@saveaddress')->name('profiles.address.update');


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

    Route::get('/blogs', 'BlogController@index')->name('blogs.index');
    Route::get('/blogs/create', 'BlogController@create')->name('blogs.create');
    Route::post('/blogs/store', 'BlogController@store')->name('blogs.store');
    Route::get('/blogs/{id}/edit', 'BlogController@edit')->name('blogs.edit');
    Route::post('/blogs/{id}/update', 'BlogController@update')->name('blogs.update');
    Route::post('/blogs/{id}/delete', 'BlogController@delete')->name('blogs.delete');

    Route::get('/news', 'NewsController@index')->name('news.index');
    Route::get('/news/create', 'NewsController@create')->name('news.create');
    Route::post('/news/store', 'NewsController@store')->name('news.store');
    Route::get('/news/{id}/edit', 'NewsController@edit')->name('news.edit');
    Route::post('/news/{id}/update', 'NewsController@update')->name('news.update');
    Route::post('/news/{id}/delete', 'NewsController@delete')->name('news.delete');

    Route::get('/vacancies', 'VacancyController@index')->name('vacancies.index');
    Route::get('/vacancies/create', 'VacancyController@create')->name('vacancies.create');
    Route::post('/vacancies/store', 'VacancyController@store')->name('vacancies.store');
    Route::get('/vacancies/{id}/edit', 'VacancyController@edit')->name('vacancies.edit');
    Route::post('/vacancies/{id}/update', 'VacancyController@update')->name('vacancies.update');
    Route::post('/vacancies/{id}/delete', 'VacancyController@delete')->name('vacancies.delete');

    Route::get('/staffmembers', 'StaffMemberController@index')->name('staffmembers.index');
    Route::get('/staffmembers/create', 'StaffMemberController@create')->name('staffmembers.create');
    Route::post('/staffmembers/store', 'StaffMemberController@store')->name('staffmembers.store');
    Route::get('/staffmembers/{id}/edit', 'StaffMemberController@edit')->name('staffmembers.edit');
    Route::post('/staffmembers/{id}/update', 'StaffMemberController@update')->name('staffmembers.update');
    Route::post('/staffmembers/{id}/delete', 'StaffMemberController@delete')->name('staffmembers.delete');

    Route::get('/subscribers', 'SubscriberController@index')->name('subscribers.index');
    Route::get('/subscribers/create', 'SubscriberController@create')->name('subscribers.create');
    Route::post('/subscribers/store', 'SubscriberController@store')->name('subscribers.store');
    Route::get('/subscribers/{id}/edit', 'SubscriberController@edit')->name('subscribers.edit');
    Route::post('/subscribers/{id}/update', 'SubscriberController@update')->name('subscribers.update');
    Route::post('/subscribers/{id}/delete', 'SubscriberController@delete')->name('subscribers.delete');

    Route::get('/analytics', 'AnalyticsController@index')->name('analytics.index');

});

