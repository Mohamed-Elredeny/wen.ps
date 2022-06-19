<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\models\Restaurants;
use App\models\Restaurant_meals;
use App\models\Restaurant_events;
use App\models\Restaurant_tables;

class RestaurantController extends Controller
{
    public function getAllRestaurant()
    { 
        $restaurants = Restaurants::where('status','1')
                                  ->with('restaurant_meals')
                                  ->paginate(8);

        return view('site.restaurants')->with(['restaurants' => $restaurants]);
    }

    public function getRestaurantDetails($restaurant_id){
        
        $restaurant = Restaurants::where('id',$restaurant_id)
                                 ->with('restaurant_images')
                                 ->with('restaurant_categories')
                                 ->with('restaurant_meals')
                                 ->with('restaurant_tables')
                                 ->with('restaurant_events') 
                                 ->first();

        $all_meals = Restaurant_meals::where('restaurant_id',$restaurant_id)->get();   
        $all_tables = Restaurant_tables::where('restaurant_id',$restaurant_id)->where('status','0')->get();   
                         

        $last_events = Restaurant_events::where('restaurant_id',$restaurant_id)->paginate(5);
        $related_restaurants = Restaurants::where('status','1')->orderBy('id','desc')->paginate(5);

        return view('site.restaurant_details')->with(['restaurant' => $restaurant,
                                                      'last_events' => $last_events,
                                                      'related_restaurants' => $related_restaurants,
                                                      'all_meals' => $all_meals,
                                                      'all_tables' => $all_tables]);                         


    }
}
