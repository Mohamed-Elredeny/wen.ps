<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\models\Hotels;
use App\models\Hotel_services;

class ServiceController extends Controller
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
         $services = Hotel_services::where('hotel_id',$hotel_id)->get();
         return view('hotels.services.index')->with(['services' => $services]);

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
        return view('hotels.services.create');
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
            'name_ar'           => 'required|string|max:191',
            'name_en'           => 'required|string|max:191',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
          

          $newService = new Hotel_services;

          $newService->name_ar = $request->name_ar;  
          $newService->name_en = $request->name_en;  
          $newService->hotel_id = Auth::guard('hotel')->user()->id;
  
 
          if ($newService->save()) {
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
        $service = Hotel_services::whereId($id)->first();
        return view('hotels.services.edit')->with(['service' => $service]);
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
            
            'name_ar'           => 'required|string|max:191',
            'name_en'           => 'required|string|max:191',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
          
          $service = array(
                  "name_ar"          => $request->name_ar, 
                  "name_en"          => $request->name_en, 
                  "hotel_id" => Auth::guard('hotel')->user()->id,
          );

           $updateService = Hotel_services::whereId($id)->update($service);

          if ($updateService) {
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
        $service = Hotel_services::whereId($id)->first();
        
        if (isset($service)) {
             
            if ($service->delete()) {

              return redirect()->back()->with('success','تم الحذف بنجاح');

            }else{

              return redirect()->back()->with('error','حدث خطاء اثناء الحذف');

            }

         }else{
            
            return redirect()->back()->with('error','هذة الباقة غير موجودة');

         } 
    }
}
