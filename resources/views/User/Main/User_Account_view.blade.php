@extends('Layouts.User.User_app')


@section('content')
	@if(Session::has('msg_err'))
		<div class="alert alert-danger" role="alert" style="margin-top:10px;">
			<button type="button" class="close" data-dismiss="alert">x</button>
			<h4> <i class="fa fa-ban"></i>Failed!</h4>
				{{Session::get('msg_err')}}
			</div>
	@endif

	@if(Session::has('msg'))
			<div class="alert alert-success" role="alert" style="margin-top:10px;">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<h4> <i class="fa fa-check"></i>Success!</h4>
							
						{{Session::get('msg')}}
			</div>
     @endif
			

   <section id="form"><!--form-->
		<div class="container" >
			<div class="row" >
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form" ><!--update account-->
						<h2>update account</h2>
						<form  id="accountForm"  method="post" name="user-login" action="{{route('User.Account')}}">
						    {{csrf_field()}}   
							<input id="name" name="name" type="text" value="{{$user->name}}" placeholder="Name"/>
							<input id="address" name="address" type="text" value="{{$user->address}}" placeholder="Address"/>
							<input id="city" name="city" type="text" value="{{$user->city}}" placeholder="City"/>
							<input id="state" name="state" type="text" value="{{$user->state}}" placeholder="State"/>
                              <select id="country"  name="country">
							 <option value="">Select Country</option>
							 @foreach($countries as $country)
							 <option value="{{$country->country_name}}" @if($country->country_name == $user->country) selected @endif>{{$country->country_name}}</option>
                             @endforeach
							 </select>
							 <input id="pincode" name="pincode" type="text"  style="margin-top:10px;"  value="{{$user->pincode}}" placeholder="PinCode"/>
							 <input id="phone" name="phone" type="text" value="{{$user->phone}}" placeholder="Phone"/>

							<button type="submit" class="btn btn-default">Update</button>
						</form>
					</div><!--/update account-->
				</div>
				
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>

				<div class="col-sm-4">
					<div class="signup-form"><!--reset password-->
						<h2>reset password</h2>
						<form id=""  method="post" name="user-register" action="{{route('User.Account')}}">
					    	{{csrf_field()}}
							
							

							<button type="submit" class="btn btn-default">Reset</button>
						</form>
					</div><!--/reset password-->
				</div>
			</div>
		</div>
	</section><!--/form-->


    @endsection