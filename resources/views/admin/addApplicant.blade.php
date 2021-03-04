@extends('admin.layout')
@section('title', 'Applications')
@section('content')
<div class="page-inner">
                <div class="page-title">
                    <h3>Add Applicant</h3>                    
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Add Applicant</h4>
                                </div>
                                <div class="panel-body">
                                    <form method="POST" action="" autocomplete="off" enctype="multipart/form-data">
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
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Enter Email..." autofocus>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputEmail1">First Name</label>
                                            <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required placeholder="Enter First Name...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputEmail1">Last Name</label>
                                            <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required placeholder="Enter First Name...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="exampleInputEmail1">Company Name</label>
                                            <input id="company_name" type="text" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" value="{{ old('company_name') }}" required placeholder="Enter Company Name...">
                                        </div>
                                        <!--<div class="form-group col-sm-6">
                                            <label for="password">Password</label>
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required  placeholder="Enter Password...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="password-confirm">Confirm Password</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                                        </div>-->
                                        <div class="form-group col-sm-6">
                                            <label for="address">Address</label>
                                            <textarea id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" rows="5" name="address" required>{{ old('address') }}</textarea>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="city">City</label>
                                            <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required placeholder="Enter city...">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="state">State</label>
                                            <input id="state" type="text" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ old('state') }}" required placeholder="Enter state...">
                                        </div>
                                        
                                        <div class="form-group col-sm-6">
                                            <label for="phone_no">Phone Number</label>
                                            <input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ old('phone_no') }}" required placeholder="Enter phone no...">
                                        </div> 
                                        <div class="form-group col-sm-6">
                                            <label for="file_upload">File Upload</label>
                                            <input id="file_upload" type="file" class="form-control{{ $errors->has('file_upload') ? ' is-invalid' : '' }}" name="file_upload">
                                        </div> 
                                                                                
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
                
             @endsection