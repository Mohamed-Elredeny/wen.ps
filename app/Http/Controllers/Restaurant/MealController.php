<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\models\Restaurant_categories;
use App\models\Restaurant_meals;
use App\models\Restaurant_meal_sizes;

class MealController extends Controller
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
        $meals = Restaurant_meals::where('restaurant_id',$restaurant_id)
                                 ->with('category')
                                 ->get();
        return view('restaurant.meals.index')->with(['meals' => $meals]);

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
      if (Auth::guard('restaurant')->check()) {

        $restaurant_id = Auth::guard('restaurant')->user()->id;

        $categories = Restaurant_categories::where('restaurant_id',$restaurant_id)
                                           ->get();

        return view('restaurant.meals.create')->with(['categories' => $categories]);

      }else{
      
         return redirect()->route('user-login');

      }

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
            'category_id' => 'required|numeric',
            'name_ar'     => 'required|string|max:191',
            'name_en'     => 'required|string|max:191',
            'component_ar'=> 'required|string',                
            'component_en'=> 'required|string',            
            'size'     => 'nullable|array',
            'size.*'   => 'nullable|string',
            'price'    => 'required|array',
            'price.*'  => 'required|string',            
            'image'    => 'required|mimes:jpg,jpeg,png,bmp|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
          
          $image = $request->image;  
          $imageExtension = $image->getClientOriginalExtension();
          $path           = $image->storeAs('restaurant_meals',Str::random(5).'.'.$imageExtension, 'public'); 

          $newMeal = new Restaurant_meals;

          $newMeal->category_id = $request->category_id;  
          $newMeal->name_ar = $request->name_ar;  
          $newMeal->name_en = $request->name_en;  
          $newMeal->component_ar = $request->component_ar;
          $newMeal->component_en = $request->component_en;  
          $newMeal->image= 'storage/'.$path;
          $newMeal->restaurant_id = Auth::guard('restaurant')->user()->id;
          $newMeal->save();

          
          $size  = $request->size;
          $price = $request->price;
        
        if (isset($size)) {

          for ($i=0; $i < count($size); $i++) { 
             $newMealSize = new Restaurant_meal_sizes;              
              $newMealSize->size  = $size[$i];
              $newMealSize->price = $price[$i];
              $newMealSize->meal_id = $newMeal->id;
              $newMealSize->save();
          }

        }else{

              $newMealSize = new Restaurant_meal_sizes;              
              $newMealSize->price = $price;
              $newMealSize->meal_id = $newMeal->id;
              $newMealSize->save();

        } 
  
 
             return redirect()->back()->with('success','تم الاضافة بنجاح');

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

      if (Auth::guard('restaurant')->check()) {

        $meal = Restaurant_meals::whereId($id)->first();

        $restaurant_id = Auth::guard('restaurant')->user()->id;
        $categories = Restaurant_categories::where('restaurant_id',$restaurant_id)
                                           ->get();

        return view('restaurant.meals.edit')->with(['meal' => $meal,
                                                    'categories' => $categories  ]);

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
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|numeric',
            'name_ar'     => 'required|string|max:191',
            'name_en'     => 'required|string|max:191',
            'component_ar'=> 'required|string',                
            'component_en'=> 'required|string',             
            'size'        => 'nullable|array',
            'size.*'      => 'nullable|string',
            'price'       => 'required|array',
            'price.*'     => 'required|string',       
            'image'       => 'nullable|mimes:jpg,jpeg,png,bmp|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
          
          if (isset($request->image)) {

              $image = $request->image;  
              $imageExtension = $image->getClientOriginalExtension();
              $path           = $image->storeAs('restaurant_meals',Str::random(5).'.'.$imageExtension, 'public'); 
              $image= 'storage/'.$path;
          
          }else{
             
             $image  = Restaurant_meals::whereId($id)->first()->image;

          }

          $newMeal = array(

          "category_id" => $request->category_id, 
          "name_ar" => $request->name_ar,
          "name_en" => $request->name_en,
          "component_ar" => $request->component_ar,
          "component_en" => $request->component_en,
          "image"=> $image,
          "restaurant_id" => Auth::guard('restaurant')->user()->id,

          );
          
          Restaurant_meals::whereId($id)->update($newMeal);
          Restaurant_meal_sizes::where('meal_id',$id)->delete();

          $size  = $request->size;
          $price = $request->price;

        if (isset($size)) {

          for ($i=0; $i < count($size); $i++) { 
             $newMealSize = new Restaurant_meal_sizes;              
              $newMealSize->size  = $size[$i];
              $newMealSize->price = $price[$i];
              $newMealSize->meal_id = $id;
              $newMealSize->save();
          }
          
        }else{

              $newMealSize = new Restaurant_meal_sizes;              
              $newMealSize->price = $price;
              $newMealSize->meal_id = $id;
              $newMealSize->save();

        } 
  

             return redirect()->back()->with('success','تم الاضافة بنجاح');

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
       $meal = Restaurant_meals::whereId($id)->first();
        
        if (isset($meal)) {
             
            if ($meal->delete()) {

              return redirect()->back()->with('success','تم الحذف بنجاح');

            }else{

              return redirect()->back()->with('error','حدث خطاء اثناء الحذف');

            }

         }else{
            
            return redirect()->back()->with('error','هذة الباقة غير موجودة');

         } 
    }

    public function getSizeCategory($id)
    {

      if (Auth::guard('restaurant')->check()) {  

             $restaurant_id = Auth::guard('restaurant')->user()->id;

            $size = Restaurant_categories::where('restaurant_id',$restaurant_id)->where('id',$id)->select('size')->first();
            if (isset($size)) {
               return response()->json($size->size);
            }else{
               $size=[]; 
               return response()->json($size);            
            }
        
        }else{
          
             return redirect()->route('user-login');

          }
    }
}
