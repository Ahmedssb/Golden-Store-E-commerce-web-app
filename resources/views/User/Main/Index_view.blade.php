@extends('Layouts.User.User_app')


@section('content')
 
   @include('Layouts.User.User_sidebar_view');
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--products-->
						<h2 class="title text-center"> Products</h2>
 						@foreach($products as $product)
 						 <!-- display only products that has status 1 -->
						 @if($product->status == 1)
						<div class="col-sm-4" >
								<div class="product-image-wrapper">
										<div class="single-products">
												<div class="productinfo text-center" >
													<img src="{{'/images/products/Small/'.$product->image}}" alt="" />
													<h2>{{ $product->price}}</h2>
													<p>{{ $product->name}}</p>
													<a href="{{route('Categort.Product.Details',['id'=>$product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												<div class="product-overlay">
													<div class="overlay-content">
														<h2>{{ $product->price}}</h2>
														<p>{{ $product->name}}</p>
														<a href="{{route('Categort.Product.Details',['id'=>$product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
													</div>
												</div>
										</div>
										<div class="choose">
											 
										</div>
								</div>
						</div>
						@endif
						@endforeach
 
					</div><!--end products-->
					
				{{ $products->links() }}

						
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