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
						<li  class="active">Thanks</li>
						</ol>
				</div>

			<div class="row" style="text-align:center;" >

				<h3>Thanks Your Order Has Been Placed</h3>
				<p>Your Order Num Is <span style="color:#fdb45e"> {{Session::get('order_id')}} </span> and total cost is <span style="color:#fdb45e"> ${{Session::get('grand_total')}} </span> </p>
			</div>

     </div>
	</section><!--/form-->

  
    @endsection
    <?php 
    Session::forget('grand_total');
    Session::forget('order_id'); 
    ?>