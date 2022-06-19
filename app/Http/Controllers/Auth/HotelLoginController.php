<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class HotelLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:hotel')->except('logout');
    }

    public function login($email,$password)
    {
      
       $request = new Request([
            'email'    => $email,
            'password' => $password
        ]);

        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'password'  => 'required|string',
            ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{

                $credentials = [

                'email'    => $email,
                'password' => $password,

                ];
                // Attempt to log the user in
                if(auth()->guard('hotel')->attempt($credentials))
                {
                    return redirect('/hotel');
                    // return 'user login';
                }

                // // if unsuccessful
                return redirect()->back()->with('error','البريد الالكتروني او كلمة المرور غير صحيحة');

                // return 'user';
            }
    }

    public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('/');
    } 

}
