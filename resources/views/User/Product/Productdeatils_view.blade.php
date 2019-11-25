@extends('Layouts.User.User_app')


@section('content')
 
    @include('Layouts.User.User_sidebar_view');
				
				<div class="col-sm-9 padding-right">
				@if(Session::has('msg_err'))
					<div class="alert alert-danger" role="alert" style="margin-top:10px;">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<h4> <i class="fa fa-ban"></i>Failed!</h4>
							{{Session::get('msg_err')}}
				     </div>
			     @endif
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
							    <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
								<a href="{{'/images/products/Larage/'.$productDeatails->image}}">
								   <img  style="  width: 300px;" class="mainImage"  src="{{'/images/products/Small/'.$productDeatails->image}}" alt="" />
								</a>
								<h3>ZOOM</h3>
								</div>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner  thumbnails">
									@if(!empty($productImages))
										
										<div class="item active "  >
										@foreach($productImages as $image)
										<a href="{{'/images/products/Larage/'.$image->image}}" data-standard="{{'/images/products/Medium/'.$image->image}}">
										  <img class="changeImage" style="width:80px;height:100px;border:1px solid #EF9C0C;border-radius:20px;cursor: pointer; "  src="{{'/images/products/Small/'.$image->image}}" alt=""> 
										</a>
										@endforeach
										</div>
									
                                     @endif
										
									</div>
							</div>

						</div>
						<div class="col-sm-7">
						    <form name="cart-form" id="add-to-cart-form"  action="{{route('Product.AddToCart')}}"  enctype="multipart/form-data"  method="post" > 
								{{csrf_field()}}
								<input type="hidden" name="product-id"  value="{{$productDeatails->id}}">
								<input type="hidden" name="product-code"  value="{{$productDeatails->code}}">
								<input type="hidden" name="product-color"  value="{{$productDeatails->color}}">
								<input type="hidden" name="product-name"  value="{{$productDeatails->name}}">
								<input type="hidden" name="product-price"  id="p-price" >
								<input type="hidden" name="user_email"  value=" ">
								<input type="hidden" name="session_id"  value=" ">



									<div class="product-information"><!--/product-information-->
										<img src="/User/images/product-details/new.jpg" class="newarrival" alt="" />
										<h2>{{$productDeatails->name}}</h2>
										<p>Web ID: {{$productDeatails->code}}</p>
										<p>
										   <select  id="selSize" name="size">   
											  <option value="">select</option>
											  @foreach($attributes as $att)
											  <option value="{{$att->id}}-{{$att->size}}">{{$att->size}}</option>
											  @endforeach
										   </select>
										</p>
										<img src="images/product-details/rating.png" alt="" />
										<span>
											<span  id="getPrice">US {{$productDeatails->price}}$</span>
											<label>Quantity:</label>
											<input type="text"   name="quantity"value="3" />
											@if($total_stock>0)
											<button type="submit" class="btn btn-fefault cart" id="cart_btn">
												<i class="fa fa-shopping-cart"></i>
												Add to cart
											</button>
											@endif
										</span>
										<p><b>Availability:</b> <span id="availability">@if($total_stock>0) In Stock @else Out Of Stock @endif</span></p>
										<p><b>Condition:</b> New</p>
										<a href=""><img src="/User/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
									</div><!--/product-information-->
							</form>
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#description" data-toggle="tab">Description</a></li>
								<li><a href="#care" data-toggle="tab">Material & Care</a></li>
								<li><a href="#delivery" data-toggle="tab">Delivery Option</a></li>
 							</ul>
						</div>
						<div class="tab-content">
						
						
							<div class="tab-pane fade active in" id="description" >
							  <div class="col-sm-12">
							     <p> {{$productDeatails->description}}</p>
							  </div>
								 
							</div>
							
							<div class="tab-pane fade" id="care" >
							  <div class="col-sm-12">
							       <p> {{$productDeatails->care}}</p>
							  </div>
							  
							</div>
							
							<div class="tab-pane fade" id="delivery" >
								   <div class="col-sm-12">
							       <p>Cash On delivery</p>
							  </div>
							  
							</div>
							
						 
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
							<?php $count = 1; ?>
							<!--      // Split an array into chunks of three items ecery three items will be in one array -->   
							  @foreach($recomandedProduct->chunk(3) as $chunk )
								<div @if($count==1 )class="item active" @else class="item " @endif >	
								  @foreach($chunk as $item)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{'/images/products/Small/'.$item->image}}"   style="width:200px;height:150px" alt="" />
													<h2>${{$item->price}}</h2>
													<p>{{$item->name}}</p>
													<a  href="{{route('Categort.Product.Details',['id'=>$item->id])}}"  class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								 @endforeach
								</div>
								<?php $count++; ?>
							   @endforeach
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>

	
<script>
 var acc = document.getElementsByClassName("accordion10");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active10");
      var panel =this.children[1];
	  console.log(panel);
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}


</script>

@endsection