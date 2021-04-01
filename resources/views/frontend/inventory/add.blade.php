@extends('frontend.layout')
@section('title', 'Add Item')
@section('content')

<main class="content">
  <div class="col-lg-12">
  	<div class="card">
  		<div class="card-header">
  			<h6>Add Item</h6>
  		</div>
  		<div class="card-body">
  			<form method="post">@csrf
	  			<div class="tab">
			      	<ul class="nav nav-tabs" role="tablist">
			        	<li class="nav-item"><a class="nav-link active" href="#tab-1" data-toggle="tab" role="tab">Item</a></li>
			        	<!--<li class="nav-item"><a class="nav-link" href="#tab-3" data-toggle="tab" role="tab">Pricing</a></li>
			        	<li class="nav-item"><a class="nav-link" href="#tab-4" data-toggle="tab" role="tab">Package</a></li>
			        	<li class="nav-item"><a class="nav-link" href="#tab-5" data-toggle="tab" role="tab">Documents</a></li>-->
			      	</ul>
			      	<div class="tab-content">
			        	<div class="tab-pane active" id="tab-1" role="tabpanel">
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
			        			<div class="col-sm-4">
			        				<div class="form-group row">
					        			<label class="required col-sm-4 text-right">ID</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="sku" class="form-control" required>
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="required col-sm-4 text-right">Name</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="name" class="form-control" required>
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Description</label>
					        			<div class="col-sm-8">
					        				<textarea rows="5" name="description" class="form-control"></textarea>
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="required col-sm-4 text-right">Item Type</label>
					        			<div class="col-sm-8">
						        			<select name="item_type" required class="form-control">
						        				<option value="">[None]</option>
						        				<option value="2">Generic</option>
						        				<option value="3">Non-Serialized</option>
						        				<option value="5">Serialized</option>
						        			</select>
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Item Group</label>
					        			<div class="col-sm-8">
						        			<select class="form-control" name="item_group">
						        				<option value="0">[None]</option>
						        				@foreach($item_groups as $item_group)
						        				<option value="{{$item_group->id}}">{{$item_group->name}}</option>
												@endforeach
						        			</select>
						        		</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="required col-sm-4 text-right">Sale Type</label>
					        			<div class="col-sm-8">
						        			<select class="form-control" name="sale_type" required>
						        				<option value="0">[None]</option>
						        				<option value="1">Purchase</option>
						        				<option value="2">Rental</option>
						        				<option value="3">Purchase and Rental</option>
						        			</select>
						        		</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right required">Status</label>
					        			<div class="col-sm-8">
						        			<select class="form-control" name="status" required>
						        				<option value="0">[None]</option>
						        				<option value="1">Active</option>
						        				<option value="2">Discontinued</option>
						        				<option value="3">Superceded</option>
						        				<option value="4">Obsolete</option>
						        			</select>
						        		</div>
					        		</div>
			        			</div>
			        			
			        			<div class="col-sm-4">
			        				<div class="form-group row">
					        			<label class="col-sm-4 text-center">User Data</label>
					        		</div>
					        		@for($i=1;$i<=4;$i++)
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">User {{$i}}</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="user_{{$i}}" class="form-control">
					        			</div>
					        		</div>
					        		@endfor
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-center">Item Pricing</label>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Proc Code</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="proc_code" class="form-control" required>
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Rental Amount</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="rental_amount" class="form-control" required>
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Purchase Amount</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="purchase_amount" class="form-control" required>
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Default Billing Multiplier</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="default_multiplier" class="form-control">
					        			</div>
					        		</div>
			        			</div>
			        			<div class="col-sm-4">
			        				
			        			</div>
			        		</div>
			        	</div>
			        	<div class="tab-pane" id="tab-2" role="tabpanel">
			          
			        	</div>
			        	<div class="tab-pane" id="tab-3" role="tabpanel">
			          
			        	</div>
			        	<div class="tab-pane" id="tab-4" role="tabpanel">
			          
			        	</div>
			        	<div class="tab-pane" id="tab-5" role="tabpanel">
			          
			        	</div>
			        	
			      	</div>
			    </div>
			    <div class="form-group row float-right">
			    	<input type="submit" name="" class="btn btn-primary" value="Save">
			    </div>
		    </form>	
  		</div>
  	</div>
  </div>
</main>

@endsection