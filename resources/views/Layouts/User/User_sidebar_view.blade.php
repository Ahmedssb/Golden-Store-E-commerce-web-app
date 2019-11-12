 


<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products"  ><!--category-productsr-->
						    @foreach($categories as $cat)
							<div class="accordion10">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a    >
											 
											{{$cat->name}}
										</a>
									</h4>
								</div>
							
								
								<div id="{{$cat->id}} " class="panel10">
								@foreach($sub_cat as $sub)
								@if($sub->parent_id == $cat->id)
									<div class="panel-body">
										<ul>
											<li><a href="{{route('Categort.Products',['id'=>$sub->id])}}">{{$sub->name}}</a></li>
											 
										</ul>
									</div>
										@endif
								@endforeach
								</div>
							
							
							</div>
							 @endforeach
							 
						</div><!--/category-products-->
	
					
					</div>
				</div>