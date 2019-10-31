<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use  App\Category;

class Main_cont extends Controller
{
    public function index(){
       $products = Product::all();
       $categories = Category::where(['parent_id'=>0])->get();
       $sub_cat = Category::where('parent_id', '!=', 0)->get();
       
       $arr['products']=  $products;
       $arr['categories']= $categories;
       $arr['sub_cat'] = $sub_cat;
       
        return view('User.Main.Index_view',$arr);
    }
}
