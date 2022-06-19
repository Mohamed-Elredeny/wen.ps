<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\models\Restaurants;
use App\models\Restaurant_images;
use App\models\Restaurant_meals;
use App\models\Restaurant_tables;
use App\models\Restaurant_categories;
use App\models\Restaurant_events;
use App\models\Book_meals;
use App\models\Book_tables;


class HomeController extends Controller
{
    public function home()
    {

     if (Auth::guard('restaurant')->check()) {  

         $restaurant_id = Auth::guard('restaurant')->user()->id;

         $money = Book_meals::where('restaurant_id',$restaurant_id)->sum('money');
         

         $all_book_meals = Book_meals::where('restaurant_id',$restaurant_id)->get();
         $all_book_tables = Book_tables::where('restaurant_id',$restaurant_id)->get();
         
         $all_book = count($all_book_meals) + count($all_book_tables);


         $pending_book_meals = Book_meals::where('restaurant_id',$restaurant_id)
                                   ->where('status','0')->get();
         $pending_book_tables = Book_tables::where('restaurant_id',$restaurant_id)
                                   ->where('status','0')->get();
         
         $pending_book = count($pending_book_meals) + count($pending_book_tables);
                                   

         $tables = Restaurant_tables::where('restaurant_id',$restaurant_id)->get(); 

         $meals = Restaurant_meals::where('restaurant_id',$restaurant_id)->get(); 

         $categories = Restaurant_categories::where('restaurant_id',$restaurant_id)->get(); 

         $events = Restaurant_events::where('restaurant_id',$restaurant_id)->get(); 


        return view('restaurant.home')->with(['money' => $money,
                                          'all_book' => $all_book,
                                          'pending_book' => $pending_book,
                                          'tables' => $tables,
                                          'meals' => $meals,
                                          'categories' => $categories,
                                          'events' => $events,  ]);

     }else{
         return redirect()->route('user-login');
     }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if (Auth::guard('restaurant')->check()) {  

             $restaurant_id = Auth::guard('restaurant')->user()->id;
             $restaurant = Restaurants::whereId($restaurant_id)->with('package')->first();
             $images = Restaurant_images::where('restaurant_id',$restaurant_id)->get();

             return view('restaurant.details')->with(['restaurant' => $restaurant,
                                                      'images' => $images]);

          }else{
             return redirect()->route('user-login');
          }
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

     if (Auth::guard('restaurant')->check()) {   

        $validator = Validator::make($request->all(), [

            'name_ar'     => 'required|string|max:191',
            'name_en'     => 'required|string|max:191',
            'email'    => 'required|email|unique:restaurants,email,'.$id,
            'password' => 'nullable|string|max:191',
            'phone'    => 'required|numeric|unique:restaurants,phone,'.$id,
            'about_restaurant_ar' => 'required|string',
            'about_restaurant_en' => 'required|string',
            'start_work' => 'required|string',
            'end_work'   => 'required|string',
            'address' => 'nullable|string',
            'lat' => 'nullable|string',
            'lng' => 'nullable|string',            
            'image'    => 'nullable|mimes:jpg,jpeg,png,bmp|max:2000',
            'logo'     => 'nullable|mimes:jpg,jpeg,png,bmp|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
          //logo
          if (isset($request->logo)) {
              
               $logo = $request->logo;  
               $imageExtension = $logo->getClientOriginalExtension();
               $path           = $logo->storeAs('restaurant_logos',Str::random(5).'.'.$imageExtension, 'public'); 

               $logo = 'storage/'.$path;

          }else{
               
               $logo = Restaurants::whereId($id)->first()->logo;

          }

          //password
          if (isset($request->password)) {
              
               $password = Hash::make($request->password); 

          }else{
               
               $password = Restaurants::whereId($id)->first()->password;

          }

          $restaurant = array(
                  "name_ar"          => $request->name_ar, 
                  "name_en"          => $request->name_en, 
                  "email"         => $request->email, 
                  "logo"          => $logo, 
                  "password"      => $password,
                  "phone"         => $request->phone,
                  "about_restaurant_ar"         => $request->about_restaurant_ar,
                  "about_restaurant_en"         => $request->about_restaurant_en,
                  "start_work" => $request->start_work,
                  "end_work"   => $request->end_work,
                  "address" => $request->address,
                  "lat" => $request->lat,
                  "lng" => $request->lng,

          );

           Restaurants::whereId($id)->update($restaurant);

           if (isset($request->image)) {
              
               $image = $request->image;  
               $imageExtension = $image->getClientOriginalExtension();
               $path           = $image->storeAs('restaurant_images',Str::random(5).'.'.$imageExtension, 'public'); 

               $image = 'storage/'.$path;

               $restaurantImage = new Restaurant_images;
               $restaurantImage->restaurant_id = $id;
               $restaurantImage->image = $image;
               $restaurantImage->save();

          }

             return redirect()->back()->with('success','تم الاضافة بنجاح');
   

        }

      }else{
         
             return redirect()->route('user-login');

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
        //
    }

    public function reports()
    {

     if (Auth::guard('restaurant')->check()) {  
        
        $restaurant_id = Auth::guard('restaurant')->user()->id;
        $book_meals = Book_meals::where('restaurant_id',$restaurant_id)->get();
        return view('restaurant.reports')->with(['book_meals' => $book_meals]);
     
     }else{
         return redirect()->route('user-login');
     }

    }

    public function delete_image($id){
       
        $image = Restaurant_images::whereId($id)->first();
        
        if (isset($image)) {
             
            if ($image->delete()) {

              return redirect()->back()->with('success','تم الحذف بنجاح');

            }else{

              return redirect()->back()->with('error','حدث خطاء اثناء الحذف');

            }

         }else{
            
            return redirect()->back()->with('error','هذة الباقة غير موجودة');

         } 

    }
}
