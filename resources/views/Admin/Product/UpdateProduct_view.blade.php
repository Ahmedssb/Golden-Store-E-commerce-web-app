@extends('Layouts.Admin.Admin_app')


@section('content')
<div class="col-lg-8">
      <div class="card">
                                                        <div class="card-header">Update Product</div>
                                                        <div class="card-body card-block">
                                                            <form action="" method="post"   enctype="multipart/form-data" class="" name="update_product" id="update_product"    >
                                                              {{csrf_field()}}
                                                               
                                                              <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Under Category</div>
                                                                         <select name="category_id" id="category_id" class="form-control">
                                                                         @foreach($categories as $cat)
                                                                         <option value="{{$cat->id}}"      > {{$cat->name}}  </option>
                                                                         @if ($cat->id == $product->category_id)
                                                                               
                                                                              <option value="{{$cat->id}}"     selected> {{$cat->name}}  </option>
                                                                         @endif
                                                                            @endforeach
                                                                         </select>
                                                                     </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Product Name  </div>
                                                                        <input type="text" id="product_name" name="product_name" class="form-control" value="{{$product->name}}">
                                                                     </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Product Code  </div>
                                                                         <input type="text" name="product_code" id="product_code" class="form-control"  value="{{$product->code}}"> 
                                                                     </div>
                                                                </div>
                                                             
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Product Color</div>
                                                                        <input type="text" id="product_color" name="product_color" class="form-control"  value="{{$product->color}}">
                                                                     </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Description</div>
                                                                        <div class="col col-md-9">  <textarea type="text" id="product_des" name="product_des" class="form-control"> {{$product->description}} </textarea></div>
                                                                      
                                                                     </div>
                                                                </div>

                                                               

                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Price</div>
                                                                        <input type="text" id="product_price" name="product_price" class="form-control"  value="{{$product->price}}"  >
                                                                     </div>
                                                                </div>


                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Material & Care</div>
                                                                        <div class="col col-md-9">  <textarea type="text" id="product_care" name="product_care" class="form-control"> {{$product->care}} </textarea></div>
                                                                      
                                                                     </div>
                                                                </div>


                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Image</div>
                                                                      <div class="input-group-addon"  style="padding:0px 6px;border:2px solid #FFF;">  <input style="padding:0px;" type="file" id="product_image" name="product_image"  > </div>
                                                                        <input type="hidden" name="current_image" value="{{$product->image}}">
                                                                        <div class="input-group-addon" style="padding:0px;"> <img src="{{'/images/products/Small/'.$product->image}}" style="width:85px;height:80px;border:2px solid #FFF;"> </div>
                                                                     </div>  
                                                                </div>



                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Status</div>
                                                                        <input type="checkbox"   name="status" class="form-control"  value="1"  @if ($product->status==1) checked  @endif>
                                                                     </div>
                                                                </div>
                                                                

                                                                <div class="form-actions form-group">
                                                                    <input  type="submit" value="Update" class="btn btn-success "> 
                                                                </div>
 
                                                            </form>
                                                        </div>
       </div>


       
 </div>


@endsection