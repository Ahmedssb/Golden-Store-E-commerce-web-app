@extends('Layouts.Admin.Admin_app')


@section('content')

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
                                            <th>Product Id</th>
                                            <th>Category Id</th>
                                            <th>Category Name</th>
                                            <th>Product Name</th>
                                            <th>Product Code</th>
                                            <th>Product Color</th>
                                            <th>Price</th>
                                            <th>Product Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($products as $product)
                                     <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->category_id}}</td>
                                            <td>{{$product->category_name}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->code}}</td>
                                            <td>{{$product->color}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>
                                            @if(!empty($product->image))
                                            <img src="{{'/images/products/Small/'.$product->image}}" style="width:70px;">
                                            @endif
                                            </td>
                                            <td> 
                                            <button class="btn btn-success btn-sm" id="{{$product->id}}" onclick="showPop('{{$product->id}}','{{$product->id*300}}','{{$product->id*700}}')"  class="popbtn"><a  >View more</a></button>
                                            <a class="btn btn-success btn-sm" href="{{route('ProductAttributes.Add',['id'=>$product->id])}} ">Add Attributes</a>
                                            <a class="btn btn-info btn-sm " href="{{route('Product.AddImages',['id'=>$product->id])}} ">Add Images</a>
                                            <a class="btn btn-warning btn-sm" href="{{route('Product.Update',['id'=>$product->id])}} ">Edit</a>
                                            <a class="btn btn-danger btn-sm" href="{{route('Product.Delete',['id'=>$product->id])}} " id="delete_cat">Delete</a>
                                           
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

             <!-- popUp section -->

                             

             

            <script src="/Admin/assets/js/validation.js"></script>
        
@endsection