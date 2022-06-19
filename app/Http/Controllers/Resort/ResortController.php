<?php

namespace App\Http\Controllers\Resort;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


use App\models\Resort_categories;
use App\models\Resort_resorts;

class ResortController extends Controller
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
            $resorts = Resort_resorts::where('resort_id',$resort_id)
                                     ->with("resort")
                                     ->get();
            return view('resorts.resorts.index')->with(['resorts' => $resorts]);
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
        $categories = Resort_categories::all();
        return view('resorts.resorts.create')->with(['categories' => $categories]);
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
            'details_ar'  => 'required|string',
            'details_en'  => 'required|string',
            'price'    => 'required|numeric',
            'category_id' => 'required|numeric', 
            'image'    => 'required|mimes:jpg,jpeg,png,bmp|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
          
          $image = $request->image;  
          $imageExtension = $image->getClientOriginalExtension();
          $path           = $image->storeAs('resort_resorts',Str::random(5).'.'.$imageExtension, 'public'); 

          $newResort = new Resort_resorts;

          $newResort->name_ar = $request->name_ar;  
          $newResort->name_en = $request->name_en;  
          $newResort->details_ar = $request->details_ar; 
          $newResort->details_en = $request->details_en;  
          $newResort->price = $request->price;  
          $newResort->category_id = $request->category_id;  
          $newResort->image= 'storage/'.$path;
          $newResort->resort_id = Auth::guard('resort')->user()->id;
  
 
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
        $resort = Resort_resorts::whereId($id)->first();
        $categories = Resort_categories::all();
        return view('resorts.resorts.edit')->with(['resort' => $resort ,
                                                   'categories' => $categories]);
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
            'details_ar'  => 'required|string',
            'details_en'  => 'required|string',
            'price'    => 'required|numeric',
            'category_id' => 'required|numeric',
            'image'    => 'nullable|mimes:jpg,jpeg,png,bmp|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
          
          if (isset($request->image)) {

               $image = $request->image;  
               $imageExtension = $image->getClientOriginalExtension();
               $path           = $image->storeAs('resort_resorts',Str::random(5).'.'.$imageExtension, 'public'); 

               $image = 'storage/'.$path;

          }else{
               
               $image = Resort_resorts::whereId($id)->first()->image;

          }

          $resort = array(
                  "name_ar"           => $request->name_ar, 
                  "name_en"           => $request->name_en, 
                  "details_ar"        => $request->details_ar, 
                  "details_en"        => $request->details_en, 
                  "price"          => $request->price, 
                  "category_id"    => $request->category_id, 
                  "resort_id"      => Auth::guard('resort')->user()->id,
                  "image"          => $image, 
          );

           $updateResort = Resort_resorts::whereId($id)->update($resort);

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
        $resort = Resort_resorts::whereId($id)->first();
        
        if (isset($resort)) {
             
            if ($resort->delete()) {

              return redirect()->back()->with('success','تم الحذف بنجاح');

            }else{

              return redirect()->back()->with('error','حدث خطاء اثناء الحذف');

            }

         }else{
            
            return redirect()->back()->with('error','هذة الباقة غير موجودة');

         }   
    }
}
