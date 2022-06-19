<?php

namespace App\Http\Controllers\Resort;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\models\Resorts;
use App\models\Resort_categories;
use App\models\Resort_resorts;
use App\models\Resort_events;
use App\models\Resort_images;
use App\models\Book_places;


class HomeController extends Controller
{
    public function home()
    {
     if (Auth::guard('resort')->check()) {  

         $resort_id = Auth::guard('resort')->user()->id;

         $money = Book_places::where('resort_id',$resort_id)->sum('money');

         $all_book = Book_places::where('resort_id',$resort_id)->get();

         $pending_book = Book_places::where('resort_id',$resort_id)
                                   ->where('status','0')->get();


         $categories = Resort_categories::where('resort_id',$resort_id)->get(); 

         $places = Resort_resorts::where('resort_id',$resort_id)->get(); 

         $events = Resort_events::where('resort_id',$resort_id)->get(); 


        return view('resorts.home')->with(['money' => $money,
                                          'all_book' => $all_book,
                                          'pending_book' => $pending_book,
                                          'categories' => $categories,
                                          'places' => $places,
                                          'events' => $events   ]);

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
        if (Auth::guard('resort')->check()) {  

         $resort_id = Auth::guard('resort')->user()->id;
         $resort = Resorts::whereId($resort_id)->with('package')->first();
         $images = Resort_images::where('resort_id',$resort_id)->get();

         return view('resorts.details')->with(['resort' => $resort,
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
     if (Auth::guard('resort')->check()) {   

        $validator = Validator::make($request->all(), [

            'name_ar'     => 'required|string|max:191',
            'name_en'     => 'required|string|max:191',
            'email'    => 'required|email|unique:resorts,email,'.$id,
            'password' => 'nullable|string|max:191',
            'phone'    => 'required|numeric|unique:resorts,phone,'.$id,
            'about_resort_ar' => 'required|string',
            'about_resort_en' => 'required|string',
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
               $path           = $logo->storeAs('resort_logos',Str::random(5).'.'.$imageExtension, 'public'); 

               $logo = 'storage/'.$path;

          }else{
               
               $logo = Resorts::whereId($id)->first()->logo;

          }

          //password
          if (isset($request->password)) {
              
               $password = Hash::make($request->password); 

          }else{
               
               $password = Resorts::whereId($id)->first()->password;

          }

          $resort = array(
                  "name_ar"          => $request->name_ar, 
                  "name_en"          => $request->name_en, 
                  "email"         => $request->email, 
                  "logo"          => $logo, 
                  "password"      => $password,
                  "phone"         => $request->phone,
                  "about_resort_ar"         => $request->about_resort_ar,
                  "about_resort_en"         => $request->about_resort_en,
                  "start_work" => $request->start_work,
                  "end_work"   => $request->end_work,
                  "address" => $request->address,
                  "lat" => $request->lat,
                  "lng" => $request->lng,

          );

           Resorts::whereId($id)->update($resort);

           if (isset($request->image)) {
              
               $image = $request->image;  
               $imageExtension = $image->getClientOriginalExtension();
               $path           = $image->storeAs('resort_images',Str::random(5).'.'.$imageExtension, 'public'); 

               $image = 'storage/'.$path;

               $resortImage = new Resort_images;
               $resortImage->resort_id = $id;
               $resortImage->image = $image;
               $resortImage->save();

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
     if (Auth::guard('resort')->check()) {  
        
        $resort_id = Auth::guard('resort')->user()->id;
        $places = Book_places::where('resort_id',$resort_id)->with('resort')->get();
        return view('resorts.reports')->with(['places' => $places]);
     
     }else{
         return redirect()->route('user-login');
     }
     
    }


    public function delete_image($id){
       
        $image = Resort_images::whereId($id)->first();
        
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
