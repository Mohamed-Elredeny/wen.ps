<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'resort',
    'middleware' => [ 'auth:resort' ],
    'as' => 'resort.',
    'namespace' => 'Resort'
], function(){
    Route::any('/', 'HomeController@home')->name('dashboard');

    Route::resource('details', 'HomeController');
    Route::get('/resort/delete-image/{id}', 'HomeController@delete_image')->name('delete_image');

    Route::resource('categories', 'CategoryController');
    Route::get('/categories/resorts/{category_id}','CategoryController@getResorts')->name('categories.resorts');
    Route::resource('resorts', 'ResortController');

    Route::any('/requests/resorts', 'RequestController@resorts')->name('requests.resorts');

    Route::get('/accept-requests/{id}', 'RequestController@acceptRequest')->name('requests.accept');

    Route::get('/unaccept-requests/{id}', 'RequestController@unacceptRequest')->name('requests.unaccept');
    
    Route::any('/requests/reports', 'HomeController@reports')->name('reports');

    Route::resource('events', 'EventController');

});
