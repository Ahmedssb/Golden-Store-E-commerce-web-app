@extends('Layouts.Admin.Admin_app')


@section('content')
<div class="col-lg-6">
      <div class="card">
                                                        <div class="card-header">Add Product</div>
                                                        <div class="card-body card-block">
                                                            <form action="" method="post"   enctype="multipart/form-data" class="" name="add_product" id="add_product"    >
                                                              {{csrf_field()}}
                                                               
                                                              <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Under Category</div>
                                                                         <select name="category_id" id="category_id" class="form-control">
                                                                            <!-- all main category will have zero as parent id -->
                                                                             
                                                                            <!-- add subcategories
                                                                            add the id of the category user 
                                                                            select as the parent id for the new category-->
                                                                              <?php echo $categories_dropdown; ?>
                                                                         </select>
                                                                     </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Product Name</div>
                                                                        <input type="text" id="product_name" name="product_name" class="form-control">
                                                                     </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Product Code</div>
                                                                         <input type="text" name="product_code" id="product_code" class="form-control"> 
                                                                     </div>
                                                                </div>
                                                             
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Product Color</div>
                                                                        <input type="text" id="product_color" name="product_color" class="form-control">
                                                                     </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Description</div>
                                                                        <textarea type="text" id="product_des" name="product_des" class="form-control"> </textarea>
                                                                     </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Price</div>
                                                                        <input type="number" id="product_price" name="product_price" class="form-control">
                                                                     </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Material & Care</div>
                                                                        <textarea type="text" id="product_care" name="product_care" class="form-control"> </textarea>
                                                                     </div>
                                                                </div>


                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Image</div>
                                                                        <input type="file" id="product_image" name="product_image" class="form-control">
                                                                     </div>
                                                                </div>
																
																
																 <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Status</div>
                                                                        <input type="checkbox"   name="status" class="form-control"  value="1">
                                                                     </div>
                                                                </div>


                                                                <div class="form-actions form-group">
                                                                    <input  type="submit" value="Add" class="btn btn-success "> 
                                                                </div>
                                                            </form>
                                                        </div>
       </div>
 </div>


@endsection