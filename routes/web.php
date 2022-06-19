<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Http\Request;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    Route::get('/maps/{search}','GoogleMapsController@index');



    Route::get('/user-login', function () {
            return view('login');
        })->name('user-login');



        Auth::routes();


        Route::get('/register','Auth\VisitorLoginController@register')->name('visitor.register');

        Route::get('/visitor/logout','Auth\VisitorLoginController@logout')->name('visitor.logout');

        Route::post('/save-visitor','Auth\VisitorLoginController@saveVisitor')->name('visitor.save');


        Route::any('/checkAuthLogin', 'HomeController@checkAuthLogin')->name('check.auth.login');

        Route::any('/adminLogin/{password}/{email}', 'Auth\AdminLoginController@login')->name('adminLogin.login');

        Route::any('/companyGeneralManagerLogin/{password}/{email}', 'Auth\GeneralManagerLoginController@login')->name('company_general_manager.login');

        Route::any('/qualityManagerLogin/{password}/{email}', 'Auth\QualityManagerLoginController@login')->name('quality_manager.login');
        Route::any('/cleanMantananceManager/{password}/{email}', 'Auth\CleanMaintananceManagerLoginController@login')->name('clean_mantanance_manager.login');
        Route::any('/supervisorLogin/{password}/{email}', 'Auth\SupervisorLoginController@login')->name('supervisor.login');
        Route::any('/userLogin/{password}/{email}', 'Auth\EmployeeLoginController@login')->name('employee.login');

        Route::any('/restaurantLogin/{email}/{password}', 'Auth\RestaurantLoginController@login')->name('restaurantLogin.login');

        Route::any('/hotelLogin/{email}/{password}', 'Auth\HotelLoginController@login')->name('hotelLogin.login');

        Route::any('/resortLogin/{email}/{password}', 'Auth\ResortLoginController@login')->name('resortLogin.login');

        Route::any('/visitorLogin/{email}/{password}', 'Auth\visitorLoginController@login')->name('visitorLogin.login');


/////////////////////////////////////////////////////////////////////////////////////////

        Route::get('/','User\HomeController@index')->name('home.index');
    Route::get('/render/now/{filter}','User\HomeController@index_search')->name('home.index_search');
    Route::get('/render/now/map/{filter}','User\HomeController@render')->name('home.render.index_search');

        Route::post('/search','User\HomeController@search')->name('home.search');
        Route::post('/saveContactUs','User\HomeController@saveContactUs')->name('home.saveContactUs');


        Route::get('/about', function () {
            return view('site.about');
        })->name('home.about');

        Route::get('/contact', function () {
            return view('site.contact');
        })->name('home.contact');

        /********************************************************/
        Route::get('/all-hotel','User\HotelController@getAllHotel')->name('all.hotel');
        Route::get('/hotel-details/{hotel_id}','User\HotelController@getHotelDetails')->name('hotel.details');
        Route::get('/room-details/{room_id}','User\HotelController@getRoomDetails')->name('room.details');

        /*********************************************************/
        Route::get('/all-restaurant','User\RestaurantController@getAllRestaurant')->name('all.restaurant');
        Route::get('/restaurant-details/{restaurant_id}','User\RestaurantController@getRestaurantDetails')->name('restaurant.details');


        /*********************************************************/
        Route::get('/all-resort','User\ResortController@getAllResort')->name('all.resort');
        Route::get('/resort-details/{restaurant_id}','User\ResortController@getResortDetails')->name('resort.details');
        Route::get('/place-details/{place_id}','User\ResortController@getPlaceDetails')->name('place.details');

        /*********************************************************/
        Route::get('/all-event','User\EventController@getAllEvent')->name('all.event');

        Route::get('/hotel-event-details/{event_id}','User\EventController@getEventHotelDetails')->name('hotel.event_details');

        Route::get('/resort-event-details/{event_id}','User\EventController@getEventResortDetails')->name('resort.event_details');

        Route::get('/restaurant-event-details/{event_id}','User\EventController@getEventRestaurantDetails')->name('restaurant.event_details');
        /*****************************************************************/
        /*Book Room*/
        Route::post('/book-room','User\BookingController@bookRoomHotel')->name('book.room');
        Route::post('/book-place','User\BookingController@bookResortPlace')->name('book.place');
        Route::post('/book-meal','User\BookingController@bookRestaurantMeal')->name('book.meal');

        Route::post('/book-table','User\BookingController@bookRestaurantTable')->name('book.table');


        Route::get('/my-booking','User\BookingController@my_booking')->name('my-booking');/***************************************************************************/
        Route::get('/all-package','User\PackagesController@getAllPackages')->name('all.package');

        Route::get('/package-details/{package_id}','User\PackagesController@getPackageDetails')->name('package.details');


/***************************************************************************/
        Route::get('/all-gift','User\GiftsController@getAllGifts')->name('all.gift');

        Route::get('/gift-details/{package_id}','User\GiftsController@getGiftDetails')->name('gift.details');

        Route::get('/get-gift','User\GiftsController@get_gift')->name('get.gift');
        Route::post('/save-gift','User\GiftsController@save_gift')->name('save.gift');

        Route::get('/my-gifts','User\GiftsController@my_gifts')->name('my.gifts');

/******************************************************************************/

        Route::post('/save-rate','User\RateController@saveRate')->name('save.rate');

Route::get('/test',function(Request $request){

        $ip = $_SERVER['REMOTE_ADDR'];
        $currentUserInfo = \Stevebauman\Location\Facades\Location::get($ip);
          dd($_SERVER['REMOTE_ADDR']);

});

});
