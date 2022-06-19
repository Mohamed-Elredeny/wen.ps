<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group([
    'prefix' => 'restaurant',
    'middleware' => [ 'auth:restaurant' ],
    'as' => 'restaurant.',
    'namespace' => 'Restaurant'
], function(){
    Route::any('/', 'HomeController@home')->name('dashboard');

    Route::resource('details', 'HomeController');

    Route::get('/restaurant/delete-image/{id}', 'HomeController@delete_image')->name('delete_image');
    

    Route::resource('categories', 'CategoryController');
    Route::get('/categories/meals/{category_id}','CategoryController@getMeals')->name('categories.meals');
    
    Route::resource('meals', 'MealController');

    Route::resource('tables', 'TableController');
    Route::get('/table/changeStatus/{id}','TableController@changeStatus')->name('tables.changeStatus');

    Route::any('/requests/meals', 'RequestController@meals')->name('requests.meals');
    Route::any('/requests/tables', 'RequestController@tables')->name('requests.tables');

    Route::get('/accept-requests-meal/{id}', 'RequestController@acceptRequestMeal')->name('requestsMeal.accept');

    Route::get('/unaccept-requests-meal/{id}', 'RequestController@unacceptRequestMeal')->name('requestsMeal.unaccept');


    Route::get('/accept-requests-table/{id}', 'RequestController@acceptRequestTable')->name('requestsTable.accept');

    Route::get('/unaccept-requests-table/{id}', 'RequestController@unacceptRequestTable')->name('requestsTable.unaccept');


    Route::any('/requests/reports', 'HomeController@reports')->name('reports');

    Route::resource('events', 'EventController');

    Route::get('/logout', 'Auth\RestaurantLoginController@logout')->name('logout');
    Route::get('/meal/size/{id}','MealController@getSizeCategory')->name('meal.size');

});
