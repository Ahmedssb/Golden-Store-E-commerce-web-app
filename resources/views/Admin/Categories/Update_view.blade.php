@extends('Layouts.Admin.Admin_app')


@section('content')
<div class="col-lg-6">
      <div class="card">
                                                        <div class="card-header">Update Category</div>
                                                        <div class="card-body card-block">
                                                            <form action="" method="post" class="" name="update_category" id="update_category" novalidate="novalidate">
                                                              {{csrf_field()}}

                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Category Name</div>
                                                                        <input type="text" id="name" name="name" class="form-control" value="{{$category->name}}">
                                                                     </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Category Description</div>
                                                                         <textarea name="description" id="description" class="form-control"> {{$category->description}} </textarea>
                                                                     </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Category Level</div>
                                                                         <select name="parent_id" id="parent_id" class="form-control">
                                                                             <option value="0">Main Category</option>
                                                                           
                                                                            @foreach($levels as $level)
                                                                              @if ($level->id == $category->parent_id)
                                                                               
                                                                              <option value="{{$level->id}}"   selected > {{$level->name}} </option>
                                                                              @endif
                                                                            @endforeach
                                                                           
                                                                         </select>
                                                                     </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">URL</div>
                                                                        <input type="text" id="url" name="url" class="form-control" value="{{$category->url}}">
                                                                     </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Status</div>
                                                                        <input type="checkbox"  id="status" name="status" class="form-control"  value="1"  @if ($category->status==1) checked @endif>
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