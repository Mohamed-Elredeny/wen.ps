<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use App\models\Visitors;

class VisitorLoginController extends Controller
{
        public function __construct()
    {
        $this->middleware('guest:visitor')->except('logout');
    }

    public function register(){
         
         return view('register');

    }

    public function saveVisitor(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:191',
            'email'    => 'required|string|unique:visitors,email',
            'password' => 'required|string|max:191',
            'phone'    => 'required|numeric|unique:visitors,phone',
            'type'     => 'required|string',
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{

          if ($request->type != "visitor") {
            
            return redirect()->back()->with(['error' => "لابد من تحديد الموع زائر"]);

          }
          
           
          $newVisitor = new Visitors;

          $newVisitor->name = $request->name;  
          $newVisitor->email = $request->email;
          $newVisitor->phone = $request->phone;
          $newVisitor->status = "1"; 
          $newVisitor->password = Hash::make($request->password); 
          

             $credentials = [

            'email'    => $request->email,
            'password' => $request->password,

            ];


          if ($newVisitor->save()) {
             auth()->guard('visitor')->attempt($credentials);
             return redirect('/');
          }else{
             return redirect()->back()->with('error','حدث خطاء اثناء اضافة البيانات');           
          }


        }     
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
                if(auth()->guard('visitor')->attempt($credentials))
                {
                    return redirect('/');
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
