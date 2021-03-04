@extends('frontend.layout')
@section('title', 'Edit Profile')
@section('content')
<main class="content">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header">
        <h5>Edit Profile</h5>
      </div>
      <div class="card-body">
        @if(session()->has('message.level'))
            <div class="alert alert-{{ session('message.level') }}"> 
            {!! session('message.content') !!}
            </div>
        @endif
        <form method="post">@csrf
          <div class="form-group md-size">
            <label>First Name</label>
            <input type="text" class="form-control" name="first_name" required value="{{ $user->first_name }}">  
          </div>
          <div class="form-group md-size">
            <label>Last Name</label>
            <input type="text" class="form-control" name="last_name" required value="{{ $user->last_name }}">  
          </div>
          <div class="form-group md-size">
            <label>Phone Number</label>
            <input type="text" class="form-control" name="phone_no" required value="{{ $user->phone_no }}">  
          </div>
          <div class="form-group md-size">
            <label>Address</label>
            <textarea class="form-control" name="address" required>{{ $user->address }}</textarea>
          </div>
          <div class="form-group md-size">
            <label>City</label>
            <input type="text" class="form-control" name="city" required value="{{ $user->city }}">  
          </div>
          <div class="form-group md-size">
            <label>State</label>
            <input type="text" class="form-control" name="state" required value="{{ $user->state }}">  
          </div>
          <div class="form-group md-size">
            <input type="submit" name="" value="Save" class="btn  btn-primary">
          </div>
        </form>    
      </div>
    </div>
    
    
  </div>
</main>
@endsection