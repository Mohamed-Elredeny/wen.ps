<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Mail;

use App\models\Hotels;
use App\models\Hotel_events;

use App\models\Restaurants;
use App\models\Restaurant_events;

use App\models\Resorts;
use App\models\Resort_events;

use App\models\Contacts;

use App\models\Users;


class HomeController extends Controller
{
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

    public function index(){
        $filter ='all';
        $search  =$this->searchRedo($filter);
        $hotels_search = $search['hotels'];
        foreach($hotels_search as $hotel){
            $hotel->type = 'hotel';
        }
        $restaurants_search =$search['restaurants'];
        foreach($restaurants_search as $hotel){
            $hotel->type = 'restaurant';
        }
        $resorts_search =$search['resorts'];
        foreach($resorts_search as $hotel){
            $hotel->type = 'resort';
        }
        $lat_search =$search['lat'];
        $lng_search =$search['lng'];


        $list = [];
        if($filter == 'all'){
            foreach($hotels_search as $record) {
                $list [] =$record;
            }
            foreach($restaurants_search as $record) {
                $list [] =$record;
            }
            foreach($resorts_search as $record) {
                $list [] =$record;
            }
        }elseif($filter == 'restaurants'){
            foreach($restaurants_search as $record) {
                $list [] =$record;
            }
        }elseif($filter == 'hotels') {
            foreach($hotels_search as $record) {
                $list [] =$record;
            }
        }elseif($filter == 'resorts'){
            foreach($resorts_search as $record) {
                $list [] =$record;
            }
        }

        $hotels = Hotels::where('status','1')->inRandomOrder()->with('hotel_rooms')->paginate(3);
        $restaurants = Restaurants::where('status','1')->inRandomOrder()->with('restaurant_meals')->paginate(3);
        $resorts = Resorts::where('status','1')->inRandomOrder()->with('resort_resorts')->paginate(3);

        $hotel_events = Hotel_events::all();
        $restaurant_events = Restaurant_events::all();
        $resort_events = Resort_events::all();


        return view('site.index')->with(['hotels' => $hotels,
                                         'restaurants' => $restaurants,
                                         'resorts' => $resorts,
                                         'hotel_events' => $hotel_events,
                                         'restaurant_events' => $restaurant_events,
                                         'resort_events' => $resort_events,
                                         'hotels_search'=>$hotels_search,
                                          'restaurants_search'=>$restaurants_search,
                                        'resorts_search'=>$resorts_search,
            'lat_search'=>$lat_search,
            'lng_search'=>$lng_search,
            'list'=>$list,
            'count_list'=>count($list)
                                          ]);

    }
    public function index_search($filter){
        $search  =$this->searchRedo($filter);
        $hotels_search = $search['hotels'];
        $restaurants_search =$search['restaurants'];
        $resorts_search =$search['resorts'];
        $lat_search =$search['lat'];
        $lng_search =$search['lng'];



        $hotels = Hotels::where('status','1')->inRandomOrder()->with('hotel_rooms')->paginate(3);
        $restaurants = Restaurants::where('status','1')->inRandomOrder()->with('restaurant_meals')->paginate(3);
        $resorts = Resorts::where('status','1')->inRandomOrder()->with('resort_resorts')->paginate(3);

        $hotel_events = Hotel_events::all();
        $restaurant_events = Restaurant_events::all();
        $resort_events = Resort_events::all();
        $list = [];
        if($filter == 'all'){
            foreach($hotels_search as $record) {
                $list [] =$record;
            }
            foreach($restaurants_search as $record) {
                $list [] =$record;
            }
            foreach($resorts_search as $record) {
                $list [] =$record;
            }
        }elseif($filter == 'restaurants'){
            foreach($restaurants_search as $record) {
                $list [] =$record;
            }
        }elseif($filter == 'hotels') {
            foreach($hotels_search as $record) {
                $list [] =$record;
            }
        }elseif($filter == 'resorts'){
            foreach($resorts_search as $record) {
                $list [] =$record;
            }
        }

            return view('site.index')->with(['hotels' => $hotels,
            'restaurants' => $restaurants,
            'resorts' => $resorts,
            'hotel_events' => $hotel_events,
            'restaurant_events' => $restaurant_events,
            'resort_events' => $resort_events,
            'hotels_search'=>$hotels_search,
            'restaurants_search'=>$restaurants_search,
            'resorts_search'=>$resorts_search,
            'lat_search'=>$lat_search,
            'lng_search'=>$lng_search,
            'type'=>$filter,
            'list'=>$list,
            'count_list'=>count($list)
        ]);

    }
    public function render($filter){
        return redirect()->route('home.index_search',['filter'=>'all','#search_redo']);
    }
    public function search(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'category'     => 'required|string',
            'name'         => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{

              $category = $request->category;
              $name     = $request->name;

              if ($category == "hotel") {

                if (isset($name)) {
                  $search_hotels = Hotels::where('name_ar','like','%'.$name.'%')->orWhere('name_en','like','%'.$name.'%')->get();
                }else{
                  $search_hotels = Hotels::all();
                }

                  if (count($search_hotels) > 0) {
                      return redirect('/')->with(['search_hotels' => $search_hotels]);
                  }else{
                      return redirect('/')->with(['error' => 'لا توجد نتائج']);
                  }

              }elseif ($category == "restaurant") {

                if (isset($name)) {
                  $search_restaurants = Restaurants::where('name_ar','like','%'.$name.'%')->orWhere('name_en','like','%'.$name.'%')->get();
                }else{
                  $search_restaurants = Restaurants::all();
                }


                  $search_restaurants = Restaurants::where('name_ar','like','%'.$name.'%')->orWhere('name_en','like','%'.$name.'%')->get();
                  if (count($search_restaurants) > 0) {
                      return redirect('/')->with(['search_restaurants' => $search_restaurants]);
                  }else{
                      return redirect('/')->with(['error' => 'لا توجد نتائج']);
                  }

              }elseif ($category == "resort") {

                if (isset($name)) {
                  $search_resorts = Resorts::where('name_ar','like','%'.$name.'%')->orWhere('name_en','like','%'.$name.'%')->get();
                }else{
                  $search_resorts = Resorts::all();
                }

                  $search_resorts = Resorts::where('name_ar','like','%'.$name.'%')->orWhere('name_en','like','%'.$name.'%')->get();
                  if (count($search_resorts) > 0) {
                      return redirect('/')->with(['search_resorts' => $search_resorts]);
                  }else{
                      return redirect('/')->with(['error' => 'لا توجد نتائج']);
                  }

              }else{
                      return redirect('/')->with(['error' => 'لا توجد نتائج']);
                  }

        }


    }


    public function saveContactUs(Request $request){

        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:191',
            'email'    => 'required|string|email|max:191',
            'phone'    => 'required|string|max:191',
            'subject'  => 'required|string|max:191',
            'message'  => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{

              $newContact = new Contacts;
              $newContact->name = $request->name;
              $newContact->email = $request->email;
              $newContact->message = $request->message;
              $newContact->phone = $request->phone;
              $newContact->subject = $request->subject;

                \Mail::send('site.contactMail', array(
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'subject' => $request->subject,
                    'message' => $request->message,
                ), function($message) use ($request){
                    $message->from($request->email);
                    $message->to('admin@gmail.com', 'Admin')->subject($request->get('subject'));
                });

              if ($newContact->save()) {

                return redirect()->back()->with(["success" => "تم الارسال بنجاح"]);

              }else{

                return redirect()->back()->with(["error" => "حدث خطاء اثناء الارسال"]);

              }

        }

    }



}
