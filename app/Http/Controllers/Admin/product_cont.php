<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Model\Product;
use Image;
use App\Model\ProductAttributes;
use App\model\productImages;
use Illuminate\Support\Facades\Schema;
 
class product_cont extends Controller
{
    public function add(Request $request){

        if($request->isMethod('post')){
          $data = $request->all();
          if(empty($data['category_id'])){
            return redirect()->back()->with('msg_err','under category is required !!');
          }
          
          $product = new Product;
          $product->category_id = $data['category_id'];
          $product->name = $data['product_name'];
          $product->color = $data['product_color'];
          $product->code = $data['product_code'];
          
          //handle the status value
          if(empty($data['status'])){
           
            $product->status = 0;
           }else{
            $product->status = 1;
             
           }

          $product->status = $data['status'];
          if(!empty($data['product_des'])){
            $product->description = $data['product_des'];
          }else{
            $product->description = ""; 
          }

          if(!empty($data['product_care'])){
            $product->care = $data['product_care'];
          }else{
            $product->care = ""; 
          }

          // image upload 
          if($request->hasFile('product_image')){
            $temp_image = $request->file('product_image');
            //$temp_image = Input::file('product_image');
            //dd($temp_image);
              //verify that there were no problems uploading the file via the isValid method
               if($temp_image->isValid()){
                 // Retrieving The Extension Of An Uploaded File 
                 $extention = $temp_image->getClientOriginalExtension();
                 $file_name = rand(111,99999).'.'.$extention;
                 //define the pathes
                 $large_image_path = public_path('/images/products/Larage/'.$file_name);
                 $medium_image_path = public_path('images/products/Medium/'.$file_name);
                 $small_image_path = public_path('images/products/Small/'.$file_name);
                 
                 //resize the image 
                 Image::make($temp_image->getRealPath())->save($large_image_path);
            
                 Image::make($temp_image->getRealPath())->resize(600,600)->save($medium_image_path);

                 Image::make($temp_image->getRealPath())->resize(300,300)->save($small_image_path);
                 //store image on the products table
                 $product->image =$file_name;

               }

          }

          $product->price = $data['product_price'];
        

          $product->save();
          
          return redirect()->back()->with('msg','Product Added Successfully');
        }
       
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option selected disabled>Select</option>";
        //get all main categories and fetch for sub 
        foreach ($categories as $cat){
            $categories_dropdown.= "<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
               //append subcategories to the dropdown
            foreach($sub_categories as $sub_cat){
                $categories_dropdown.= "<option value='".$sub_cat->id."'>".$sub_cat->name."</option>";

            }
        }
            
       return view('Admin.Product.AddProduct_view')->with(compact('categories_dropdown'));
     }

     public function index(){
        // retrive all Products and return it with the index view 
        $products=Product::all();

        $products = json_decode(json_encode($products));
         
        foreach($products as $key => $val){
         $category_name= Category::where(['id'=>$val->category_id])->first();
         $products[$key]->category_name = $category_name->name;
          
        }
         
        $arr['products']=$products;
       return view ('Admin.Product.Index_view',$arr);
     }


     public function update(Request $request , $id){

      $product=Product::find($id);
       if($request->isMethod('post')){
         $data= $request->all();
      

        // if the user add a new   image then delte the old one and then and the new  
        if($request->hasFile('product_image')){

              try{
                unlink(public_path('/images/products/Small/'.$product->image));
                unlink(public_path('/images/products/Medium/'.$product->image));
                unlink(public_path('/images/products/Large/'.$product->image));
                $product->delete();
                      
              }catch(\Exception $exception){

              }
          $temp_image = $request->file('product_image');
         
          //$temp_image = Input::file('product_image');
          //dd($temp_image);
            //verify that there were no problems uploading the file via the isValid method
             if($temp_image->isValid()){
               // Retrieving The Extension Of An Uploaded File 
               $extention = $temp_image->getClientOriginalExtension();
               $file_name = rand(111,99999).'.'.$extention;
               //define the pathes
              

               $large_image_path = public_path('/images/products/Larage/'.$file_name);
               $medium_image_path = public_path('images/products/Medium/'.$file_name);
               $small_image_path = public_path('images/products/Small/'.$file_name);
               //resize the image 
             

               Image::make($temp_image->getRealPath())->save($large_image_path);
               
               Image::make($temp_image->getRealPath())->resize(600,600)->save($medium_image_path);

               Image::make($temp_image->getRealPath())->resize(300,300)->save($small_image_path);
           
               
             }

        }else{
           
            // if the user doesn't update the image then keep the old one 
           $file_name=$data['current_image'];
        }



        //handle the status value
        if(empty($data['status'])){
           
          $product->status = 0;
         }else{
          $product->status = 1;
           
         }
         
         // only description and care can be empty other fields must be validated using js 
         $des = $data['product_des'];
         $care = $data['product_care'];
         if(empty( $des)){
          $des = " ";
         }

         if(empty( $care)){
          $care = " ";
         }
          $product->update(['category_id'=>$data['category_id'],'name'=>$data['product_name'],'code'=>$data['product_code'],'color'=>$data['product_color']
         ,'description'=>$des,'price'=>$data['product_price'],'image'=>$file_name ,'care'=>$care ]);
         
          return redirect()->back()->with('msg','Product Updated Successfully');
     }
	 
	 
      $categories = Category::all() ;
        $arr{'categories'}=$categories;
        $arr['product']=$product;
        return view('Admin.Product.UpdateProduct_view',$arr);

     }


