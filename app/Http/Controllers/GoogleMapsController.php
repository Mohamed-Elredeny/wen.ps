<?php

namespace App\Http\Controllers;

use App\models\Hotels;
use App\models\Resorts;
use App\models\Restaurants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class GoogleMapsController extends Controller
{

    public function index($search)
    {

        if($search == 'all'){
            $hotels = Hotels::get();
            $restaurants = Restaurants::get();
            $resorts = Resorts::get();
            if(count($hotels) > 0) {
                $lat = $hotels[0]->lat;
                $lng = $hotels[0]->lng;
            }else {
                if (count($restaurants) > 0) {
                    $lat = $restaurants[0]->lat;
                    $lng = $restaurants[0]->lng;
                }else {
                    if (count($resorts) > 0) {
                        $lat = $resorts[0]->lat;
                        $lng = $resorts[0]->lng;
                    }else{
                        $lat = 0;
                        $lng = 0;
                    }
                }
            }
        }elseif($search == 'restaurants'){
            $hotels =[];
            $restaurants = Restaurants::get();
            $resorts = [];

                if (count($restaurants) > 0) {
                    $lat = $restaurants[0]->lat;
                    $lng = $restaurants[0]->lng;
                }else {
                    $lat = 0;
                    $lng = 0;
                }

        }elseif($search == 'hotels'){
            $hotels = Hotels::get();
            $restaurants = [];
            $resorts = [];

            if (count($hotels) > 0) {
                $lat = $hotels[0]->lat;
                $lng = $hotels[0]->lng;
            }else {
                $lat = 0;
                $lng = 0;
            }

        }elseif($search == 'resorts'){
            $hotels = [];
            $restaurants = [];
            $resorts = Resorts::get();

            if (count($resorts) > 0) {
                $lat = $resorts[0]->lat;
                $lng = $resorts[0]->lng;
            }else {
                $lat = 0;
                $lng = 0;
            }

        }


        return view('map',compact('hotels','restaurants','resorts','lat','lng'));
    }

}
