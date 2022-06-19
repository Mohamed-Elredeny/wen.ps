<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\models\Packages;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Packages::all();

        return view('admin.packages.index')->with(['packages' => $packages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.packages.create');
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
            'price'    => 'required|string|max:191',
            'duration' => 'required|numeric',
            'details_ar'  => 'required|string',
            'details_en'  => 'required|string',
            'image'           => 'required|mimes:jpg,jpeg,png,bmp|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{

          $image = $request->image;  
          $imageExtension = $image->getClientOriginalExtension();
          $path           = $image->storeAs('packages',Str::random(5).'.'.$imageExtension, 'public'); 

          
          $newPackage = new Packages;

          $newPackage->name_ar = $request->name_ar;  
          $newPackage->name_en = $request->name_en;  
          $newPackage->price = $request->price;  
          $newPackage->duration = $request->duration;  
          $newPackage->details_ar = $request->details_ar;  
          $newPackage->details_en = $request->details_en;  
          $newPackage->image= 'storage/'.$path;

          if ($newPackage->save()) {
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
        $package = Packages::whereId($id)->first();
        return view('admin.packages.show')->with(['package' => $package]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Packages::whereId($id)->first();
        return view('admin.packages.edit')->with(['package' => $package]);
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
            'price'    => 'required|string|max:191',
            'duration' => 'required|numeric',
            'details_ar'  => 'required|string',
            'details_en'  => 'required|string',
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
               $path           = $image->storeAs('packages',Str::random(5).'.'.$imageExtension, 'public'); 

               $image = 'storage/'.$path;

          }else{
               
               $image = Packages::whereId($id)->first()->image;

          }


          $package = array(
                  "name_ar"     => $request->name_ar, 
                  "name_en"     => $request->name_en, 
                  "price"       => $request->price, 
                  "duration"    => $request->duration, 
                  "details_ar"  => $request->details_ar,
                  "details_en"  => $request->details_en,
                  "image"       => $image, 
          );

           $updatePackage = Packages::whereId($id)->update($package);

          if ($updatePackage) {
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
        $package = Packages::whereId($id)->first();
        
        if (isset($package)) {
             
            if ($package->delete()) {

              return redirect()->back()->with('success','تم الحذف بنجاح');

            }else{

              return redirect()->back()->with('error','حدث خطاء اثناء الحذف');

            }

         }else{
            
            return redirect()->back()->with('error','هذة الباقة غير موجودة');

         } 

    }
}
