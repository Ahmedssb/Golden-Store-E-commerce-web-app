<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class User_cont extends Controller
{
   public function getRegisteredUsers(){

      $users = User::all();
      $arr['users'] = $users;
      return view('Admin.Users.Users_view',$arr);
   }
}
