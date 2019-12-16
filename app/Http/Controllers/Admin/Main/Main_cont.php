<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Model\Admin;
 
class Main_cont extends Controller
{
    public function login(Request $request){
     
     if($request->isMethod('post')){
         $data=$request->input();
         $count =Admin::where(['password'=>md5($data['password']),'username'=>$data['username'],'status'=>1])->count();
        
         if($count == 1 ){
            $admin_id =Admin::select('id')->where(['password'=>md5($data['password']),'username'=>$data['username'],'status'=>1])->get();
           Session::put(['adminSession'=>$data['username'],'admin_id'=>$admin_id]);
          return redirect(route('AdminDashboard'));
         }else{
           // redirect the user to login page and dis[lay error message
           return redirect(route('AdminLog'))->with('error_message','Invalid username or password') ;
         }
        /* //check if the user creditional is correct 
         if(Auth::attempt(['email' =>$data['email'], 'password' => $data['password'], 'status' =>'1'])){
           // Session::put('adminSession',$data['email']);
            return redirect(route('AdminDashboard'));
         }
         else{ // redirect the user to login page and dis[lay error message
            return redirect(route('AdminLog'))->with('error_message','Invalid username or password') ;
 
         }*/
     }    

      return view('Admin.Log.AdminLogin_view');
    }

    public function logout(){
   // clear the session and redirect the user to the login page with success message
      Session::forget('adminSession');
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

    public function settings(Request $request){
   
          // get the admin id using the session 
          $admin_id=$request->session()->get('admin_id');
          // convert the admin id into string 
          /*Note: When using the implode method on collections that contain arrays or objects,
           two arguments are required: 
          the $value that should be combined and the $glue that should combine each valu */
          $admin_id= $admin_id->implode('id', ', ');
    
        if($request->isMethod('post')){
            $data = $request->all();
            $adminCount = Admin::where(['id'=> $admin_id[0],'password'=>md5($data['current_pwd'])])->count();
            
            if($adminCount == 1){
              Admin::where(['id'=>$admin_id,'password'=>md5($data['current_pwd'])])->update(['password'=>md5($data['new_pwd'])]);
              return redirect()->back()->with('msg','Password Has been Updated Successfully');
            }else{
              return redirect()->back()->with('msg_err','Current Password Is Incorrect');
            }

           
        }
        return view('Admin.Dashboard.Settings_view');
    }


       /* this function used to check that the current pwd admin entered is the same pwd stored on admins table   
      the result of this function will be passed to ajax on main.js */
      public function checkPassword(Request $request){
        // get the current password user entered 
          $pwd = $request->input('current_pwd');
        // get the admin id using the session 
        $admin_id=$request->session()->get('admin_id');
        $admin_id= $admin_id->implode('id', ', ');
        $adminCount = Admin::where(['id'=>$admin_id,'password'=>md5($pwd)])->count();
        
        if($request->isMethod('post')){ 
            if($adminCount == 1){
              echo 'true';   
            }else{
              echo 'false';    
          }

      }
    }


  

}