     public function delete($id){
       $product = Product::find($id);
       
       try{
         // first delete product iamges from the folders 
        unlink(public_path('/images/products/Small/'.$product->image));
        unlink(public_path('/images/products/Medium/'.$product->image));
        unlink(public_path('/images/products/Larage/'.$product->image));
        // then delete the product from the database
        $product->delete();
        
        }catch(\Exception $exception){

        }
       return redirect()->back()->with('msg','Product Deleted Successfully');

     }


     public function addAttributes(Request $request ,$id){
      $product = Product::find($id);
      $p = Product::all();
      $att   = $product->attributes()->get();
       
       
       if($request->isMethod('post')){
       
        
         $data =$request->all();
         foreach($data['sku'] as $key => $val){ 
             if(!empty($val)){
                // check for SKU if it is already exists
                $attSkuCount = ProductAttributes::where('sku',$val)->count();
                // prevent duplicate SKU
                if($attSkuCount>0){
                  return redirect()->back()->with('msg_err','Sku cant be duplicated');

                }

                // check for size if it is already exists
                $sizeCount = ProductAttributes::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                // prevent duplicate size
                if( $sizeCount>0){
                  return redirect()->back()->with('msg_err','Size cant be duplicated');

                }

                $attribute = new ProductAttributes;
                $attribute->sku=$val;
                $attribute->size=$data['size'][$key];
                $attribute->price=$data['price'][$key];
                $attribute->stock=$data['stock'][$key];
                $attribute->product_id=$id;
                $attribute->save();
             }
         }
         return redirect()->back()->with('msg','Attriubites Added Successfully');
       }
      $arr['product']= $product;
      $arr['attributes'] = $att;
      return view('Admin.Product.Attributes.AddAttributes_view',$arr);
     }



     public function addProductImages(Request $request ,$id){
      $product = Product::find($id);
      $p = Product::all();
      $att   = $product->attributes()->get();
       $data = $request->all();
       
       if($request->isMethod('post')){
         
           // image upload 
           if($request->hasFile('product_images')){
             
                $temp_images = $request->file('product_images');
                
                 foreach($temp_images as $temp_image){
                       $images = new productImages;
                      // Retrieving The Extension Of An Uploaded File 
                      $extention = $temp_image->getClientOriginalExtension();
                      $file_name = rand(111,99999).'.'.$extention;
                      //define the pathes
                      $large_image_path = public_path('/images/products/Larage/'.$file_name);
                      $medium_image_path = public_path('images/products/Medium/'.$file_name);
                      $small_image_path = public_path('images/products/Small/'.$file_name);
                      
                      //resize the image 
                      Image::make($temp_image->getRealPath())->save($large_image_path);
                  
                      Image::make($temp_image->getRealPath())->resize(600,600)->save($medium_image_path);

                      Image::make($temp_image->getRealPath())->resize(300,300)->save($small_image_path);
                      //store images on the productsImages table
                      $images->image =$file_name;
                      $images->product_id = $id;
                      $images->save();
                 }
          }
        
         return redirect()->back()->with('msg','Product Images Added Successfully');
       }   // end if post mehtod

      $productImages = productImages::where(['product_id'=>$id])->get();
      
      $arr['product']= $product;
      $arr['attributes'] = $att;
      $arr['productImages'] = $productImages;
      return view('Admin.Product.AddProductImages_view',$arr);
     }

    public function deleteProductImage($id){
      $productImage = productImages::find($id);
      
      try{
        // delete image from the folder
        unlink(public_path('/images/products/Small/'.$productImage->image));
        unlink(public_path('/images/products/Medium/'.$productImage->image));
        unlink(public_path('/images/products/Larage/'.$productImage->image));
        //delete image from database
        $productImage->delete();
              
      }catch(\Exception $exception){
        dd($exception);
      }

      return redirect()->back()->with('msg','Product Image Deleted Successfully');


    }

    public function  updateAttributes(Request $request){
    
      if($request->isMethod('post')){
       
        $data = $request->all();
    
        //get the attribute 
        $att = ProductAttributes::find($data['attId']);
        
        $att->update(['price'=>$data['attPrice'],'stock'=>$data['attStock']]);

      }
      return redirect()->back()->with('msg','Product Attribute Updated Successfully');
       
    }

    public function deleteAttributes($id){
     
      
       $attribute = ProductAttributes::find($id);

       $attribute->delete();

       return redirect()->back()->with('msg','Attribute deleted successsfully');

    }



}
