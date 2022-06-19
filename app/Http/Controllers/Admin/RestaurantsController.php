<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\models\Restaurants;
use App\models\Restaurant_images;
use App\models\Restaurant_meals;
use App\models\Restaurant_events;
use App\models\Packages;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurants::all();
        return view('admin.restaurants.index')->with(['restaurants' => $restaurants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $packages = Packages::all(); 
        return view('admin.restaurants.create')->with(['packages' => $packages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_ar'     => 'required|string|max:191',
            'name_en'     => 'required|string|max:191',
            'email'    => 'required|email|unique:restaurants,email',
            'password' => 'required|string|max:191',
            'phone'    => 'required|numeric|unique:restaurants,phone',
            'package_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{

          $package_id=$request->package_id;  
          $duration = Packages::whereId($package_id)->first()->duration;
          
          $date =date("Y-m-d");
          $day = $duration;
          $end_date_package=date('Y-m-d', strtotime("+$day days"));  

          
          $newRestaurant = new Restaurants;

          $newRestaurant->name_ar = $request->name_ar;  
          $newRestaurant->name_en = $request->name_en;  
          $newRestaurant->email = $request->email;  
          $newRestaurant->password = Hash::make($request->password);  
          $newRestaurant->phone = $request->phone; 
          $newRestaurant->package_id = $request->package_id; 
          $newRestaurant->end_date_package = $end_date_package;
          $newRestaurant->status = "1"; 

          if ($newRestaurant->save()) {
             return redirect()->back()->with('success','تم الاضافة بنجاح');
          }else{
             return redirect()->back()->with('error','حدث خطاء اثناء اضافة البيانات');           
          }


        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $restaurant = Restaurants::whereId($id)->with('package')->first();
        $images = Restaurant_images::where('restaurant_id',$id)->get();
        $meals = Restaurant_meals::where('restaurant_id',$id)->with("restaurant")->get();
        $events = Restaurant_events::where('restaurant_id',$id)->with("restaurant")->get();

        return view('admin.restaurants.show')->with(['restaurant' => $restaurant,
                                                     'images' => $images,
                                                     'meals' => $meals,
                                                     'events' => $events]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant = Restaurants::whereId($id)->first();
        $packages   = Packages::all(); 

        return view('admin.restaurants.edit')->with(['restaurant' => $restaurant ,
                                                      'packages'  => $packages ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name_ar'     => 'required|string|max:191',
            'name_en'     => 'required|string|max:191',
            'email'    => 'required|email|unique:restaurants,email,'.$id,
            'password' => 'nullable|string|max:191',
            'phone'    => 'required|numeric|unique:restaurants,phone,'.$id,
            'package_id' => 'required|numeric',
            'status'     => 'required|numeric',

            ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
          
          
          $restaurant = Restaurants::whereId($id)->first();  

           if (isset($request->password)) {
            
             $password = Hash::make($request->password);  
            
           }else{

              $password = $restaurant->password;
           }

          $end_date_package_date = Restaurants::whereId($id)->first()->end_date_package;

          $date_now = date("Y-m-d");

          if ($date_now > $end_date_package_date) {

          $package_id=$request->package_id;  
          $duration = Packages::whereId($package_id)->first()->duration;
          
          $date =date("Y-m-d");
          $day = $duration;
          $end_date_package=date('Y-m-d', strtotime("+$day days"));

         }else{
            $end_date_package = $end_date_package_date;
         }

         $restaurant = array(
                  "name_ar"        => $request->name_ar, 
                  "name_en"        => $request->name_en, 
                  "email"       => $request->email, 
                  "phone"       => $request->phone, 
                  "package_id"  => $request->package_id,
                  "status"      => $request->status,  
                  "password"    => $password, 
                  "end_date_package" => $end_date_package,
          );

          $updateRestaurant = Restaurants::whereId($id)->update($restaurant);

              
          if ($updateRestaurant) {
             return redirect()->back()->with('success','تم الاضافة بنجاح');
          }else{
             return redirect()->back()->with('error','حدث خطاء اثناء اضافة البيانات');           
          }


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = Restaurants::whereId($id)->first();
        
        if (isset($restaurant)) {
             
            if ($restaurant->delete()) {

              return redirect()->back()->with('success','تم الحذف بنجاح');

            }else{

              return redirect()->back()->with('error','حدث خطاء اثناء الحذف');

            }

         }else{
            
            return redirect()->back()->with('error','هذا المطعم غير موجود');

         } 
    }

    public function requests($id)
    {
        return view('admin.restaurants.requests');
    }

    public function menu($id)
    { 
        $meals = Restaurant_meals::where('restaurant_id',$id)->with("restaurant")->get();
        return view('admin.restaurants.menu')->with(['meals' => $meals]);
    }
    

    public function events($id)
    {
        $events = Restaurant_events::where('restaurant_id',$id)->with("restaurant")->get();
        return view('admin.restaurants.events')->with(['events' => $events]);
    }
}
