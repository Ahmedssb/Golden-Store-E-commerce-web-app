@extends('Layouts.Admin.Admin_app')


@section('content')

<div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Orders Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Order Id</th>
                                            <th>Order Date</th>
                                            <th>Customer Name</th>
                                            <th>Customer E-mail</th>
                                            <th>Order Status</th>
                                            <th>Payment Metthod</th>
                                            <th>Grand Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                @foreach($orders as $order)
                                     <tr>
                                            <td>{{$order->id}}</td>
                                            <td> {{$order->created_at}}</td>
                                            <td>{{$order->name}}</td>
                                            <td>{{$order->user_email}}</td>
                                            <td>{{$order->order_Status}}</td>
                                            <td>{{$order->payment_method}}</td>
                                            <td>{{$order->grand_total}}</td>
                                            <td> 
                                            <a class="btn btn-info" href="{{route('Admin.Order.Products',['id'=>$order->id])}} ">View Order Products</a>
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

            <script src="/Admin/assets/js/validation.js"></script>

@endsection