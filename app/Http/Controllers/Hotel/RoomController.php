<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\models\Hotels;
use App\models\Hotel_rooms;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::guard('hotel')->check()) {  

         $hotel_id = Auth::guard('hotel')->user()->id;
         $rooms = Hotel_rooms::where('hotel_id',$hotel_id)->get();
         return view('hotels.rooms.index')->with(['rooms' => $rooms]);

      }else{
         return redirect()->route('user-login');
      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotels.rooms.create');
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
            'room_id'          => 'required|numeric',
            'people_number'    => 'required|numeric',
            'details_ar'          => 'required|string',   
            'details_en'          => 'required|string',   
            'price'            => 'required|string|max:191',                     
            'image'            => 'required|mimes:jpg,jpeg,png,bmp|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{

          $room_id = $request->room_id;
          $hotel_id = Auth::guard('hotel')->user()->id;

          
          $findRoom = Hotel_rooms::where('hotel_id',$hotel_id)
                                        ->where('room_id',$room_id)
                                        ->first();
          if (isset($findRoom)) {
             return redirect()->back()->with('error','رقم الغرفة موجود بالفعل');           
          }   
          
          $image = $request->image;  
          $imageExtension = $image->getClientOriginalExtension();
          $path           = $image->storeAs('hotel_rooms',Str::random(5).'.'.$imageExtension, 'public'); 

          $newRoom = new Hotel_rooms;

          $newRoom->room_id = $request->room_id;  
          $newRoom->people_number = $request->people_number;
          $newRoom->details_ar = $request->details_ar;  
          $newRoom->details_en = $request->details_en;  
          $newRoom->price = $request->price;
          $newRoom->image= 'storage/'.$path;
          $newRoom->hotel_id = Auth::guard('hotel')->user()->id; 
 
          if ($newRoom->save()) {
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
        return view('hotels.rooms.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Hotel_rooms::whereId($id)->first();
        return view('hotels.rooms.edit')->with(['room' => $room]);
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
            'room_id'          => 'required|string|max:191',
            'people_number'    => 'required|string|max:191',
            'details_ar'          => 'required|string',   
            'details_en'          => 'required|string',   
            'price'            => 'required|string|max:191',                     
            'image'            => 'nullable|mimes:jpg,jpeg,png,bmp|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{

          $room_id = $request->room_id;
          $hotel_id = Auth::guard('hotel')->user()->id;

          $findRoom = Hotel_rooms::where('id','<>',$id)
                                        ->where('hotel_id',$hotel_id)
                                        ->where('room_id',$room_id)
                                        ->first();
          if (isset($findRoom)) {
             return redirect()->back()->with('error','رقم الغرفة موجود بالفعل');           
          }
          
          if (isset($request->image)) {

               $image = $request->image;  
               $imageExtension = $image->getClientOriginalExtension();
               $path           = $image->storeAs('hotel_rooms',Str::random(5).'.'.$imageExtension, 'public'); 

               $image = 'storage/'.$path;

          }else{
               
               $image = Hotel_rooms::whereId($id)->first()->image;

          }

          $room = array(
                  "room_id"          => $request->room_id, 
                  "people_number"    => $request->people_number, 
                  "details_ar"          => $request->details_ar, 
                  "details_en"          => $request->details_en, 
                  "price"            => $request->price, 
                  "hotel_id"         => Auth::guard('hotel')->user()->id,
                  "image"            => $image, 
          );

           $updateRoom = Hotel_rooms::whereId($id)->update($room);

          if ($updateRoom) {
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
        $room = Hotel_rooms::whereId($id)->first();
        
        if (isset($room)) {
             
            if ($room->delete()) {

              return redirect()->back()->with('success','تم الحذف بنجاح');

            }else{

              return redirect()->back()->with('error','حدث خطاء اثناء الحذف');

            }

         }else{
            
            return redirect()->back()->with('error','هذة الباقة غير موجودة');

         }     
     }
}
