@extends('Layouts.User.User_app')


@section('content')
	@if(Session::has('msg_err'))
		<div class="alert alert-danger" role="alert" style="margin-top:10px;">
			<button type="button" class="close" data-dismiss="alert">x</button>
			<h4> <i class="fa fa-ban"></i>Failed!</h4>
				{{Session::get('msg_err')}}
			</div>
	@endif
 
    <section id="cart_items"><!--form-->
		<div class="container" >
				<div class="breadcrumbs">
						<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li  class="active">Orders</li>
						</ol>
				</div>

            <div class="row" style="text-align:center;" >
             
              
            <table id="order_table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Order Id</th>
                                            <th>Ordered Products</th>
                                            <th>Payment Method</th>
                                            <th>Grand Total</th>
                                            <th>Created On</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  @foreach($orders as $order)
                                      <tr>
                                            <td>{{$order->id}}</td>
                                            <td> 
                                             @foreach($order->ordersProducts as $pro) 
                                             <a>{{$pro->product_code}}</a> <br>  
                                             @endforeach
                                            </td>
                                            <td>{{$order->payment_method}}</td>
                                            <td>{{$order->grand_total}}</td>
                                            <td>{{$order->created_at}}</td>
                                            <td> 
                                            <a class="btn btn-info" href="{{route('Orders.Details',['order_id'=>$order->id])}}" id="order_detail">View Details</a>
                                             </td>
                                        </tr>
                                 @endforeach        
                                       
                                    
  
                                    </tbody>
                                </table>
 			</div>

     </div>
	</section><!--/form-->

    <script>
    
    $(document).ready(function() {
    $('#order_table').DataTable();
       } );
    
    </script>
 
    @endsection
 