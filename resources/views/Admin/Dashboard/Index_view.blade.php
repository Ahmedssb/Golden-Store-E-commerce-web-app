@extends('Layouts.Admin.Admin_app')


@section('content')
<div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Users</div>
                        <div class="stat-digit">{{$users_count}}</div>
                    </div>
                </div>
            </div>
        </div>
  </div>

  <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Categories</div>
                        <div class="stat-digit">{{$cats_count}}</div>
                    </div>
                </div>
            </div>
        </div>
  </div>

  <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Products</div>
                        <div class="stat-digit">{{$pro_count}}</div>
                    </div>
                </div>
            </div>
        </div>
  </div>

  <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Orders</div>
                        <div class="stat-digit">{{$orders_count}}</div>
                    </div>
                </div>
            </div>
        </div>
  </div>           

  
@endsection