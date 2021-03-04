@extends('frontend.layout')
@section('title', 'Sytem Setup')
@section('content')

<main class="content">
	<div class="card">
		<div class="card-header">
			<h6>System Setup</h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-4">
					<h6>Documents</h6>
	    			<ul>
	    				<li><a href="{{ url('system/document/types') }}">Document Types</a></li>
	    			</ul>
	  			</div>
	  			<div class="col-lg-4">
	  				<h6>INVENTORY</h6>
	  				<ul>
	  					<li><a href="">Locations</a></li>
	  					<li><a href="">Vendors</a></li>
	  				</ul>
	  				<h6>System</h6>
	  				<ul>
	  					<li><a href="{{ url('system/users/activity') }}">User Activity</a></li>
	  					<li><a href="{{ url('system/users/group') }}">User Groups</a></li>
	  					<li><a href="{{ url('system/users') }}">Users</a></li>
	  				</ul>
	  			</div>
	  			<div class="col-lg-4">
	  				
	  			</div>
			</div>
		</div>
	</div>
  	
</main>

@endsection