<?php

namespace App\Http\Controllers;

use App\models\Hotels;
use App\models\Resorts;
use App\models\Restaurants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $search  =$this->searchRedo('all');
       $hotels = $search['hotels'];

       $restaurants =$search['restaurants'];
       $resorts =$search['resorts'];
       $lat =$search['lat'];
       $lng =$search['lng'];
        return view('home',compact('hotels','restaurants','resorts','lat','lng'));
    }
    public function searchRedo($search)
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

        return [
            'hotels'=>$hotels,
            'restaurants'=>$restaurants,
            'resorts'=>$resorts,
            'lat'=>$lat,
            'lng'=>$lng,
        ];
    }

    public function checkAuthLogin(Request $request)
    {
        if($request->type == 'admin')
        {

            return redirect()->route('adminLogin.login',['email'=>$request->email , 'password'=> $request->password]);
        }
        elseif($request->type == 'company_general_manager')
        {
            return redirect()->route('company_general_manager.login',['password'=> $request->password, 'email'=>$request->email]);
        }
        elseif($request->type == 'quality_manager')
        {
            return redirect()->route('quality_manager.login',['password'=> $request->password, 'email'=>$request->email]);
        }
        elseif($request->type == 'clean_mantanance_manager')
        {
            return redirect()->route('clean_mantanance_manager.login',['password'=> $request->password, 'email'=>$request->email]);
        }
        elseif($request->type == 'supervisor')
        {
            return redirect()->route('supervisor.login',['password'=> $request->password, 'email'=>$request->email]);
        }
        elseif($request->type == 'employee')
        {
            return redirect()->route('employee.login',['password'=> $request->password, 'email'=>$request->email]);
        }
        elseif($request->type == 'restaurant')
        {
            return redirect()->route('restaurantLogin.login',['email'=>$request->email , 'password'=> $request->password]);
        }
        elseif($request->type == 'hotel')
        {
            return redirect()->route('hotelLogin.login',['email'=>$request->email , 'password'=> $request->password]);
        }
        elseif($request->type == 'resort')
        {
            return redirect()->route('resortLogin.login',['email'=>$request->email , 'password'=> $request->password]);
        }
        elseif($request->type == 'visitor')
        {
            return redirect()->route('visitorLogin.login',['email'=>$request->email , 'password'=> $request->password]);
        }

        return 'sad';
    }




}
