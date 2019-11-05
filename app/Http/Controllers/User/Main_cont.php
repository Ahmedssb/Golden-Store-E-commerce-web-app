<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use  App\Category;

class Main_cont extends Controller
{
    public function index(){
         /*to dispaly only the products that their categories status is enabled(1)
          first get the enabled categories */
        $products_cats = Category::where('status',1)->get();
          // create an array of products 
          $Products = array();
          /* for each category assign it's product to products array using the has many 
          relation (products) from category model*/
        foreach ( $products_cats as  $cat) {
                // avoid categories without products
             if( $cat->products->first()!= null){
              $Products[] = $cat->products->first();
             }
         }
      
       // get category and sub category to diplay them on the left panel 
       $categories = Category::where('parent_id',0)->where('status',1) ->get();
       $sub_cat = Category::where('parent_id', '!=', 0)->get();
      
       $arr['products']=   $Products;
       $arr['categories']= $categories;
       $arr['sub_cat'] = $sub_cat;
       
        return view('User.Main.Index_view',$arr);
    }
}
