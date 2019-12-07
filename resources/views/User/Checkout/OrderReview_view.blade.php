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
		<div class="container"  style="margin-top=20px;">
        <div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
                   <li  class="active">Order Review</li>
				</ol>
			</div>
			<div class="row"    >
		     
				<div class="col-sm-4 col-sm-offset-1" style="margin-top='0px !important;'">
					<div class="login-form" ><!--Billing-->
						<h2>Bill To</h2>
							<div class="form-group"> 
							   {{$user->name}}
							 </div>
							 
							 <div class="form-group">
						       {{$user->address}} 
							 </div>
							 
							 <div class="form-group">
							   {{$user->city}} 
							 </div>
							 
							 <div class="form-group">
							     {{$user->state}} 
							 </div>

							 <div class="form-group">
								 
								 {{$user->country }}
							 
							  </div>
							  
							 <div class="form-group">
						       {{$user->pincode}} 
							 </div>
							 
							 <div class="form-group">
								 {{$user->phone}} 
                             </div>
							 
							  
 					 
					</div><!--/Billing-->
				</div>
				<div class="col-sm-1">
					<h2 ></h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--Shipping-->
						<h2>Ship To</h2>
							 
							 <div class="form-group">
							    {{$shipping_details->address}} 
							 </div>
							 
							 <div class="form-group">
							      {{$shipping_details->city}} 
							 </div>
							 
							 <div class="form-group">
							      {{$shipping_details->state}} 
							 </div>
							 
							 <div class="form-group">
								 
								 {{$shipping_details->country}}
									 
							  </div>
							 
							 <div class="form-group">
						        {{$shipping_details->pincode}} 
							 </div>
							 
							 <div class="form-group">
								{{$shipping_details->phone}} 
							 </div>
							 
 					</div><!--/Shipping-->
				</div>
		     
			</div>
		</div>
	</section><!--/form-->

 <section id="cart_items">
    <div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

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
							</td>
							<td class="cart_price">
								<p>${{ $item->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">${{ $item->price*$item->quantity}}</p>
							</td>
							 
                        </tr>
                        <?php $total= $total+($item->price*$item->quantity);?>

                @endforeach
                <tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>${{$total}}</td>
									</tr>
									<tr>
										<td>Disccount Amount</td>
										<td>$0</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>${{$total}}</span></td>
									</tr>
								</table>
							</td>
						</tr> 
 
					 
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
  </section>
    @endsection