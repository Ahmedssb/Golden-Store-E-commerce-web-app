<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Category;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class User_cont extends Controller
{   

   public function login(Request $request){
      if($request->isMethod('post')){
      $data = $request->all();
      if (Auth::attempt(['email' =>$data['email'], 'password' => $data['password']])) {
        return redirect()->route('Cart.Index');
      }else{
       return redirect()->back()->with('msg_err','Email or Password is incorrect');
     }

    }
    return view ('User.Main.User_Login_Register_view');
  
    }
    public function register(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
            //check if hte user is already exist
            $userCount = User::where(['email'=>$data['email'],'admin'=>1])->count();
            if($userCount>0){
              return redirect()->back()->with('msg_err','This user is alreay exist');
            }else{
              //create a new user account
              $user = new User();
              $user->name = $data['name'];
              $user->email = $data['email'];
              $user->password = Hash::make($data['password']);
              $user->save();
              //i f the user successfully added on the database redirect to te cart view 
              if (Auth::attempt(['email' =>$data['email'], 'password' => $data['password']])) {
                return redirect()->route('Cart.Index');
             }

            }

        }
         
        return view ('User.Main.User_Login_Register_view');
       }

       public function checkEmail(Request $request){
           $data = $request->all();
            //check if hte user is already exist
            $userCount = User::where(['email'=>$data['email'],'admin'=>1])->count();
            if($userCount>0){
                echo 'false';
             }else{
             echo 'true'; 
            }
       }

       public function logout(){
         //clear the authentication information in the user's session
        Auth::logout();
        return redirect()->route('UserIndex');
       }
}
