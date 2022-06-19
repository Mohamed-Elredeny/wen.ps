<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\models\Hotels;
use App\models\Hotel_rooms;
use App\models\Book_rooms;

class RequestController extends Controller
{
    public function rooms()
    {

      if (Auth::guard('hotel')->check()) {  

         $hotel_id = Auth::guard('hotel')->user()->id;
         $rooms = Book_rooms::where('hotel_id',$hotel_id)->where('status','0')->get();
         return view('hotels.requests.rooms')->with(['rooms' => $rooms]);

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

    public function acceptRequest($id)
    {
       $update =  Book_rooms::whereId($id)->update(['status' => '1']);
       if ($update) {
            return redirect()->back()->with('success','تم التاكيد');
       }else{
            return redirect()->back()->with('error','حدث خطاء');        
       }
    }

    public function unacceptRequest($id)
    {
       $update =  Book_rooms::whereId($id)->update(['status' => '2']);
       if ($update) {
            return redirect()->back()->with('success','تم التاكيد');
       }else{
            return redirect()->back()->with('error','حدث خطاء');        
       }
    }

}
