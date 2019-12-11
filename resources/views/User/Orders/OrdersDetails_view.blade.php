@extends('Layouts.User.User_app')


@section('content')
	@if(Session::has('msg_err'))
		<div class="alert alert-danger" role="alert" style="margin-top:10px;">
			<button type="button" class="close" data-dismiss="alert">x</button>
			<h4> <i class="fa fa-ban"></i>Failed!</h4>
				{{Session::get('msg_err')}}
			</div>
	@endif
 
    <section id="form"><!--form-->
		<div class="container" >
				<div class="breadcrumbs">
						<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
                        <li><a href="{{route('Orders')}}">Orders</a></li>

						<li  class="active">Orders Details</li>
						</ol>
				</div>

            <div class="row" style="text-align:center;" >
				  
		     	<table id="order_table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                           <th>Product Image</th>
                                            <th>Product code</th>
                                            <th>Product Name</th>
                                            <th>Product Size</th>
                                            <th>Product Color</th>
                                            <th>Product Price</th>
                                            <th>Product Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  @foreach($orders_details as $product)
                                      <tr>
                                            <td>
                                                 @if(!empty($product->image))
                                                <img src="{{'/images/products/Small/'.$product->image}}"   style="width:70px;">
                                                @endif
                                           </td>
                                            <td>{{$product->product_code}}</td>
                                            <td> {{$product->product_name}} </td>
                                            <td>{{$product->product_size}}</td>
                                            <td>{{$product->product_color}}</td>
                                            <td>{{$product->price}}</td>
                                            <td> {{$product->qty}}</td>
											  
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
 