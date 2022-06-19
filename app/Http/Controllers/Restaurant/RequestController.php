<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\models\Restaurants;
use App\models\Restaurant_images;
use App\models\Restaurant_meals;
use App\models\Restaurant_tables;
use App\models\Restaurant_categories;
use App\models\Restaurant_events;
use App\models\Book_meals;
use App\models\Book_tables;

class RequestController extends Controller
{
    public function meals()
    {
     if (Auth::guard('restaurant')->check()) {  
         $restaurant_id = Auth::guard('restaurant')->user()->id;
         $meals = Book_meals::where('restaurant_id',$restaurant_id)->with('meal')->with('meal_size')->with('restaurant')->where('status','0')->get();
         return view('restaurant.requests.meals')->with(['meals' => $meals]);

      }else{
         return redirect()->route('user-login');
      }


    }

    public function tables()
    {
     if (Auth::guard('restaurant')->check()) {  
         $restaurant_id = Auth::guard('restaurant')->user()->id;
         $tables = Book_tables::where('restaurant_id',$restaurant_id)->with('restaurant')->where('status','0')->get();
         return view('restaurant.requests.tables')->with(['tables' => $tables]);

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
        //
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
        //
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

    public function acceptRequestMeal($id)
    {
       $update =  Book_meals::whereId($id)->update(['status' => '1']);
       if ($update) {
            return redirect()->back()->with('success','تم التاكيد');
       }else{
            return redirect()->back()->with('error','حدث خطاء');        
       }
    }

    public function unacceptRequestMeal($id)
    {
       $update =  Book_meals::whereId($id)->update(['status' => '2']);
       if ($update) {
            return redirect()->back()->with('success','تم التاكيد');
       }else{
            return redirect()->back()->with('error','حدث خطاء');        
       }
    }


    public function acceptRequestTable($id)
    {
       $update =  Book_tables::whereId($id)->update(['status' => '1']);
       if ($update) {
            return redirect()->back()->with('success','تم التاكيد');
       }else{
            return redirect()->back()->with('error','حدث خطاء');        
       }
    }

    public function unacceptRequestTable($id)
    {
       $update =  Book_tables::whereId($id)->update(['status' => '2']);
       if ($update) {
            return redirect()->back()->with('success','تم التاكيد');
       }else{
            return redirect()->back()->with('error','حدث خطاء');        
       }
    }
}
