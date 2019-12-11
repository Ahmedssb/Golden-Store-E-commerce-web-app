<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use  App\Model\Cart;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Session;
use App\Model\Product;
use App\Model\ProductAttributes;

 class Cart_cont extends Controller
{
    public function index(){
       // $session_id = Session::get('session_id');
       // get the current user 
         $user = Auth::user();

         //check if  user logged in or not 
         if(Auth::check()){
        // get the cart items using user email
        $cart_items = Cart::where(['user_email'=>$user->email])->get();
         }else{
              // get the cart items using the current session
              $session_id = Session::get('session_id');
              $cart_items = Cart::where(['session_id'=>$session_id])->get();
         }
       
          // get the image for every item and assign it to the array with image as key
         foreach($cart_items as $key=>$product){
           $productDetails = Product::find($product->product_id);
           $cart_items[$key]->image =$productDetails->image;  
        }
         //echo "<pre>"; print_r($cart_items);
          
         $arr['cart_items'] = $cart_items;
         return view('User.Cart.Cart_view',$arr);
    }
    public function addToCart(Request $request){

        if($request->isMethod('post')){
          $data = $request->all();
         // dd($data);
           $cart = new Cart();
          $cart->product_id = $data['product-id'];
          $cart->product_name = $data['product-name'];
          $cart->product_color = $data['product-color'];
          $cart->price = $data['product-price'];
          $cart->quantity = $data['quantity'];
           if(empty($data['size'])){
            $cart->size = "";
          }else{
            $size= explode('-',$data['size']);
            $cart->size = $size['1'];
          }
          // if user is logged in then assign email to the cart else assign empty 
          if(empty(Auth::user()->email)){
            $cart->user_email = "";
          }else{
            $cart->user_email = Auth::user()->email;
          }
          // if session already set 
          $session_id = Session::get('session_id');
          // if session not set
           if(empty($session_id)){
             // generate a random string of 40 chars
            $session_id = Str::random(40);
            Session::put('session_id',$session_id);
           }
            $cart->session_id =  $session_id ;

             //check if the item already on the cart 
             $cartItemCount = Cart::where(['product_id'=>$data['product-id'],'product_color'=>$data['product-color'],'size'=>$size['1'],'session_id'=>$session_id])->count();
             if($cartItemCount>0){
              return redirect()->back()->with('msg_err','This item is already addede on the cart');
             }else{

              $itemSku = ProductAttributes::where(['product_id'=>$data['product-id'],'size'=>$size['1']])->first();
              $cart->product_code = $itemSku->sku ;// product code for the cart is sku 
              if($itemSku->stock >= $data['quantity']){
              $cart->save();
               }else{
                 
               return redirect()->back()->with('msg_err','the required quantity is not available ');
               }         
         }
        }
         // redirect the user to the cart view 
         return redirect()->route('Cart.Index')->with('msg','Product has been adeded to the cart successfylly');

      }


    public function deleteCartItem($id){
      $cartItem = Cart::find($id);

      $cartItem->delete();
      return redirect()->back()->with('msg','Item has been deleted successfully');
    }

    public function UpdateCartItem($id,$quantity){
       /* befor updating the quantity first check the stock  
       by comparing quantity user entered to the cart and the stock availabele from att table*/
        $item = Cart::where('id',$id)->first();
        $attStock = ProductAttributes::where('sku',  $item->product_code)->first();
    
        $updatedQuantity = $item->quantity+$quantity;
        /* if the available stock is greater than or equal to the quantity user entered
         then update other wise send an error message*/
        if( $attStock->stock >= $updatedQuantity){
          Cart::where('id',$id)->increment('quantity',$quantity);
          return redirect()->back()->with('msg','Quantity has been updated');
        }else{
          return redirect()->back()->with('msg_err','the required quantity is not available ');
        }
        
      
    }
}
