<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\models\Resorts;
use App\models\Resort_images;
use App\models\Resort_events;
use App\models\Resort_resorts;

class ResortController extends Controller
{
    public function getAllResort()
    { 
        $resorts = Resorts::where('status','1')->with('resort_resorts')->paginate(8);
        return view('site.resorts')->with(['resorts' => $resorts]);
    }

    public function getResortDetails($resort_id){
        
        $resort = Resorts::where('id', $resort_id)
                         ->with('resort_images')
                         ->with('resort_categories')
                         ->with('resort_resorts')
                         ->with('resort_events')
                         ->first();

        $all_places = Resort_resorts::where('resort_id',$resort_id)->get();   
                 


        $last_events = Resort_events::where('resort_id',$resort_id)->paginate(5);
        $related_resorts = Resorts::where('status','1')->orderBy('id','desc')->paginate(5);

        return view('site.resort_details')->with(['resort' => $resort,
                                                 'last_events' => $last_events,
                                                 'related_resorts' => $related_resorts,
                                                 'all_places' => $all_places]);


    }

    public function getPlaceDetails($place_id)
    {
        $place = Resort_resorts::whereId($place_id)->with('resort')->first();
        $places = Resort_resorts::where('resort_id',$place->resort_id)
                                ->orderBy('id','desc')
                                ->paginate(9);

        $resort = Resorts::whereId($place->resort_id)->select('lat','lng')->first();

        $last_events = Resort_events::orderBy('id','desc')->paginate(5);

        $related_resorts = Resorts::orderBy('id','desc')->paginate(5);

        
        return view('site.place_details')->with(['place' => $place,
                                            'places' => $places,
                                            'resort' => $resort,
                                            'last_events' => $last_events,
                                            'related_resorts' => $related_resorts   ]); 

    }
}
