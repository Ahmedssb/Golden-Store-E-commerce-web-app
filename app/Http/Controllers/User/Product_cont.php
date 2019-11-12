<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Model\Product;
use  App\Model\ProductAttributes;
class Product_cont extends Controller
{
    public function showCategoryProducts($id){
         // show 404 page if category not exist 
         $cat_result =Category::where(['id'=>$id,'status'=>1])->exists();
         if(!$cat_result){
            return view('User.404');
         }

       $category = Category::where(['id'=>$id],['status'=>1])->first();  
       
       // get the name of the category and send it to view to display it as title
       $cat_name = $category->name;
       /*if category is main category then retrive all products for the main category 
       and it's sub category products*/
       // this the case when user click on main category from the header 
       if($category->parent_id == 0 ){
         // first get all sub cat 
         $sub_cat = Category::where(['parent_id'=>$id])->get();
        $cat_id = array();
        $cat_id[0] =$id;
         // get id of the sub cat ;
         foreach($sub_cat as $sub){
          $cat_id[]= $sub->id;
         }
        
         $products  = Product::whereIn('category_id',$cat_id)->get();
        
       }else{
            // get the only product that belong to the category
         $products = $category->products;
        
       }

      
       /* get all categories and sub to dispaly on the left panel 
     this code could be moved as leftside panel  layout view and extend it for mny views*/
       $categories = Category::where('parent_id',0)->where('status',1) ->get();
       $sub_cat = Category::where('parent_id', '!=', 0)->get();
       
       
       $arr['categories']= $categories;
       $arr['sub_cat'] = $sub_cat;
       $arr['products'] = $products;
       $arr['cat_name'] = $cat_name;
       return view('User.Category.CategoryProducts_view',$arr);
    }


    public function productDetails($id){
      $productDeatails = Product::find($id);
      $productAttributes = $productDeatails->attributes;
     
      // get category and sub category to diplay them on the left panel 
      $categories = Category::where('parent_id',0)->where('status',1) ->get();
      $sub_cat = Category::where('parent_id', '!=', 0)->get();

     
      $arr['productDeatails']=   $productDeatails;
      $arr['attributes'] = $productAttributes;
      $arr['categories']= $categories;
      $arr['sub_cat'] = $sub_cat;

      return view('User.Product.Productdeatils_view',$arr);

    }

  public function getPrice(Request $request){
     $data = $request->all();
      $productAtt = explode('-',$data['idSize']);
    // echo $productAtt[0]; echo $productAtt[1]; die;
     $productAtt = ProductAttributes::where(['id'=> $productAtt[0] ,'size'=> $productAtt[1]])->first();

    echo $productAtt->price;


  }

}
