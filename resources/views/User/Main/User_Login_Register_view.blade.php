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
			<div class="row" >
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form" ><!--login form-->
						<h2>Login to your account</h2>
						<form  id="loginForm"  method="post" name="user-login" action="{{route('User.Login')}}">
						    {{csrf_field()}}   
 							<input type="email" name="email" placeholder="Email Address" />
							 <input type="password" name="password" placeholder="password" />

							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form id="registerForm"  method="post" name="user-register" action="{{route('User.Register')}}">
					    	{{csrf_field()}}
							<input id="name" name="name" type="text" placeholder="Name"/>
							<input id="email" name="email" type="email" placeholder="Email Address"/>
							<input id="Password" name="password" type="password" placeholder="Password"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->


    @endsection