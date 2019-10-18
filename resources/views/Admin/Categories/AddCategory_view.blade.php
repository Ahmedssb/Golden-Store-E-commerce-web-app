@extends('Layouts.Admin.Admin_app')


@section('content')
<div class="col-lg-6">
      <div class="card">
                                                        <div class="card-header">Add Category</div>
                                                        <div class="card-body card-block">
                                                            <form action="{{route('Category.Add')}}" method="post" class="" name="add_category" id="add_category" novalidate="novalidate">
                                                              {{csrf_field()}}

                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Category Name</div>
                                                                        <input type="text" id="name" name="name" class="form-control">
                                                                     </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Category Description</div>
                                                                         <textarea name="description" id="description" class="form-control"></textarea>
                                                                     </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Category Level</div>
                                                                         <select name="parent_id" id="parent_id" class="form-control">
                                                                            <!-- all main category will have zero as parent id -->
                                                                            <option value="0">Main Category</option>
                                                                            <!-- add subcategories
                                                                            add the id of the category user 
                                                                            select as the parent id for the new category-->
                                                                            @foreach($levels as $level)
                                                                              <option value="{{$level->id}}">{{$level->name}}</option>
                                                                            @endforeach
                                                                         </select>
                                                                     </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">URL</div>
                                                                        <input type="text" id="url" name="url" class="form-control">
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