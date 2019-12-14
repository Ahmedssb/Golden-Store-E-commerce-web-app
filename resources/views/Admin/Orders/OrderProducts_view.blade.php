@extends('Layouts.Admin.Admin_app')


@section('content')
<div class="breadcrumbs">

            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Order#{{$order->id}}</h1>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
 </div>
<div class="animated fadeIn">
      <div class="row">
           
                <div class="col-lg-6"> <!-- start table 1 -->
                    <div class="card">

                        <div class="card-header">
                                <strong class="card-title">Order Details</strong>
                        </div>

                            <div class="card-body">
                                    
                                               
                            <p> <strong>Date :</strong> {{$order->created_at}}</p>
                            <p><strong>Status :</strong>{{$order->order_Status}}</p>
                            <p><strong>Grand total :</strong>{{$order->shiping_charges}}</p>
                            <p><strong>Shipping Charges :</strong>{{$order->grand_total}}</p>
                            <p><strong>Payment Method :</strong>{{$order->payment_method}}</p>

                                           
                                       
                        </div>
                    </div>
                </div>   <!-- end table -->
                
                

                <div class="col-lg-6">   <!-- start customer detail   --->
                    <div class="card">

                        <div class="card-header">
                                <strong class="card-title">Customer Details</strong>
                        </div>

                            <div class="card-body">     
                              <p><strong>Customer Name :</strong>{{$order->name}}</p>
                              <p><strong>Customer E-mail :</strong>{{$order->user_email}}</p>
                                     
                        </div>
                    </div>

                    <div class="card">  <!--update product status -->
                            <div class="card-header">
                                <strong class="card-title">Update Product Status </strong>
                            </div>
                            <div class="card-body">
                               <form method="post" id="order_status"  action="{{route('Admin.Order.Update')}}" >
                                 {{csrf_field()}}
                                 <input type="hidden" name="order_id" value="{{$order->id}}">
                                <select class="standardSelect"   style="width:40%;margin-right:15px;" name="order_Status">
                                    <option value="new"  {{$order->order_id=='new'?'selected="selected"':''}}  >New</option>
                                    <option value="pending" {{$order->order_id=='pending'?'selected="selected"':''}} >Pending</option>
                                    <option value="cancelled"  {{$order->order_Status=='cancelled'?'selected="selected"':''}}>Cancelled</option>
                                    <option value="in progress"  {{$order->order_Status=='in progress'?'selected="selected"':''}}>In Progress</option>
                                    <option value="shipped" {{$order->order_Status=='shipped'?'selected="selected"':''}}>Shipped</option>
                                    <option value="delivered"  {{$order->order_Status=='delivered'?'selected="selected"':''}}>Delivered</option>
 
                                </select>
                                <button  type="submit" class="btn btn-warning">Update</button>
                                </form>
                            </div>
                        </div>  <!-- end of update product status-->
                </div> <!-- end customer detail  -->

                <div class="col-lg-6">   <!-- start billing  info --->
                    <div class="card">

                        <div class="card-header">
                                <strong class="card-title">Billing Address</strong>
                        </div>

                            <div class="card-body">
                                <p>{{ $billing->name}} </p> 
                                <p> {{$billing->address}}<p>
                                <p> {{$billing->city}}<p>
                                <p>{{ $billing->state}}<p>
                                <p>{{ $billing->country}}<p>
                                <p>{{ $billing->pincode}} <p>
                                <p>{{ $billing->phone}} <p>             
                        </div>
                    </div>
                </div> <!-- end billing info  -->


                
                <div class="col-lg-6">   <!-- start shipping  info --->
                    <div class="card">

                        <div class="card-header">
                                <strong class="card-title">Shipping Address</strong>
                        </div>

                            <div class="card-body">
                                <div class="card-body">
                                    <p>{{ $order->name}} </p> 
                                    <p> {{$order->address}}<p>
                                    <p> {{$order->city}}<p>
                                    <p>{{ $order->state}}<p>
                                    <p>{{ $order->country}}<p>
                                    <p>{{ $order->picode}} <p>
                                    <p>{{ $order->phone}} <p>             
                                </div>     
                        </div>
                    </div>
                </div> <!-- end shipping info  -->
                
                <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Order#{{$order->id}} Products</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product code</th>
                                            <th>Product  Name</th>
                                            <th>Product Size</th>
                                            <th>Product color</th>
                                            <th>Product Price </th>
                                            <th>Product Quantity </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders_details as $detail)
                                      <tr>
                                            <td>  {{$detail->product_code}} </td>
                                            <td>  {{$detail->product_name}} </td>
                                            <td>  {{$detail->product_size}}</td>
                                            <td> {{$detail->product_color}} </td>
                                            <td> {{$detail->price}}  </td>
                                            <td> {{$detail->qty}}  </td>
                                            
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>





      </div>
 </div><!-- .animated -->

            <script src="/Admin/assets/js/validation.js"></script>

@endsection