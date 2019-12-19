@extends('Layouts.Admin.Admin_app')


@section('content')

<div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Registerd Users  </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>  E-mail</th>
                                            <th>Phone</th>
                                            <th>Country</th>
                                            <th>Register Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($users as $user)
                                     <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone  }}</td>
                                            <td>{{$user->country}}</td>
                                            <td>{{$user->created_at}}</td>
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