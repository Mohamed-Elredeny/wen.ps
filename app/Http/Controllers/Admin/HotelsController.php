<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\models\Hotels;
use App\models\Packages;
use App\models\Hotel_events;
use App\models\Hotel_rooms;


class HotelsController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotels::all();
        return view('admin.hotels.index')->with(['hotels' => $hotels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = Packages::all(); 
        return view('admin.hotels.create')->with(['packages' => $packages]);
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
            'email'    => 'required|email|unique:hotels,email',
            'password' => 'required|string|max:191',
            'phone'    => 'required|numeric|unique:hotels,phone',
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

          $newHotel = new Hotels;

          $newHotel->name_ar = $request->name_ar;  
          $newHotel->name_en = $request->name_en;  
          $newHotel->email = $request->email;  
          $newHotel->password = Hash::make($request->password);  
          $newHotel->phone = $request->phone; 
          $newHotel->package_id = $request->package_id; 
          $newHotel->end_date_package = $end_date_package;
          $newHotel->status = "1"; 

          if ($newHotel->save()) {
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
        $hotel = Hotels::whereId($id)
                       ->with('package')
                       ->with('hotel_images')
                       ->with('hotel_rooms')
                       ->with('hotel_events')
                       ->first();
        return view('admin.hotels.show')->with(['hotel' => $hotel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = Hotels::whereId($id)->first();
        $packages   = Packages::all(); 

        return view('admin.hotels.edit')->with(['hotel' => $hotel ,
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
            'email'    => 'required|email|unique:hotels,email,'.$id,
            'password' => 'nullable|string|max:191',
            'phone'    => 'required|numeric|unique:hotels,phone,'.$id,
            'package_id' => 'required|numeric',
            'status'     => 'required|numeric',

            ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
          
          
          $hotel = Hotels::whereId($id)->first();  

           if (isset($request->password)) {
            
             $password = Hash::make($request->password);  
            
           }else{

              $password = $hotel->password;
           }
          
          $end_date_package_date = Hotels::whereId($id)->first()->end_date_package;

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

         $hotel = array(
                  "name_ar"        => $request->name_ar, 
                  "name_en"        => $request->name_en, 
                  "email"       => $request->email, 
                  "phone"       => $request->phone, 
                  "package_id"  => $request->package_id,
                  "status"      => $request->status,  
                  "password"    => $password, 
                  "end_date_package" => $end_date_package,
          );

          $updateHotel = hotels::whereId($id)->update($hotel);

              
          if ($updateHotel) {
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
        $hotel = Hotels::whereId($id)->first();
        
        if (isset($hotel)) {
             
            if ($hotel->delete()) {

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
        return view('admin.hotels.requests');
    }

    public function rooms($id)
    {
        $rooms = Hotel_rooms::where('hotel_id',$id)->get();
        return view('admin.hotels.rooms')->with(['rooms' => $rooms]);
    }
    

    public function events($id)
    {
        $events = Hotel_events::where('hotel_id',$id)->get();
        return view('admin.hotels.events')->with(['events' => $events]);
    }
}
