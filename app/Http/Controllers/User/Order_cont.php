<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use  App\Model\orders;
use App\Model\OrdersProducts;
use App\Model\productImages;
class Order_cont extends Controller
{
    public function userOrders(){
        $user =Auth::user();
          // get all user  orders products using ordersProducts relation
        $orders = orders::with('ordersProducts')->where(['user_id'=>$user->id])->orderBy('id','desc')->get();
        $arr['orders'] = $orders;
        /*   
        $order =json_decode(json_encode($orders));
         echo "<pre>" ;print_r($order); die();
        */
        return view('User.Orders.Orders_view',$arr);
      
       }


       public function userOrdersDetails($order_id){
        $user =Auth::user();
         // get all products of the order 
        $orders_details = OrdersProducts::where(['order_id'=>$order_id,'user_id'=>$user->id])->get();
     
 
        
    // get the image for every item and assign it to the array with image as key
           foreach($orders_details as $key=>$detail){
            $product_image = productImages::where(['product_id'=>$detail->product_id])->first();
           //echo  $product_image;
            $orders_details[$key]->image = $product_image->image;  
          }
       
         //echo "<pre>"; print_r($orders_details);
        $arr['orders_details'] = $orders_details;
        return view('User.Orders.OrdersDetails_view',$arr);


       }
      
}
