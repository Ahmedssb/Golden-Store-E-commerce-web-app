          
@extends('Layouts.User.User_app')

@section('content')


<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			@if(Session::has('msg'))
			<div class="alert alert-success" role="alert" style="margin-top:10px;">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<h4> <i class="fa fa-check"></i>Success!</h4>
							
						{{Session::get('msg')}}
			</div>
            @endif
			
			@if(Session::has('msg_err'))
					<div class="alert alert-danger" role="alert" style="margin-top:10px;">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<h4> <i class="fa fa-ban"></i>Failed!</h4>
							{{Session::get('msg_err')}}
				     </div>
			@endif
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					   <?php $total= 0;?>
					   @foreach($cart_items as $item)
						<tr>
							<td class="cart_product">
								<a href=""><img style="width:100px;height:100px"src="{{'/images/products/Small/'.$item->image}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$item->product_name}}</a></h4>
								<p> {{$item->product_code}}| {{$item->size}}</p>
								<p></p>

							</td>
							<td class="cart_price">
								<p>${{ $item->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="{{route('Cart.Update',['id'=>$item->id,'quantity'=>1])}}"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$item->quantity}}" autocomplete="off" size="2">
									@if($item->quantity >1)
									<a class="cart_quantity_down" href="{{route('Cart.Update',['id'=>$item->id,'quantity'=>-1])}}"> - </a>
								    @endif
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">${{ $item->price*$item->quantity}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{route('Cart.Delete',['id'=>$item->id])}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php $total= $total+($item->price*$item->quantity);?>
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			 
			<div class="row">
			 
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							 
							<li>Total <span>${{$total}}</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="{{route('Checkout')}}">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection