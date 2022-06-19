<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\models\Gifts;
use App\models\Visitor_gifts;
use App\models\Visitors;

class GiftsController extends Controller
{
    public function getAllGifts()
    {
        $gifts = Gifts::all();

        return view('site.gifts')->with(['gifts' => $gifts]);
    }

    public function getGiftDetails($gift_id){
          
          $gift = Gifts::whereId($gift_id)->first();
       
          return view('site.gift_details')->with(['gift' => $gift]);

    }

    public function get_gift(Request $request){

    if (Auth::guard('visitor')->check()) {  

       $points = Auth::guard('visitor')->user()->points;
       $gifts = Gifts::all();

        return view('site.get_gift')->with(['gifts' => $gifts,'points' => $points]);
    
     }else{

        return redirect('/');

     }


    }


    public function save_gift(Request $request){

      if (Auth::guard('visitor')->check()) {  

        $points = Auth::guard('visitor')->user()->points;
        $visitor_id = Auth::guard('visitor')->user()->id;
       
        $validator = Validator::make($request->all(), [
            'gift_id'   => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            
            $gift_id = $request->gift_id;

            $gift_points = Gifts::whereId($gift_id)->first()->points;

            if ($gift_points > $points) {
                
                return redirect()->back()->with('error','نقاط الهدية اعلى من نقاطك');

            }else{
                
                 $getGift = new Visitor_gifts;
                 $getGift->visitor_id = $visitor_id;
                 $getGift->gift_id = $gift_id;

                  if ($getGift->save()) {
                     
                     $new_points = $points-$gift_points;

                     Visitors::whereId($visitor_id)->update(['points' => $new_points]);  

                     return redirect()->back()->with('success','تم الاضافة بنجاح');
                  }else{
                     return redirect()->back()->with('error','حدث خطاء اثناء اضافة البيانات');           
                  }

            }

        }

        return view('site.get_gift')->with(['gifts' => $gifts,'points' => $points]);
    
     }else{

        return redirect('/');

     }

    }

    public function my_gifts(Request $request){

    if (Auth::guard('visitor')->check()) {  

       $visitor_id = Auth::guard('visitor')->user()->id;
     
       $gifts = Visitor_gifts::where('visitor_id',$visitor_id)->with('visitor')->with('gift')->get();
       
        return view('site.my_gift')->with(['gifts' => $gifts]);
    
     }else{

        return redirect('/');

     }


    }

}
