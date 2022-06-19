<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\models\Hotels;
use App\models\Hotel_rooms;
use App\models\Hotel_events;
use App\models\Hotel_images;
use App\models\Book_rooms;
  
class HomeController extends Controller
{
    public function home()
    {
     if (Auth::guard('hotel')->check()) {  

         $hotel_id = Auth::guard('hotel')->user()->id;

         $money = Book_rooms::where('hotel_id',$hotel_id)->sum('money');

         $all_book = Book_rooms::where('hotel_id',$hotel_id)->get();

         $pending_book = Book_rooms::where('hotel_id',$hotel_id)
                                   ->where('status','0')->get();

         $rooms = Hotel_rooms::where('hotel_id',$hotel_id)->get(); 

         $events = Hotel_events::where('hotel_id',$hotel_id)->get(); 


        return view('hotels.home')->with(['money' => $money,
                                          'all_book' => $all_book,
                                          'pending_book' => $pending_book,
                                          'rooms' => $rooms,
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
         if (Auth::guard('hotel')->check()) {  

         $hotel_id = Auth::guard('hotel')->user()->id;
         $hotel = Hotels::whereId($hotel_id)->with('package')->first();
         $images = Hotel_images::where('hotel_id',$hotel_id)->get();

         return view('hotels.details')->with(['hotel' => $hotel,
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
     if (Auth::guard('hotel')->check()) {   

        $validator = Validator::make($request->all(), [

            'name_ar'     => 'required|string|max:191',
            'name_en'     => 'required|string|max:191',
            'email'    => 'required|email|unique:hotels,email,'.$id,
            'password' => 'nullable|string|max:191',
            'phone'    => 'required|numeric|unique:hotels,phone,'.$id,
            'about_hotel_ar' => 'required|string',
            'about_hotel_en' => 'required|string',
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
               $path           = $logo->storeAs('hotel_logos',Str::random(5).'.'.$imageExtension, 'public'); 

               $logo = 'storage/'.$path;

          }else{
               
               $logo = Hotels::whereId($id)->first()->logo;

          }

          //password
          if (isset($request->password)) {
              
               $password = Hash::make($request->password); 

          }else{
               
               $password = Hotels::whereId($id)->first()->password;

          }

          $hotel = array(
                  "name_ar"          => $request->name_ar, 
                  "name_en"          => $request->name_en, 
                  "email"         => $request->email, 
                  "logo"          => $logo, 
                  "password"      => $password,
                  "phone"         => $request->phone,
                  "about_hotel_ar"         => $request->about_hotel_ar,
                  "about_hotel_en"         => $request->about_hotel_en,
                  "start_work" => $request->start_work,
                  "end_work"   => $request->end_work,
                  "address" => $request->address,
                  "lat" => $request->lat,
                  "lng" => $request->lng,

          );

           Hotels::whereId($id)->update($hotel);

           if (isset($request->image)) {
              
               $image = $request->image;  
               $imageExtension = $image->getClientOriginalExtension();
               $path           = $image->storeAs('hotel_images',Str::random(5).'.'.$imageExtension, 'public'); 

               $image = 'storage/'.$path;

               $hotelImage = new Hotel_images;
               $hotelImage->hotel_id = $id;
               $hotelImage->image = $image;
               $hotelImage->save();

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
     if (Auth::guard('hotel')->check()) {  
        
        $hotel_id = Auth::guard('hotel')->user()->id;
        $book_rooms = Book_rooms::where('hotel_id',$hotel_id)->get();
        return view('hotels.reports')->with(['book_rooms' => $book_rooms]);
     
     }else{
         return redirect()->route('user-login');
     }

    }

    public function delete_image($id){
       
        $image = Hotel_images::whereId($id)->first();
        
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
