<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\models\Gifts;
use App\models\Visitor_gifts;


class GiftsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gifts = Gifts::all();

        return view('admin.gifts.index')->with(['gifts' => $gifts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gifts.create');
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
            'points'   => 'required|numeric',
            'details_ar'  => 'required|string',
            'details_en'  => 'required|string',
            'image'    => 'required|mimes:jpg,jpeg,png,bmp|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{

          $image = $request->image;  
          $imageExtension = $image->getClientOriginalExtension();
          $path           = $image->storeAs('gifts',Str::random(5).$imageExtension, 'public'); 

          
          $newGift = new Gifts;

          $newGift->name_ar = $request->name_ar;  
          $newGift->name_en = $request->name_en;  
          $newGift->points = $request->points;  
          $newGift->details_ar = $request->details_ar;  
          $newGift->details_en = $request->details_en;  
          $newGift->image= 'storage/'.$path;

          if ($newGift->save()) {
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
        $gifts = Gifts::whereId($id)->first();
        return view('admin.gifts.show')->with(['gifts' => $gifts]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gift = Gifts::whereId($id)->first();
        return view('admin.gifts.edit')->with(['gift' => $gift]);

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
            'points'   => 'required|numeric',
            'details_ar'  => 'required|string',
            'details_en'  => 'required|string',
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
               $path           = $image->storeAs('gifts',Str::random(5).$imageExtension, 'public'); 

               $image = 'storage/'.$path;

          }else{
               
               $image = Gifts::whereId($id)->first()->image;

          }


          $gift = array(
                  "name_ar"     => $request->name_ar, 
                  "name_en"     => $request->name_en, 
                  "points"   => $request->points, 
                  "details_ar"  => $request->details_ar,
                  "details_en"  => $request->details_en,
                  "image"    => $image, 
          );

           $updateGift = Gifts::whereId($id)->update($gift);

          if ($updateGift) {
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
        $gift = Gifts::whereId($id)->first();
        
        if (isset($gift)) {
             
            if ($gift->delete()) {

              return redirect()->back()->with('success','تم الحذف بنجاح');

            }else{

              return redirect()->back()->with('error','حدث خطاء اثناء الحذف');

            }

         }else{
            
            return redirect()->back()->with('error','هذة الباقة غير موجودة');

         }    

     }

     public function visitorGifts(){
        
        $visitorGifts = Visitor_gifts::where('status','0')->with('visitor')->with('gift')->get();
        return view('admin.gifts.visitor_gifts')->with(['visitorGifts' => $visitorGifts]);


     }

     public function visitorGiftSend($id){
        
        $update = Visitor_gifts::whereId($id)->update(['status'=>'1']);

            if ($update) {

              return redirect()->back()->with('success','تم التسليم');

            }else{

              return redirect()->back()->with('error','حدث خطاء اثناء الحذف');

            }

     }

}
