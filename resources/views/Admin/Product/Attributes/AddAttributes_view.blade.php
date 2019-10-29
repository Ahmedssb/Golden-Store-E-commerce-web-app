@extends('Layouts.Admin.Admin_app')


@section('content')
<div class="col-lg-10">
      <div class="card">
                                                        <div class="card-header">Add Product Attributes</div>
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
                                                             
                                                                <div class="  form-group" >

                                                                    <div class="col col-md-5"><label class=" form-control-label">Product Color</label></div>
                                                                    <div class="col-12 col-md-5">
                                                                        <p class="form-control-static">{{$product->color}}</p>
                                                                    </div>

                                                                </div>

                                                                                                              <div class="  form-group" >

                                                                    <div class="col col-md-5"><label class=" form-control-label">Product Color</label></div>
                                                                    <div class="col-12 col-md-5">
                                                                        <p class="form-control-static">{{$product->color}}</p>
                                                                    </div>

                                                                </div>
                                                                
                                                                 
                                                                <div class="  form-group" id="attributes">
                                                                    <input type="text" id="sku" name="sku[]" placeholder="SKU" style="width:22%;text-align:center">
                                                                    <input type="text" id="size" name="size[]" placeholder="size" style="width:22%;text-align:center">
                                                                    <input type="text" id="price" name="price[]"  placeholder="price" style="width:22%;text-align:center">
                                                                    <input type="text" id="stock" name="stock[]" placeholder="stock" style="width:22%;text-align:center">  
                                                                    <button  type="button" id="btn_attributes" style="width:8%;text-align:center">Add</button>
                                                               </div>

                                                               
                                                                    <div class="form-actions form-group "   >
                                                                        <input  type="submit" value="Add" class="btn btn-success "> 
                                                                    </div>
                                                                 
                                                            </form>

                                                        </div>
       </div>
	   
	   <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Attribute Id</th>
                                            <th>Attribute SKU</th>
                                            <th>Attribute SIZE</th>
                                            <th>Attribute PRICE</th>
                                            <th>Attribute STOCK</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($attributes as $att)
                                     <tr>
                                            <td>{{$att->id}}</td>
                                            <td>{{$att->sku}}</td>
                                            <td>{{$att->size}}</td>
                                            <td>{{$att->price}}</td>
                                            <td>{{$att->stock}}</td>
                                             
                                            <td> 
                                            
                                          <button id="{{$att->id}}" type="button" onclick="showconfirmation('{{$att->id}}','{{route('ProductAttributes.Delete',['id'=>$att->id])}}')"> <a class="btn btn-danger btn-sm" href=" # " id="delete_cat">Delete</a></button>
                                           
                                            </td>
                                        </tr>
                             
                             <div class="bg-modal" id="{{$product->id*300}}">
                                <div class="modal-contents">

                                    <div class='close-btn' id="{{$product->id*700}}">+</div>
                                    <img src="{{'/images/products/Small/'.$product->image}}" alt="">
                                  <div class="product-detail">  <label>Name: </label> {{$product->name}}</div>
                                    <div class="product-detail">{{$product->description}}</div>
                                     

                                </div>
                            </div>
                            <!-- end of popUp section-->
  
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