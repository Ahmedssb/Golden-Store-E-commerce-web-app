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
              $Products[] = $cat->products;
             }
         }
         $Products  = collect($Products);
         //The collapse method collapses a collection of arrays into a single, flat collection
         $Products = $Products->collapse();
       
         $Products = $Products->paginate(9);
         
       // get category and sub category to diplay them on the left panel 
       $categories = Category::where('parent_id',0)->where('status',1) ->get();
       $sub_cat = Category::where('parent_id', '!=', 0)->get();
      
       $arr['products']=   $Products;

    
       $arr['categories']= $categories;
       $arr['sub_cat'] = $sub_cat;
       
        return view('User.Main.Index_view',$arr);
    }


    public function productSearch(Request $request){
        
        if($request->isMethod('post')){
          $search_query = $request->input('query');
         
        /*to dispaly only the products that their categories status is enabled(1)
          first get the enabled categories */
        $products_cats = Category::where('status',1)->get();
        // create an array of products 
        $Products = array();
          /* for each category assign it's product to products array using the serch query*/
        foreach ( $products_cats as  $cat) {
               // avoid categories without products
               if( $cat->products->first()!= null){
                /* get the products using the search query  
                $cat->id is very critical here if it is not exist then the query will repate the searched product severaal times depend on num of categories  the product 
                */
                $Products[] =Product::where([['name','like','%'.$search_query.'%'],['status','=',1],['category_id','=',$cat->id]])->orWhere([['code','like','%'.$search_query.'%'],['status','=',1],['category_id','=',$cat->id]])->get();
               }
          }

          $Products  = collect($Products);
          //The collapse method collapses a collection of arrays into a single, flat collection
          $Products = $Products->collapse();
          $Products = $Products->paginate(9);

              // get category and sub category to diplay them on the left panel 
          $categories = Category::where('parent_id',0)->where('status',1) ->get();
          $sub_cat = Category::where('parent_id', '!=', 0)->get();
           $arr['products']=   $Products;
          $arr['categories']= $categories;
          $arr['sub_cat'] = $sub_cat;
       
        return view('User.Main.Index_view',$arr);
         }
    }
}
