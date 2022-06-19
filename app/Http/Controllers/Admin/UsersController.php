<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\models\Visitors;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = Visitors::all();
        return view('admin.users.index')->with(['visitors' => $visitors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'name'     => 'required|string|max:191',
            'email'    => 'required|email|unique:visitors,email',
            'password' => 'required|string|max:191',
            'phone'    => 'required|numeric|unique:visitors,phone',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
      
          
          $newVisitor = new Visitors;

          $newVisitor->name = $request->name;  
          $newVisitor->email = $request->email;  
          $newVisitor->password = Hash::make($request->password);  
          $newVisitor->phone = $request->phone; 
          $newVisitor->status = "1"; 

          if ($newVisitor->save()) {
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
        $visitor = Visitors::whereId($id)->first();
        return view('admin.users.show')->with(['visitor' => $visitor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visitor = Visitors::whereId($id)->first();
        return view('admin.users.edit')->with(['visitor' => $visitor]);
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
            'name'     => 'required|string|max:191',
            'email'    => 'required|email|unique:visitors,email,'.$id,
            'password' => 'nullable|string|max:191',
            'phone'    => 'required|numeric|unique:visitors,phone,'.$id,
            ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
          
          
          $visitor = Visitors::whereId($id)->first();  

           if (isset($request->password)) {
            
             $password = Hash::make($request->password);  
            
           }else{

              $password = $visitor->password;
           }



      

         $visitor = array(
                  "name"        => $request->name, 
                  "email"       => $request->email, 
                  "phone"       => $request->phone, 
                  "status"      => $request->status,  
                  "password"    => $password, 
          );

          $updateVisitor = Visitors::whereId($id)->update($visitor);

              
          if ($updateVisitor) {
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
        $visitor = Visitors::whereId($id)->first();
        
        if (isset($visitor)) {
             
            if ($visitor->delete()) {

              return redirect()->back()->with('success','تم الحذف بنجاح');

            }else{

              return redirect()->back()->with('error','حدث خطاء اثناء الحذف');

            }

         }else{
            
            return redirect()->back()->with('error','هذا المطعم غير موجود');

         } 

    }
}
