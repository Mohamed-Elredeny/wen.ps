<?php

namespace App\Http\Controllers\Resort;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


use App\models\Resort_categories;
use App\models\Resort_resorts;
class CategoryController extends Controller
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
            $categories = Resort_categories::where('resort_id',$resort_id)->get();
            return view('resorts.categories.index')->with(['categories' => $categories]);
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
        return view('resorts.categories.create');
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
            'image'    => 'required|mimes:jpg,jpeg,png,bmp|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
          
          $image = $request->image;  
          $imageExtension = $image->getClientOriginalExtension();
          $path           = $image->storeAs('resort_categories',Str::random(5).'.'.$imageExtension, 'public'); 

          $newCategory = new Resort_categories;

          $newCategory->name_ar = $request->name_ar;  
          $newCategory->name_en = $request->name_en;  
          $newCategory->image= 'storage/'.$path;
          $newCategory->resort_id = Auth::guard('resort')->user()->id;
  
 
          if ($newCategory->save()) {
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
        $category = Resort_categories::whereId($id)->first();
        return view('resorts.categories.edit')->with(['category' => $category]);   
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
               $path           = $image->storeAs('resort_categories',Str::random(5).'.'.$imageExtension, 'public'); 

               $image = 'storage/'.$path;

          }else{
               
               $image = Resort_categories::whereId($id)->first()->image;

          }

          $category = array(
                  "name_ar"          => $request->name_ar, 
                  "name_en"          => $request->name_en, 
                  "resort_id" => Auth::guard('resort')->user()->id,
                  "image"         => $image, 
          );

           $updateCategory = Resort_categories::whereId($id)->update($category);

          if ($updateCategory) {
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
        $category = Resort_categories::whereId($id)->first();
        
        if (isset($category)) {
             
            if ($category->delete()) {

              return redirect()->back()->with('success','تم الحذف بنجاح');

            }else{

              return redirect()->back()->with('error','حدث خطاء اثناء الحذف');

            }

         }else{
            
            return redirect()->back()->with('error','هذة الباقة غير موجودة');

         }    
    }

    public function getResorts($category_id){

        if (Auth::guard('resort')->check()) {

            $resort_id = Auth::guard('resort')->user()->id;
            $resorts = Resort_resorts::where('resort_id',$resort_id)
                                     ->where('category_id',$category_id)
                                     ->with("resort")
                                     ->get();
            return view('resorts.categories.resorts')->with(['resorts' => $resorts]);
       }else{
         
         return redirect()->route('user-login');

       }  
    }
}
