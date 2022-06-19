<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\models\Hotels;
use App\models\Hotel_events;
use App\models\Resorts;
use App\models\Resort_events;
use App\models\Restaurants;
use App\models\Restaurant_events;


class EventController extends Controller
{
    public function getAllEvent()
    {
        $hotel_events      = Hotel_events::with('hotel')->get();
        $resort_events     = Resort_events::with('resort')->get(); 
        $restaurant_events = Restaurant_events::with('restaurant')->get(); 

        return view('site.events')->with(['hotel_events' => $hotel_events,
                                          'resort_events'=> $resort_events,
                                          'restaurant_events' => $restaurant_events,  ]);
    }

    public function getEventHotelDetails($event_id)
    {
        $event      = Hotel_events::whereId($event_id)->with('hotel')->first();

        $hotel = Hotels::whereId($event->hotel_id)->select('lat','lng')->first();

        $events = Hotel_events::where('hotel_id',$event->hotel_id)->get();

        $last_events = Hotel_events::orderBy('id','desc')->paginate(5);

        $related_hotels = Hotels::orderBy('id','desc')->paginate(5);

        return view('site.hotel_event_details')->with(['event' => $event,
                                                       'hotel' => $hotel,
                                                       'events'=> $events,
                                                       'last_events' => $last_events,
                                                       'related_hotels' => $related_hotels
                                                   ]);
        
    }

    public function getEventResortDetails($event_id)
    {
        $event  = Resort_events::whereId($event_id)->with('resort')->first();

        $resort = Resorts::whereId($event->resort_id)->select('lat','lng')->first();

        $events = Resort_events::where('resort_id',$event->resort_id)->get();

        $last_events = Resort_events::orderBy('id','desc')->paginate(5);

        $related_resorts = Resorts::orderBy('id','desc')->paginate(5);

        return view('site.resort_event_details')->with(['event' => $event,
                                                       'resort' => $resort,
                                                       'events'=> $events,
                                                       'last_events' => $last_events,
                                                       'related_resorts' => $related_resorts
                                                   ]);
        
    }

    public function getEventRestaurantDetails($event_id)
    {
        $event  = Restaurant_events::whereId($event_id)->with('restaurant')->first();

        $restaurant = Restaurants::whereId($event->restaurant_id)->select('lat','lng')->first();

        $events = Restaurant_events::where('restaurant_id',$event->restaurant_id)->get();

        $last_events = Restaurant_events::orderBy('id','desc')->paginate(5);

        $related_restaurants = Restaurants::orderBy('id','desc')->paginate(5);

        return view('site.restaurant_event_details')->with(['event' => $event,
                                                       'restaurant' => $restaurant,
                                                       'events'=> $events,
                                                       'last_events' => $last_events,
                                                       'related_restaurants' => $related_restaurants
                                                   ]);
        
    }
}
