<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\models\Visitors;
use App\models\Hotels;
use App\models\Restaurants;
use App\models\Resorts;

class HomeController extends Controller
{
    public function home()
    {
        $visitors = Visitors::all();
        $hotels = Hotels::all();
        $restaurants = Restaurants::all();
        $resorts = Resorts::all();

        return view('admin.home')->with(['visitors' => $visitors,
                                         'hotels' => $hotels,
                                         'restaurants' => $restaurants,
                                         'resorts' => $resorts,

                                        ]);
        
    }

}
