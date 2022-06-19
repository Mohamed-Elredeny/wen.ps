<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\models\Rates;
use App\models\Hotels;
use App\models\Restaurants;
use App\models\Resorts;
use App\models\Visitors;

class RateController extends Controller
{
    public function saveRate(Request $request)
    {

      if (Auth::guard('visitor')->check()) { 

        $validator = Validator::make($request->all(), [
            'type'        => 'required|string|max:191',
            'hotel_id'    => 'required|numeric',
            'rate'        => 'required|numeric',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
              
              $newRate = new Rates;
              $newRate->type = $request->type;
              $newRate->hotel_id = $request->hotel_id;
              $newRate->rate = $request->rate;
              $newRate->visitor_id = Auth::guard('visitor')->user()->id;

              if ($newRate->save()) {
                  
                return redirect()->back()->with(["success" => "تم الارسال بنجاح"]);     

              }else{

                return redirect()->back()->with(["error" => "حدث خطاء اثناء الارسال"]);     

              }

        }  
    }else{
           return redirect()->route('user-login');
    }      


        
    }
}
