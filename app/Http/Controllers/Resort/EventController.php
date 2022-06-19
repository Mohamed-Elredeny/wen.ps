<?php

namespace App\Http\Controllers\Resort;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\models\Resorts;
use App\models\Resort_events;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('resort')->check()) {  

         $resort_id = Auth::guard('resort')->user()->id;
         $events = Resort_events::where('resort_id',$resort_id)->get();
         return view('resorts.events.index')->with(['events' => $events]);

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
        return view('resorts.events.create');
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
            'title_ar'           => 'required|string|max:191',
            'title_en'           => 'required|string|max:191',
            'description_ar'     => 'required|string',
            'description_en'     => 'required|string',
            'image'           => 'required|mimes:jpg,jpeg,png,bmp|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
          
          $image = $request->image;  
          $imageExtension = $image->getClientOriginalExtension();
          $path           = $image->storeAs('resort_events',Str::random(5).'.'.$imageExtension, 'public'); 

          $newEvent = new Resort_events;

          $newEvent->title_ar = $request->title_ar;  
          $newEvent->title_en = $request->title_en;  
          $newEvent->description_ar = $request->description_ar;
          $newEvent->description_en = $request->description_en;
          $newEvent->image= 'storage/'.$path;
          $newEvent->resort_id = Auth::guard('resort')->user()->id;
  
 
          if ($newEvent->save()) {
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
        $event = Resort_events::whereId($id)->first();
        return view('resorts.events.show')->with(['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Resort_events::whereId($id)->first();
        return view('resorts.events.edit')->with(['event' => $event]);
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
            'title_ar'           => 'required|string|max:191',
            'title_en'           => 'required|string|max:191',
            'description_ar'     => 'required|string',
            'description_en'     => 'required|string',
            'image'           => 'nullable|mimes:jpg,jpeg,png,bmp|max:2000',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
          
          if (isset($request->image)) {
              
               $image = $request->image;  
               $imageExtension = $image->getClientOriginalExtension();
               $path           = $image->storeAs('resort_events',Str::random(5).'.'.$imageExtension, 'public'); 

               $image = 'storage/'.$path;

          }else{
               
               $image = Resort_events::whereId($id)->first()->image;

          }

          $event = array(
                  "title_ar"          => $request->title_ar, 
                  "title_en"          => $request->title_en, 
                  "description_ar"    => $request->description_ar, 
                  "description_en"    => $request->description_en,  
                  "resort_id" => Auth::guard('resort')->user()->id,
                  "image"         => $image, 
          );

           $updateEvent = Resort_events::whereId($id)->update($event);

          if ($updateEvent) {
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
        $event = Resort_events::whereId($id)->first();
        
        if (isset($event)) {
             
            if ($event->delete()) {

              return redirect()->back()->with('success','تم الحذف بنجاح');

            }else{

              return redirect()->back()->with('error','حدث خطاء اثناء الحذف');

            }

         }else{
            
            return redirect()->back()->with('error','هذة الباقة غير موجودة');

         }   
     }
}
