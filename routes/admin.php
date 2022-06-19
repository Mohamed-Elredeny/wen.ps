<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'admin',
    'middleware' => [ 'auth:admin' ],
    'as' => 'admin.',
    'namespace' => 'Admin'
], function(){
    Route::any('/', 'HomeController@home')->name('dashboard');

    //packages   
    Route::resource('packages', 'PackagesController');
    //points
    Route::resource('points', 'PointsController');
    //Gifts
    Route::resource('gifts', 'GiftsController');
    Route::get('visitor-gifts', 'GiftsController@visitorGifts')->name('gifts.visitor');
    Route::get('visitor-gift-send/{id}', 'GiftsController@visitorGiftSend')->name('gifts.send');


    Route::resource('hotels', 'HotelsController');
    Route::any('/hotel/requests/{id}', 'HotelsController@requests')->name('hotels.requests');
    Route::any('/hotel/rooms/{id}', 'HotelsController@rooms')->name('hotels.rooms');
    Route::any('/hotel/events/{id}', 'HotelsController@events')->name('hotels.events');

    Route::resource('resorts', 'ResortsController');
    Route::any('/resort/requests/{id}', 'ResortsController@requests')->name('resorts.requests');
    Route::any('/resort/resort/{id}', 'ResortsController@resort')->name('resorts.resort');
    Route::any('/resort/events/{id}', 'ResortsController@events')->name('resorts.events');
    
    //restaurants
    Route::resource('restaurants', 'RestaurantsController');
    Route::any('/restaurant/requests/{id}', 'RestaurantsController@requests')->name('restaurants.requests');
    Route::any('/restaurant/menu/{id}', 'RestaurantsController@menu')->name('restaurants.menu');
    Route::any('/restaurant/events/{id}', 'RestaurantsController@events')->name('restaurants.events');

    Route::resource('users', 'UsersController');
});

    