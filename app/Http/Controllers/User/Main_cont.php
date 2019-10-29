<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;


class Main_cont extends Controller
{
    public function index(){
       $products = Product::all();
       $arr['products']=  $products;

        return view('User.Main.Index_view',$arr);
    }
}
