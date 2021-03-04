@extends('admin.layout')
@section('content')
<div class="page-inner">
    <div class="page-title">
        <h3>Change Password</h3>                    
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Change Password</h4>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="">
                            @if(session()->has('message.level'))
                                <div class="alert alert-{{ session('message.level') }}"> 
                                {!! session('message.content') !!}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @csrf
                        <div class="row">
                        	<div class="form-group col-sm-12">
                            	<label for="exampleInputEmail1">Old Password</label>
                            	<input id="old_password" type="password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" name="old_password" value="{{ old('old_password') }}" required placeholder="Enter Old password...">
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="exampleInputEmail1">New Password</label>
                                <input id="new_password" type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password" value="{{ old('new_password') }}" required placeholder="Enter New Password...">
                            </div>
                            <div class="form-group col-sm-12">
                            	<button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection