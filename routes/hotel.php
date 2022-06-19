<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group([
    'prefix' => 'hotel',
    'middleware' => [ 'auth:hotel' ],
    'as' => 'hotel.',
    'namespace' => 'Hotel'
], function(){
    Route::any('/', 'HomeController@home')->name('dashboard');

    Route::resource('details', 'HomeController');
    Route::get('/hotel/delete-image/{id}', 'HomeController@delete_image')->name('delete_image');


    Route::resource('rooms', 'RoomController');

    Route::any('/requests/room', 'RequestController@rooms')->name('requests.rooms');

    Route::get('/accept-requests/{id}', 'RequestController@acceptRequest')->name('requests.accept');

    Route::get('/unaccept-requests/{id}', 'RequestController@unacceptRequest')->name('requests.unaccept');

    Route::any('/requests/reports', 'HomeController@reports')->name('reports');

    Route::resource('events', 'EventController');

    Route::resource('services', 'ServiceController');

    Route::get('/logout', 'Auth\HotelLoginController@logout')->name('logout');

});
