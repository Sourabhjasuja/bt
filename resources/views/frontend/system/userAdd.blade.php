@extends('frontend.layout')
@section('title', 'Add User')
@section('content')

<main class="content">
  <div class="col-lg-6">
  	<div class="card">
  		<div class="card-header">
  			<h6>Add User</h6>
  		</div>
  		<div class="card-body">
  			<form>
	  			<div class="tab">
			      	<ul class="nav nav-tabs" role="tablist">
			        	<li class="nav-item"><a class="nav-link active" href="#tab-1" data-toggle="tab" role="tab">General</a></li>
			        	<li class="nav-item"><a class="nav-link" href="#tab-3" data-toggle="tab" role="tab">History</a></li>
			      	</ul>
			      	<div class="tab-content">
			        	<div class="tab-pane active" id="tab-1" role="tabpanel">
			        		<div class="row">
			        			<div class="col-sm-4">
			        				<div class="form-group">
					        			<label>First Name</label>
					        			<input type="text" name="first_name" class="form-control" required>		
					        		</div>
					        		<div class="form-group">
					        			<label>Middle Name</label>
					        			<input type="text" name="middle_name" class="form-control">		
					        		</div>
					        		<div class="form-group">
					        			<label>Last Name</label>
					        			<input type="text" name="last_name" class="form-control" required>		
					        		</div>
					        		<div class="form-group">
					        			<label>Email</label>
					        			<input type="email" name="email" class="form-control" required>		
					        		</div>
			        			</div>
			        			<div class="col-sm-4">
			        				<div class="form-group">
					        			<label>User Group</label>
					        			<select class="form-control" name="user_group" required>
					        				<option value="">Select...</option>
					        				@foreach($user_groups as $group)
					        					<option value="{{$group->id}}">{{$group->name}}</option>
					        				@endforeach
					        			</select>
					        		</div>
			        			</div>
			        			<div class="col-sm-4"></div>
			        		</div>
			        	</div>
			        	<div class="tab-pane" id="tab-2" role="tabpanel">
			          
			        	</div>
			        	<div class="tab-pane" id="tab-3" role="tabpanel">
			          		<table class="table">
			          			<thead>
			          				<tr>
			          					<th>Date Changed</th>
			          					<th>Changed By</th>
			          					<th>Changed</th>
			          				</tr>
			          			</thead>
			          			<tbody>
			          				<tr>
			          					<td></td>
			          					<td></td>
			          					<td></td>
			          				</tr>
			          			</tbody>
			          		</table>
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