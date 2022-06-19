<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


use App\models\Restaurants;
use App\models\Restaurant_categories;
use App\models\Restaurant_meals;

class CategoryController extends Controller
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
            $categories = Restaurant_categories::where('restaurant_id',$restaurant_id)->get();
            return view('restaurant.categories.index')->with(['categories' => $categories]);
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
        return view('restaurant.categories.create');
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
            'size'     => 'nullable|array',
            'size.*'   => 'nullable|string',            
            'image'    => 'required|mimes:jpg,jpeg,png,bmp|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
          
          $image = $request->image;  
          $imageExtension = $image->getClientOriginalExtension();
          $path           = $image->storeAs('restaurant_categories',Str::random(5).'.'.$imageExtension, 'public'); 

          $newCategory = new Restaurant_categories;

          $newCategory->name_ar = $request->name_ar;  
          $newCategory->name_en = $request->name_en;  
          $newCategory->size = $request->size;
          $newCategory->image= 'storage/'.$path;
          $newCategory->restaurant_id = Auth::guard('restaurant')->user()->id;
  
 
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
        $category = Restaurant_categories::whereId($id)->first();
        return view('restaurant.categories.edit')->with(['category' => $category]);
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
            'size'     => 'nullable|array',
            'size.*'   => 'nullable|string',  
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
               $path           = $image->storeAs('restaurant_categories',Str::random(5).$imageExtension, 'public'); 

               $image = 'storage/'.$path;

          }else{
               
               $image = Restaurant_categories::whereId($id)->first()->image;

          }

          $category = array(
                  "name_ar"          => $request->name_ar, 
                  "name_en"          => $request->name_en, 
                  "size"          => $request->size, 
                  "restaurant_id" => Auth::guard('restaurant')->user()->id,
                  "image"         => $image, 
          );

           $updateCategory = Restaurant_categories::whereId($id)->update($category);

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
        $category = Restaurant_categories::whereId($id)->first();
        
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

    public function getMeals($category_id)
    {
      if (Auth::guard('restaurant')->check()) {
  
        $restaurant_id = Auth::guard('restaurant')->user()->id;
        $meals = Restaurant_meals::where('restaurant_id',$restaurant_id)
                                 ->where('category_id',$category_id)   
                                 ->with('category')
                                 ->get();
        return view('restaurant.categories.meals')->with(['meals' => $meals]);

      }else{
      
         return redirect()->route('user-login');

      }

    }
}
