@extends('Layouts.Admin.Admin_app')


@section('content')
<div class="col-lg-6">
                                                    <div class="card">
                                                        <div class="card-header">Update Password</div>
                                                        <div class="card-body card-block">
                                                            <form action="" method=" " class="" name="password_validate" id="password_validate" novalidate="novalidate">
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Current Password</div>
                                                                        <input type="password" id="current_pwd" name="current_pwd" class="form-control">
                                                                     </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">New Password</div>
                                                                        <input type="password"   id="new_pwd"  name="new_pwd" class="form-control">
                                                                     </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">Confirm Password</div>
                                                                        <input type="password" id="confirm_pwd" name="confirm_pwd" class="form-control">
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