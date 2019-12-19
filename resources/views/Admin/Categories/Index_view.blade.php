@extends('Layouts.Admin.Admin_app')


@section('content')

<div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Categories  </strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Category Id</th>
                                            <th>Category Name</th>
                                            <th>Parent Id</th>
                                            <th>URL</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($categories as $category)
                                     <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->parent_id == 0 ?'Main-Category':$category->parent_id}}</td>
                                            <td>{{$category->url}}</td>
                                            <td> 
                                            <a class="btn btn-danger" href="{{route('Category.Delete',['id'=>$category->id])}}" id="delete_cat">Delete</a>
                                            <a class="btn btn-warning" href="{{route('Category.Update',['id'=>$category->id])}}">Edit</a>
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