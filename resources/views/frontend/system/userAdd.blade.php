@extends('frontend.layout')
@section('title', 'Add User')
@section('content')

<main class="content">
  <div class="col-lg-9">
  	<div class="card">
  		<div class="card-header">
  			<h6>Add User</h6>
  		</div>
  		<div class="card-body">
  			<form autocomplete="off">
	  			<div class="tab">
			      	<ul class="nav nav-tabs" role="tablist">
			        	<li class="nav-item"><a class="nav-link active" href="#tab-1" data-toggle="tab" role="tab">General</a></li>
			        	<li class="nav-item"><a class="nav-link" href="#tab-2" data-toggle="tab" role="tab">Activity Management</a></li>
			        	<li class="nav-item"><a class="nav-link" href="#tab-3" data-toggle="tab" role="tab">Document Management</a></li>
			        	
			      	</ul>
			      	<div class="tab-content">
			        	<div class="tab-pane active" id="tab-1" role="tabpanel">
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
			        		<div class="row">
			        			<div class="col-sm-6">
			        				<div class="form-group">
					        			<label>First Name</label>
					        			<input type="text" name="first_name" class="form-control" required value="{{old('first_name')}}">
					        		</div>
					        		<div class="form-group">
					        			<label>Middle Name</label>
					        			<input type="text" name="middle_name" class="form-control" value="{{old('middle_name')}}">
					        		</div>
					        		<div class="form-group">
					        			<label>Last Name</label>
					        			<input type="text" name="last_name" class="form-control" required value="{{old('last_name')}}">
					        		</div>
					        		<div class="form-group">
					        			<label>Email</label>
					        			<input type="email" name="email" class="form-control" required value="{{old('email')}}">
					        		</div>

			        			</div>
			        			<div class="col-sm-6">
			        				<div class="form-group">
					        			<label>User Group</label>
					        			<select class="form-control" name="user_group" required>
					        				<option value="">Select...</option>
					        				@foreach($user_groups as $group)
					        					<option value="{{$group->id}}" @if(old('user_group')==$group->id) selected @endif>{{$group->name}}</option>
					        				@endforeach
					        			</select>
					        		</div>
					        		<div class="form-group">
					        			<label>Login Name</label>
					        			<input type="text" name="login_name" class="form-control" required value="{{old('login_name')}}">
					        		</div>
					        		<div class="form-group">
					        			<label>Password</label>
					        			<input type="password" name="password" class="form-control">		
					        		</div>
					        		<div class="form-group">
					        			<label>Confirm Password</label>
					        			<input type="password" name="password_confirmation" class="form-control">		
					        		</div>
			        			</div>
			        		</div>
			        	</div>
			        	<div class="tab-pane" id="tab-2" role="tabpanel">
			          		<div class="row">
			        			<div class="col-sm-6">
			        				<div class="form-group">
			        					<label><input type="checkbox" name="activity_manager" value="1" @if(old('activity_manager')) checked @endif> Activity Manager</label>
			        				</div>
			        			</div>
			        		</div>
			        	</div>
			        	<div class="tab-pane" id="tab-3" role="tabpanel">
			          		<div class="row">
			        			<div class="col-sm-6">
			        				<div class="form-group">
			        					<label><input type="checkbox" name="document_manager" value="1" @if(old('document_manager')) checked @endif> Document Manager</label>
			        				</div>
			        			</div>
			        		</div>
			        	</div>
			      	</div>
			    </div>
			    <div class="form-group float-right">
			    	<input type="submit" name="" class="btn btn-primary" value="Save">
			    </div>
		    </form>	
  		</div>
  	</div>
  </div>
</main>

@endsection
