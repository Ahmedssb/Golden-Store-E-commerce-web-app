<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class Main_cont extends Controller
{
    public function login(Request $request){
     
     if($request->isMethod('post')){
         $data=$request->input();
         //check if the user creditional is correct 
         if(Auth::attempt(['email' =>$data['email'], 'password' => $data['password'], 'admin' =>'1'])){
           // Session::put('adminSession',$data['email']);
            return redirect(route('AdminDashboard'));
         }
         else{ // redirect the user to login page and dis[lay error message
            return redirect(route('AdminLog'))->with('error_message','Invalid username or password') ;
 
         }
     }    

      return view('Admin.Log.AdminLogin_view');
    }

    public function logout(){
   // clear the session and redirect the user to the login page with success message
      Session::flush();
      return redirect(route('AdminLog'))->with('success_msg','you successfully logged out');
    }

    public function index(){

       /* if(Session::has('adminSession')){
            //perform all dashboard task
        }else{
            return redirect(route('AdminLog'))->with('error_message','You must login') ;
        }*/
        return view('Admin.Dashboard.Index_view');   

    }

    public function settings(){
        return view('Admin.Dashboard.Settings_view');
    }

  

}
