<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\models\Visitors;
use App\models\Book_rooms;
use App\models\Book_places;
use App\models\Book_meals;
use App\models\Book_tables;

use App\models\Hotels;
use App\models\Hotel_rooms;

use App\models\Resorts;
use App\models\Resort_resorts;

use App\models\Restaurants;
use App\models\Restaurant_meals;
use App\models\Restaurant_meal_sizes;
use App\models\Restaurant_tables;

use App\models\Points;

class BookingController extends Controller
{
    public function bookRoomHotel(Request $request)
    {
        
      if (Auth::guard('visitor')->check()) { 

          $validator = Validator::make($request->all(), [

                'name'     => 'required|string|max:191',
                'email'    => 'required|email|max:191',
                'phone'    => 'required|numeric',
                'room_id'  => 'required|numeric',
                'days'     => 'required|numeric',
                'date_from' => 'required|date_format:d/m/Y|string',
                'date_to'   => 'required|date_format:d/m/Y|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }else{
               
                $visitor_id = Auth::guard('visitor')->user()->id;
                $hotel_room_price = Hotel_rooms::whereId($request->room_id)->select('price')->first()->price;
                
                $hotel_id = Hotel_rooms::whereId($request->room_id)->select('hotel_id')->first()->hotel_id;

                $hotel_point = Points::first()->hotel_point;
                
                $old_point = Visitors::whereId($visitor_id)->select('points')->first()->points;

                $all_points = $hotel_point + $old_point;




                $newBook = new Book_rooms;
                $newBook->visitor_id = $visitor_id;
                $newBook->name = $request->name;  
                $newBook->email = $request->email;  
                $newBook->phone = $request->phone;
                $newBook->hotel_id = $hotel_id;
                $newBook->room_id = $request->room_id;
                $newBook->days = $request->days;
                $newBook->date_book = date('Y-m-d');
                $newBook->date_from = $request->date_from;
                $newBook->date_to = $request->date_to;
                $newBook->money = $hotel_room_price * $request->days;


                  if ($newBook->save()) {
                     Visitors::whereId($visitor_id)->update(['points' => $all_points]);
                     return redirect()->back()->with('success','تم الاضافة بنجاح');
                  }else{
                     return redirect()->back()->with('error','حدث خطاء اثناء اضافة البيانات');           
                  }


            } 



      }else{
         return redirect()->route('user-login');
      }

    }

    public function bookResortPlace(Request $request)
    {
        
      if (Auth::guard('visitor')->check()) { 

          $validator = Validator::make($request->all(), [

                'name'     => 'required|string|max:191',
                'email'    => 'required|email|max:191',
                'phone'    => 'required|numeric',
                'place_id'  => 'required|numeric',
                'days'     => 'required|numeric',
                'date_from' => 'required|date_format:d/m/Y|string',
                'date_to'   => 'required|date_format:d/m/Y|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }else{
               
                $visitor_id = Auth::guard('visitor')->user()->id;
                $resort_place_price = Resort_resorts::whereId($request->place_id)->select('price')->first()->price;
                
                $resort_id = Resort_resorts::whereId($request->place_id)->select('resort_id')->first()->resort_id;

                $resort_point = Points::first()->resort_point;
                
                $old_point = Visitors::whereId($visitor_id)->select('points')->first()->points;

                $all_points = $resort_point + $old_point;




                $newBook = new Book_places;
                $newBook->visitor_id = $visitor_id;
                $newBook->name = $request->name;  
                $newBook->email = $request->email;  
                $newBook->phone = $request->phone;
                $newBook->resort_id = $resort_id;
                $newBook->place_id = $request->place_id;
                $newBook->days = $request->days;
                $newBook->date_book = date('Y-m-d');
                $newBook->date_from = $request->date_from;
                $newBook->date_to = $request->date_to;
                $newBook->money = $resort_place_price * $request->days;


                  if ($newBook->save()) {
                     Visitors::whereId($visitor_id)->update(['points' => $all_points]);
                     return redirect()->back()->with('success','تم الاضافة بنجاح');
                  }else{
                     return redirect()->back()->with('error','حدث خطاء اثناء اضافة البيانات');           
                  }


            } 



      }else{
         return redirect()->route('user-login');
      }

    }

    public function bookRestaurantMeal(Request $request)
    {
        
      if (Auth::guard('visitor')->check()) { 

          $validator = Validator::make($request->all(), [

                'name'     => 'required|string|max:191',
                'email'    => 'required|email|max:191',
                'phone'    => 'required|numeric',
                'meal_id'  => 'required|numeric',
                'meal_size_id'     => 'nullable|numeric',
                'qty'     => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }else{
               
                $visitor_id = Auth::guard('visitor')->user()->id;

                $meal_size_price = Restaurant_meal_sizes::whereId($request->meal_size_id)->select('price')->first()->price;
                
                $restaurant_id = Restaurant_meals::whereId($request->meal_id)->select('restaurant_id')->first()->restaurant_id;

                $restaurant_point = Points::first()->restaurant_point;
                
                $old_point = Visitors::whereId($visitor_id)->select('points')->first()->points;

                $all_points = $restaurant_point + $old_point;




                $newBook = new Book_meals;
                $newBook->visitor_id = $visitor_id;
                $newBook->name = $request->name;  
                $newBook->email = $request->email;  
                $newBook->phone = $request->phone;
                $newBook->restaurant_id = $restaurant_id;
                $newBook->meal_id = $request->meal_id;
                $newBook->meal_size_id = $request->meal_size_id;
                $newBook->qty = $request->qty;
                $newBook->date_book = date('Y-m-d');
                
                if (is_array($meal_size_price)) {

                  $newBook->money = implode($meal_size_price) * $request->qty;
                
                }else{

                  $newBook->money = $meal_size_price * $request->qty;


                } 

                  if ($newBook->save()) {
                     Visitors::whereId($visitor_id)->update(['points' => $all_points]);
                     return redirect()->back()->with('success','تم الاضافة بنجاح');
                  }else{
                     return redirect()->back()->with('error','حدث خطاء اثناء اضافة البيانات');           
                  }


            } 



      }else{
         return redirect()->route('user-login');
      }

    }    


    public function bookRestaurantTable(Request $request)
    {
        
      if (Auth::guard('visitor')->check()) { 

          $validator = Validator::make($request->all(), [

                'name'     => 'required|string|max:191',
                'email'    => 'required|email|max:191',
                'phone'    => 'required|numeric',
                'table_id'  => 'required|numeric',
                'date_book' => 'required|date_format:d/m/Y|string',
                'time_book' => 'required|string',

            ]);

            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }else{
               
                $visitor_id = Auth::guard('visitor')->user()->id;

                
                $restaurant_id = Restaurant_tables::whereId($request->table_id)->select('restaurant_id')->first()->restaurant_id;

                $restaurant_point = Points::first()->restaurant_point;
                
                $old_point = Visitors::whereId($visitor_id)->select('points')->first()->points;

                $all_points = $restaurant_point + $old_point;




                $newBook = new Book_tables;
                $newBook->visitor_id = $visitor_id;
                $newBook->name = $request->name;  
                $newBook->email = $request->email;  
                $newBook->phone = $request->phone;
                $newBook->restaurant_id = $restaurant_id;
                $newBook->table_id = $request->table_id;
                $newBook->date_book = $request->date_book;
                $newBook->time_book = $request->time_book;



                  if ($newBook->save()) {
                     Visitors::whereId($visitor_id)->update(['points' => $all_points]);
                     return redirect()->back()->with('success','تم الاضافة بنجاح');
                  }else{
                     return redirect()->back()->with('error','حدث خطاء اثناء اضافة البيانات');           
                  }


            } 



      }else{
         return redirect()->route('user-login');
      }

    } 

public function my_booking(){
  
    if (Auth::guard('visitor')->check()) { 
         
        $visitor_id = Auth::guard('visitor')->user()->id;

        $book_rooms = Book_rooms::where('visitor_id',$visitor_id)->with('hotel')->with('room')->get();
        $book_places = Book_places::where('visitor_id',$visitor_id)->with('resort')->with('place')->get();
        $book_meals = Book_meals::where('visitor_id',$visitor_id)->with('restaurant')->with('meal')->with('meal_size')->get();
        $book_tables = Book_tables::where('visitor_id',$visitor_id)->with('restaurant')->with('table')->get();

         return view('site.my_booking')->with(['book_rooms' => $book_rooms,
                                               'book_places' => $book_places,
                                               'book_meals' => $book_meals,
                                               'book_tables' => $book_tables

                                           ]);


    }else{

         return redirect()->route('user-login');
    }
}

}
