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
       $products = $products->paginate(9);      
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
      //show 404 page if product is disabled
      $productCount = Product::where(['id'=>$id,'status'=>1])->count();
     if($productCount == 0){
        return view('User.404');
      } 
      
      // get the product 
      $productDeatails = Product::find($id);
      // get all product attributes using the attributes relation
      $productAttributes = $productDeatails->attributes;
      // get all product images using images relation
      $productImages  = $productDeatails->images;
       
      // get similar product 
      $recomandedProduct = Product::where('id','!=',$id)->where('category_id',$productDeatails->category_id)->get();
      
      // get category and sub category to diplay them on the left panel 
      $categories = Category::where('parent_id',0)->where('status',1) ->get();
      $sub_cat = Category::where('parent_id', '!=', 0)->get();
      
      // get the total stock for the product
      $total_stock = $productAttributes->where('product_id',$id)->sum('stock');
      //dd($total_stock);
     
      $arr['productDeatails']=   $productDeatails;
      $arr['attributes'] = $productAttributes;
      $arr['productImages'] = $productImages;
      $arr['categories']= $categories;
      $arr['sub_cat'] = $sub_cat;
      $arr['total_stock'] = $total_stock;
      $arr['recomandedProduct'] = $recomandedProduct;
      return view('User.Product.Productdeatils_view',$arr);

    }

    /* get price of product based on the size  
     use this fun in main js for ajax request to 
     update the price part of the product detail page 
     based on the size selected from the drop down list*/
  public function getPrice(Request $request){
     $data = $request->all();
      $productAtt = explode('-',$data['idSize']);
    // echo $productAtt[0]; echo $productAtt[1]; die;
    // get the product attribute 
    
     $productAtt = ProductAttributes::where(['id'=> $productAtt[0] ,'size'=> $productAtt[1]])->first();

      echo $productAtt->price;
      echo "#";
      echo $productAtt->stock;
  }

  

}
