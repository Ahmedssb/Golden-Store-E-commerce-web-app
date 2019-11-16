@extends('Layouts.Admin.Admin_app')


@section('content')
<div class="col-lg-10">
      <div class="card">
                                                        <div class="card-header">Add Product Images</div>
                                                        <div class="card-body card-block col12">
                                                            <form action="" method="post"   enctype="multipart/form-data" class="" name="add_attribte" id="add_attribute"    >
                                                              {{csrf_field()}}
                                                               
                                                                

                                                                <div class="form-group">

                                                                    <div class="col col-md-5"><label class=" form-control-label">Product name</label></div>
                                                                    <div class="col-12 col-md-5">
                                                                        <p class="form-control-static">{{$product->name}}</p>
                                                                    </div>

                                                                </div>
                                                                <div class=" form-group">

                                                                    <div class="col col-md-5"><label class=" form-control-label">Product Code</label></div>
                                                                    <div class="col-12 col-md-5">
                                                                        <p class="form-control-static">{{$product->code}}</p>
                                                                    </div>

                                                                </div>
                                                             
                                                                 
                                                                 <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Image</div>
                                                                        <input type="file" id="product_image" name="product_images[]" class="form-control" multiple="multiple">
                                                                     </div>
                                                                </div>

                                                               
                                                                    <div class="form-actions form-group "   >
                                                                        <input  type="submit" value="Add Images" class="btn btn-success "> 
                                                                    </div>
                                                                 
                                                            </form>

                                                        </div>
       </div>
	   
	   <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Product Images  </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Image Id</th>
                                            <th>Product Id</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($productImages as $image)
                                     <tr>
                                            <td>{{$image->id}}</td>
                                            <td>{{$image->product_id}}</td>
                                            <td>
                                            @if(!empty($image->image))
                                            <img src="{{'/images/products/Small/'.$image->image}}" style="width:70px;">
                                            @endif
                                            </td> 
                                            <td> 
                                            
                                          <button id="{{$image->id}}" type="button" onclick="showconfirmation('{{$image->id}}','{{route('Product.deleteImages',['id'=>$image->id])}}')"> <a class="btn btn-danger btn-sm" href=" # " id="delete_cat">Delete</a></button>
                                           
                                            </td>
                                        </tr>
                             
  
                           @endforeach 
 
                                    </tbody>


                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
 </div>



 

 <script>
  function showconfirmation(id,url){
	  
	 var confirmButton = document.getElementById(id);
    var att_id =id;
  //var id = document.getElementById('btn-alert').value;
 
   
    confirmButton.onclick = function(){
    swal({
				title: "Are you sure?", 
				text: "The product attributes will be deleted", 
				type: "warning",
				confirmButtonText: "Yes",
				showCancelButton: true
		    })
		    	.then((result) => {
					if (result.value) {
					    window.location =url;
                       
                        
					}  
				}) 
       }
}


</script>

  

@endsection