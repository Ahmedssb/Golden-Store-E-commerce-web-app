<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Category;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function mainCategories(){
        return Category::where(['parent_id'=>0,'status'=>1])->get();
    }

    public static function showSideBar(){
         /* get all categories and sub to dispaly on the left panel 
     this code could be moved as leftside panel  layout view and extend it for mny views*/
       $categories = Category::where('parent_id',0)->where('status',1) ->get();
       $sub_cat = Category::where('parent_id', '!=', 0)->get();
       $arr['categories']= $categories;
       $arr['sub_cat'] = $sub_cat;

       return $arr;
    }
}
