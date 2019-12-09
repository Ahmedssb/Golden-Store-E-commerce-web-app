<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Model\Country;
use App\Model\DeliveryAddresses;
use Illuminate\Support\Facades\Session;
use  App\Model\Cart;
use  App\Model\orders;
use App\Model\Product;
use App\Model\OrdersProducts;
use Illuminate\Support\Facades\DB;

class Checkout_cont extends Controller
{
    public function checkout(Request $request){

         // get the current user 
         $user =Auth::user();
        $countries = Country::all();

        //check if the delivery ship address is exists 
        $delivery_address = DeliveryAddresses::where('user_id',$user->id)->count();
        $shipping_details =array();
        if(  $delivery_address>0){
        $shipping_details =  DeliveryAddresses::where('user_id',$user->id)->first();

         }else{
             // if there is no ship address exist then assign empty for all array 
            $shipping_details =array(
                "address" => "",
                "city" => "",
                "state" => "",
                "country" => "",
                "pincode" => "",
                "phone" => "",
            );
         }
     
         $arr['shipping_details']=$shipping_details;
         $arr['countries'] = $countries;
         $arr['user'] = $user;


          //update cart tablee with user email
          $session_id = Session::get('session_id');
          $cart_item = Cart::where(['session_id'=>$session_id]);
          $cart_item->update(['user_email'=>$user->email]);

         
          if($request->isMethod('post')){
             $data =$request->all();
               //return to checkout page if any of the field is empty
             foreach($data as $key => $val){
                if(empty($val)){
                 return redirect()->back()->with('msg_err','fill all the required fields');
                }
             }
            
           //update user 
           $user->update(['name'=>$data['b-name'],'address'=>$data['b-address'],'city'=>$data['b-city'],'state'=>$data['b-state'],'country'=>$data['b-country'],'pincode'=>$data['b-pincode'],'phone'=>$data['b-phone']]);
          
           if($delivery_address > 0){
               // update the existin ship address
               DeliveryAddresses::where('user_id',$user->id)->update([ 'address'=>$data['s-address'],'city'=>$data['s-city'],'state'=>$data['s-state'],'country'=>$data['s-country'],'pincode'=>$data['s-pincode'],'phone'=>$data['s-phone']]);
           }else{
             // create new ship address
             $new_delivery_add = new   DeliveryAddresses();
             $new_delivery_add->user_id = $user->id;
             $new_delivery_add->user_email = $user->email;
             $new_delivery_add->name = $data['s-name'];
             $new_delivery_add->address = $data['s-address'];
             $new_delivery_add->city = $data['s-city'];
             $new_delivery_add->state = $data['s-state'];
             $new_delivery_add->country = $data['s-country'];
             $new_delivery_add->pincode = $data['s-pincode'];
             $new_delivery_add->phone = $data['s-phone'];

             $new_delivery_add->save();

           }
           
           return redirect()->route('Order.Review');
         }

        return view('User.Checkout.Checkout_view',$arr);
    }



  public function orderReview(){
     // get the current user 
     $user =Auth::user();
     $countries = Country::all();
     $shipping_details =  DeliveryAddresses::where('user_id',$user->id)->first();

      // get the cart items belong to the current user
     $cart_items = Cart::where(['user_email'=>$user->email])->get();
       // get the image for every item and assign it to the array with image as key
      foreach($cart_items as $key=>$product){
        $productDetails = Product::find($product->product_id);
        $cart_items[$key]->image =$productDetails->image;  
     }
     
      $arr['cart_items'] = $cart_items;

    $arr['shipping_details']=$shipping_details;
    $arr['countries'] = $countries;
    $arr['user'] = $user;
 
    return view('User.Checkout.OrderReview_view',$arr);
  }


 public function placeOrder(Request $request){
   $data = $request->all();
   $user =Auth::user();

   //get the shipping address details from delivery address table 
   $shipping_details = DeliveryAddresses::where('user_email',$user->email)->first();

   // create new order 

   $order = new orders();

   $order->user_id = $user->id;
   $order->user_email = $user->email;
   $order->name =  $shipping_details->name;
   $order->city = $shipping_details->city;
   $order->state = $shipping_details->state;
   $order->country = $shipping_details->country;
   $order->picode = $shipping_details->pincode;
   $order->phone = $shipping_details->phone;
   $order->address = $shipping_details->address;
   $order->shiping_charges ='none';
   $order->coupon_code = 'none';
   $order->coupon_amoutn = 0.00;
   $order->order_Status = 'new';
   $order->payment_method = $data['payment_method'];
   $order->grand_total = $data['grand_total'];

    $order->save();
    // get the last inserted id 
    $order_id = DB::getPdo()->lastInsertId();

     // get products from the cart 
     $cart_products = Cart::where(['user_email'=>$user->email])->get();
     
     
      //create order products & assign order id & user id fore every order product
      foreach($cart_products as $product){
         //create new order-product
         $order_product = new OrdersProducts();

         $order_product->order_id = $order_id;
         $order_product->user_id = $user->id;
         $order_product->product_id =  $product->product_id;
         $order_product->product_code = $product->product_code;
         $order_product->product_name = $product->product_name;
         $order_product->product_size = $product->size;
         $order_product->product_color = $product->product_color;
         $order_product->price = $product->price;
         $order_product->qty = $product->quantity;
         
         $order_product->save();
      }

     return view('User.Checkout.PlaceOrder_view');
 }

}
