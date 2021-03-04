@extends('admin.layout')
@section('title', 'Edit User')
@section('content')
<div class="page-inner">
  <div class="page-title">
    <h3>User Detail</h3>
  </div>
  <div id="main-wrapper">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-white">
          <div class="panel-heading clearfix">
            <h4 class="panel-title">User Detail</h4>
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
                <div class="form-group col-sm-6">
                  <label for="exampleInputEmail1">Email address</label>
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') ? old('email') : $customer->email }}" required placeholder="Enter Email..." disabled="disabled">
                  </div>
                  <div class="form-group col-sm-6">
                      <label for="exampleInputEmail1">First Name</label>
                      <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') ? old('first_name') : $customer->first_name }}" required placeholder="Enter Name...">
                  </div>
                  <div class="form-group col-sm-6">
                      <label for="exampleInputEmail1">Last Name</label>
                      <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') ? old('last_name') : $customer->last_name }}" required placeholder="Enter Name...">
                  </div>
                  <div class="form-group col-sm-6">
                      <label for="exampleInputEmail1">Company Name</label>
                      <input id="company_name" type="text" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" value="{{ old('company_name') ? old('company_name') : $customer->company_name }}" required placeholder="Enter Company...">
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
                      <textarea id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" rows="5" name="address" required>{{ old('address') ? old('address') : $customer->address }}</textarea>
                  </div>
                  <div class="form-group col-sm-6">
                      <label for="city">City</label>
                      <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') ? old('city') : $customer->city }}"  placeholder="Enter city...">
                  </div>
                  <div class="form-group col-sm-6">
                      <label for="state">State</label>
                      <input id="state" type="text" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ old('state') ? old('state') : $customer->state }}"  placeholder="Enter state...">
                  </div>
                  
                  <div class="form-group col-sm-6">
                      <label for="phone_no">Phone Number</label>
                      <input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ old('phone_no') ? old('phone_no') : $customer->phone_no }}"  placeholder="Enter phone no...">
                  </div>   
                  
                  <div class="form-group col-sm-6">
                      <label for="status">Status</label>
                      <select class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status">
                          <option value="0" {{ $customer->status ? '' : 'selected' }}>Active</option>
                          <option value="1" {{ $customer->status ? 'selected' : '' }}>DeActive</option>
                      </select>
                  </div>                               
                                                          
                </div>
                                        
              <div class="col-sm-12 text-right"><a href="{{url('admin/users')}}" class="btn btn-default">Cancel</a><button type="submit" class="btn btn-success m-l-sm m-r-sm">Save</button></div>             
            </form>
            
          </div>
          
        </div>
      </div>
      <div class="col-sm-12">
        <div class="panel panel-white">
          <div class="panel-heading clearfix">
            <h4 class="panel-title">Change Password</h4>
          </div>
          <div class="panel-body">
            <form method="POST" action="">
              @csrf
              <div class="row">
                <div class="form-group col-sm-6">
                      <label for="password">Password</label>
                      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required  placeholder="Enter Password...">
                  </div>
                  <div class="form-group col-sm-6">
                      <label for="password-confirm">Confirm Password</label>
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                  </div>
              </div>
              <div class="col-sm-12 text-right"><button type="submit" class="btn btn-success m-l-sm m-r-sm">Save</button></div>
            </form>
          </div>
        </div>
      </div>
      
    </div>
    <!-- Row --> 
  </div>
  <!-- Main Wrapper -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Order Notes</h4>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="display table table-bordered" style="width: 100%; cellspacing: 0;">
            <thead>
              <tr>
                <th>Order No</th>
                <th>Date</th>
                <th>Time</th>
                <th>Comments</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection