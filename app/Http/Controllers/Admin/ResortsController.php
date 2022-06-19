<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\models\Resorts;
use App\models\Packages;
use App\models\Resort_images;
use App\models\Resort_resorts;
use App\models\Resort_events;

class ResortsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resorts = Resorts::all();
        return view('admin.resorts.index')->with(['resorts' => $resorts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = Packages::all(); 
        return view('admin.resorts.create')->with(['packages' => $packages]);
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
            'email'    => 'required|email|unique:resorts,email',
            'password' => 'required|string|max:191',
            'phone'    => 'required|numeric|unique:resorts,phone',
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

          $newResort = new Resorts;

          $newResort->name_ar = $request->name_ar;  
          $newResort->name_en = $request->name_en;  
          $newResort->email = $request->email;  
          $newResort->password = Hash::make($request->password);  
          $newResort->phone = $request->phone; 
          $newResort->package_id = $request->package_id; 
          $newResort->end_date_package = $end_date_package;
          $newResort->status = "1"; 

          if ($newResort->save()) {
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
        $resort = Resorts::whereId($id)->with('package')->first();
        $images = Resort_images::where('resort_id',$id)->get();

        $places = Resort_resorts::where('resort_id',$id)->with("resort")->get();
        $events = Resort_events::where('resort_id',$id)->with("resort")->get();

        return view('admin.resorts.show')->with(['resort' => $resort,
                                                  'images' => $images,
                                                  'places' => $places,
                                                  'events' => $events, 
                                                  
                                                    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resort     = Resorts::whereId($id)->first();
        $packages   = Packages::all(); 

        return view('admin.resorts.edit')->with(['resort' => $resort ,
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
            'email'    => 'required|email|unique:resorts,email,'.$id,
            'password' => 'nullable|string|max:191',
            'phone'    => 'required|numeric|unique:resorts,phone,'.$id,
            'package_id' => 'required|numeric',
            'status'     => 'required|numeric',

            ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
          
          
          $resort = Resorts::whereId($id)->first();  

           if (isset($request->password)) {
            
             $password = Hash::make($request->password);  
            
           }else{

              $password = $resort->password;
           }
          
          $end_date_package_date = Resorts::whereId($id)->first()->end_date_package;

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

         $resort = array(
                  "name_ar"        => $request->name_ar, 
                  "name_en"        => $request->name_en, 
                  "email"       => $request->email, 
                  "phone"       => $request->phone, 
                  "package_id"  => $request->package_id,
                  "status"      => $request->status,  
                  "password"    => $password, 
                  "end_date_package" => $end_date_package,
          );

          $updateResort = Resorts::whereId($id)->update($resort);

              
          if ($updateResort) {
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
        $resort = Resorts::whereId($id)->first();
        
        if (isset($resort)) {
             
            if ($resort->delete()) {

              return redirect()->back()->with('success','تم الحذف بنجاح');

            }else{

              return redirect()->back()->with('error','حدث خطاء اثناء الحذف');

            }

         }else{
            
            return redirect()->back()->with('error','هذا المطعم غير موجود');

         }
     }

    public function requests()
    {
        return view('admin.resorts.requests');
    }

    public function resort($id)
    {
        $places = Resort_resorts::where('resort_id',$id)->with("resort")->get();
        return view('admin.resorts.resort')->with(['places' => $places]);
    }
    

    public function events($id)
    {
        $events = Resort_events::where('resort_id',$id)->with("resort")->get();
        return view('admin.resorts.events')->with(['events' => $events]);
    }
}
