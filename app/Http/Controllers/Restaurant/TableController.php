<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\models\Restaurants;
use App\models\Restaurant_tables;

class TableController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::guard('restaurant')->check()) {  

         $restaurant_id = Auth::guard('restaurant')->user()->id;
         $tables = Restaurant_tables::where('restaurant_id',$restaurant_id)->get();
         return view('restaurant.tables.index')->with(['tables' => $tables]);

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
        return view('restaurant.tables.create');
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
            'table_id'     => 'required|string|max:191',
            'people_number'    => 'required|string|max:191',
            'image'    => 'required|mimes:jpg,jpeg,png,bmp|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
          
          $table_id = $request->table_id;
          $people_number = $request->people_number;
          $restaurant_id = Auth::guard('restaurant')->user()->id;


          
          $findTable = Restaurant_tables::where('restaurant_id',$restaurant_id)
                                        ->where('table_id',$table_id)
                                        ->first();
          if (isset($findTable)) {
             return redirect()->back()->with('error','رقم الطاولة موجود بالفعل');           
          }                               

          $image = $request->image;  
          $imageExtension = $image->getClientOriginalExtension();
          $path           = $image->storeAs('restaurant_tables',Str::random(5).'.'.$imageExtension, 'public'); 


          $newTable = new Restaurant_tables;

          $newTable->table_id = $table_id;  
          $newTable->people_number = $people_number;
          $newTable->restaurant_id = $restaurant_id;
          $newTable->image= 'storage/'.$path;

          if ($newTable->save()) {
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
        $table = Restaurant_tables::whereId($id)->first();
        return view('restaurant.tables.edit')->with(['table' => $table]);
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
            'table_id'     => 'required|string|max:191',
            'people_number'    => 'required|string|max:191',
            'image'    => 'nullable|mimes:jpg,jpeg,png,bmp|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{

          $table_id = $request->table_id;
          $people_number = $request->people_number;
          $restaurant_id = Auth::guard('restaurant')->user()->id;

          $findTable = Restaurant_tables::where('id','<>',$id)
                                        ->where('restaurant_id',$restaurant_id)
                                        ->where('table_id',$table_id)
                                        ->first();
          if (isset($findTable)) {
             return redirect()->back()->with('error','رقم الطاولة موجود بالفعل');           
          }            
    

          if (isset($request->image)) {

               $image = $request->image;  
               $imageExtension = $image->getClientOriginalExtension();
               $path           = $image->storeAs('restaurant_tables',Str::random(5).'.'.$imageExtension, 'public'); 

               $image = 'storage/'.$path;

          }else{
               
               $image = Restaurant_tables::whereId($id)->first()->image;

          }

          $table = array(
              "table_id" => $table_id,  
              "people_number" => $people_number,
              "restaurant_id" => $restaurant_id,
              "image" => $image,
           );
           
           $updateTable = Restaurant_tables::whereId($id)->update($table);

          if ($updateTable) {
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
        $table = Restaurant_tables::whereId($id)->first();
        
        if (isset($table)) {
             
            if ($table->delete()) {

              return redirect()->back()->with('success','تم الحذف بنجاح');

            }else{

              return redirect()->back()->with('error','حدث خطاء اثناء الحذف');

            }

         }else{
            
            return redirect()->back()->with('error','هذة الباقة غير موجودة');

         } 
    }

    public function changeStatus($id)
    {
        $table = Restaurant_tables::whereId($id)->first();
        
        if (isset($table)) {
            
            $update = Restaurant_tables::whereId($id)->update(['status' => "0"]); 
            if ($update) {

              return redirect()->back()->with('success','تم التفريغ بنجاح');

            }else{

              return redirect()->back()->with('error','حدث خطاء اثناء التفريغ');

            }

         }else{
            
            return redirect()->back()->with('error','هذة الباقة غير موجودة');

         } 
    }
}
