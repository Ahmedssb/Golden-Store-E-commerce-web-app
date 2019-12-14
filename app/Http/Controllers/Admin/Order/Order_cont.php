<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Orders;
use App\Model\OrdersProducts;
use App\Model\productImages;
use App\User;
class Order_cont extends Controller
{
   public function viewOrders(){

    $orders = Orders::all();
  
    $arr['orders'] = $orders;
    return view('Admin.Orders.Orders_view',$arr);
   }

   public function ordersDetails($order_id){
        // get the order 
        $order = Orders::find($order_id);

       // get billing info using user id from the retrived order 
       $billing = User::find($order->user_id);
       
      // get all products of the order 
      $orders_details = OrdersProducts::where(['order_id'=>$order_id])->get();
     
      // get the image for every item and assign it to the array with image as key
             foreach($orders_details as $key=>$detail){
              $product_image = productImages::where(['product_id'=>$detail->product_id])->first();
             //echo  $product_image;
              $orders_details[$key]->image = $product_image->image;  
            }
         
           //echo "<pre>"; print_r($orders_details);
          $arr['order'] = $order;
          $arr['billing'] = $billing;
          $arr['orders_details'] = $orders_details;

          return view('Admin.Orders.OrderProducts_view',$arr);
   }

   public function orderUpdateStatus(Request $request){

       if($request->isMethod('post')){
          $data = $request->all();
          // get the order to update 
          $order = Orders::find($data['order_id']);
          // update the order status 
          $order->update(['order_Status'=>$data['order_Status']]);
         
          return redirect()->back()->with('msg','Produc Status Has Benn Updated Successfully');
       }
   }
}
