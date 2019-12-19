<?php 
  use App\Http\Controllers\Controller;
  $main_cat = Controller::mainCategories();

  ?>
 <header id="header"><!--header-->
		
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{route('UserIndex')}}"><img src="/Admin/images/logo1.png" style="width:100px;height:50px;"alt="" /></a>
						</div>
					 
					</div>
				
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
 								<li><a href="{{route('Cart.Index')}}"><i class="fa fa-shopping-cart" style="color:#FE980F;"></i> Cart</a></li>
								 <li><a href="{{route('Orders')}}"><i class="fa fa-crosshairs" style="color:#FE980F;"></i> Orders</a></li>
								 
								@if(empty(Auth::check()))
									<li><a href="{{route('User.Login')}}"><i class="fa fa-lock" style="color:#FE980F;"></i> Login</a></li>
								@else
								<li><a href="{{route('User.Account')}}"><i class="fa fa-user" style="color:#FE980F;"></i> Account</a></li>
								<li><a href="{{route('User.Logout')}}"><i class="fa fa-sign-out" aria-hidden="true" style="color:#FE980F;"></i>Logout</a></li>
								@endif
								<li><a href="{{route('AdminLog')}}"><i class="fa fa-lock" style="color:#FE980F;"></i> Admin Login</a></li>

							</ul>
						</div>
						
						
					</div>
					
					
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{route('UserIndex')}}" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
									     @foreach($main_cat as $cat)
                                        <li><a href="{{route('Categort.Products',['id'=>$cat->id])}}">{{$cat->name}}</a></li>
									     @endforeach
                                    </ul>
                                </li> 
							 
 								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>
						
						
					</div>
					
					<div class="col-sm-3">
					  <form action="{{route('Product.Search')}}" method="post">
					  {{csrf_field()}}
						<div class="search_box pull-right">
							<input type="text" placeholder="Search" name="query">
							<button type="submit" style="border:0px;height:33px;margin-left:-33px;"> Go</button>
						</div>
					  </form>
					</div>
					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->