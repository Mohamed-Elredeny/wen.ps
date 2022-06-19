<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\models\Hotels;
use App\models\Hotel_images;
use App\models\Hotel_events;
use App\models\Hotel_rooms;

class HotelController extends Controller
{
    public function getAllHotel()
    { 
        $hotels = Hotels::where('status','1')->with('hotel_rooms')->paginate(8);
        return view('site.hotels')->with(['hotels' => $hotels]);
    }

    public function getHotelDetails($hotel_id){
        
        $hotel = Hotels::where('id', $hotel_id)
                         ->with('hotel_images')
                         ->with('hotel_rooms')
                         ->with('hotel_events')
                         ->first();
        
        $all_rooms = Hotel_rooms::where('hotel_id',$hotel_id)->get();   

        $events = Hotel_events::where('hotel_id',$hotel_id)->paginate(5);
        $related_hotels = Hotels::where('status','1')->orderBy('id','desc')->paginate(5);

        return view('site.hotel_details')->with(['hotel' => $hotel,
                                                 'events' => $events,
                                                 'related_hotels' => $related_hotels,
                                                 'all_rooms' => $all_rooms ]);


    }


    public function getRoomDetails($room_id){
        
        $room = Hotel_rooms::whereId($room_id)->with('hotel')->first();
        $rooms = Hotel_rooms::where('hotel_id',$room->hotel_id)->with('hotel')
                            ->orderBy('id','desc')
                            ->paginate(9);

        $hotel = Hotels::whereId($room->hotel_id)->select('lat','lng')->first();

        $last_events = Hotel_events::orderBy('id','desc')->paginate(5);

        $related_hotels = Hotels::orderBy('id','desc')->paginate(5);                    


        return view('site.room_details')->with(['room' => $room,
                                                'rooms' => $rooms,
                                                'hotel' => $hotel,
                                                'last_events' => $last_events,
                                                'related_hotels' => $related_hotels  ]);
       
    }


}
