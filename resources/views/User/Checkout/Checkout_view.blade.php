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
				  <li  class="active" >Check out</li>
				</ol>
			</div>
			<div class="row" >
		    	<form  id="checkoutForm"  method="post" name="checkoutForm" action="{{route('Checkout')}}">
				{{csrf_field()}}  
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form" ><!--Billing-->
						<h2>Bill To</h2>
							<div class="form-group"> 
							   <input type="text" id="b-name"  name="b-name" value="{{$user->name}}" class="form-control" placeholder="Biling Name" />
							 </div>
							 
							 <div class="form-group">
							    <input type="text" id="b-address" name="b-address" value="{{$user->address}}" class="form-control" placeholder=" Biling Address" />
							 </div>
							 
							 <div class="form-group">
							    <input type="text" id="b-city"" name="b-city" value="{{$user->city}}" class="form-control" placeholder="Biling City" />
							 </div>
							 
							 <div class="form-group">
							    <input type="text" id="b-state"" name="b-state" value="{{$user->state}}" class="form-control" placeholder="Biling State" />
							 </div>

							 <div class="form-group">
								<select id="b-country"  name="b-country">
									<option value="">Select Country</option>
									@foreach($countries as $country)
									<option value="{{$country->country_name}}" @if($country->country_name == $user->country) selected @endif>{{$country->country_name}}</option>
									@endforeach
								</select>
							  </div>
							  
							 <div class="form-group">
							    <input type="text" id="b-pincode" name="b-pincode" value="{{$user->pincode}}" class="form-control" placeholder="Biling PinCode" />
							 </div>
							 
							 <div class="form-group">
								<input type="text" id="b-phone" name="b-phone" value="{{$user->phone}}" class="form-control" placeholder="Biling Phone" />
                             </div>
							 
							 <div class="form-check">
								<input type="checkbox" class="form-check-input" id="billToShip">
								<label class="form-check-label" for="billToShip">Shipping Address Same As Billing address</label>
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
							   <input type="text"  value="{{$shipping_details['name']}}" id="s-name" name="s-name" class="form-control" placeholder="Shipping Name" />
							 </div>
							 
							 <div class="form-group">
							    <input type="text" id="s-address" name="s-address" class="form-control"  value="{{$shipping_details['address']}}"  placeholder=" Shipping Address" />
							 </div>
							 
							 <div class="form-group">
							    <input type="text" id="s-city" name="s-city" class="form-control"  value="{{$shipping_details['city']}}"  placeholder="Shipping City" />
							 </div>
							 
							 <div class="form-group">
							    <input type="text" id="s-state" name="s-state" class="form-control"  value="{{$shipping_details['state']}}"  placeholder="Shipping State" />
							 </div>
							 
							 <div class="form-group">
								<select id="s-country"  name="s-country">
									<option value="">Select Country</option>
									@foreach($countries as $country)
									<option value="{{$country->country_name}}"  @if($country->country_name == $shipping_details['country']) selected @endif > {{$country->country_name}}</option>
									@endforeach
								</select>
							  </div>
							 
							 <div class="form-group">
							    <input type="text" id="s-pincode" name="s-pincode" class="form-control"  value="{{$shipping_details['pincode']}}"  placeholder="Shipping PinCode" />
							 </div>
							 
							 <div class="form-group">
								<input type="text" id="s-phone" value="{{$shipping_details['phone']}}"  name="s-phone" class="form-control" placeholder="Shipping Phone" />
							 </div>
							 
							 <button type="submit" style="float:right;" class="btn btn-default check_out">Checkout</button>
					</div><!--/Shipping-->
				</div>
		    	</form>
			</div>
		</div>
	</section><!--/form-->


    @endsection