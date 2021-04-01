@extends('frontend.layout')
@section('title', 'Edit Item')
@section('content')

<main class="content">
  <div class="col-lg-12">
  	<div class="card">
  		<div class="card-header">
  			<h6>Edit Item - {{ $inventory->sku }}</h6>
  		</div>
  		<div class="card-body">
  			<form method="post">@csrf
	  			<div class="tab">
			      	<ul class="nav nav-tabs" role="tablist">
			        	<li class="nav-item"><a class="nav-link active" href="#tab-1" data-toggle="tab" role="tab">Item</a></li>
			        	<li class="nav-item"><a class="nav-link" href="#tab-3" data-toggle="tab" role="tab">Pricing</a></li>
			        	<li class="nav-item"><a class="nav-link" href="#tab-4" data-toggle="tab" role="tab">Package</a></li>
			        	<li class="nav-item"><a class="nav-link" href="#tab-5" data-toggle="tab" role="tab">Documents</a></li>
			        	<li class="nav-item"><a class="nav-link" href="#tab-6" data-toggle="tab" role="tab">History</a></li>
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
			        			<div class="col-sm-4">
			        				<div class="form-group row">
					        			<label class="required col-sm-4 text-right">ID</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="sku" class="form-control" required value="{{ $inventory->sku }}">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="required col-sm-4 text-right">Name</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="name" class="form-control" required value="{{ $inventory->name }}">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Description</label>
					        			<div class="col-sm-8">
					        				<textarea rows="5" name="description" class="form-control">{{ $inventory->description }}</textarea>
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="required col-sm-4 text-right">Item Type</label>
					        			<div class="col-sm-8">
						        			<select readonly class="form-control">
						        				<option value="">[None]</option>
						        				<option value="2" @if($inventory->item_type==2) selected @endif>Generic</option>
						        				<option value="3" @if($inventory->item_type==3) selected @endif>Non-Serialized</option>
						        				<option value="5" @if($inventory->item_type==5) selected @endif>Serialized</option>
						        			</select>
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Item Group</label>
					        			<div class="col-sm-8">
						        			<select class="form-control" name="item_group">
						        				<option value="0">[None]</option>
												@foreach($item_groups as $item_group)
						        				<option value="{{$item_group->id}}" @if($inventory->item_group==$item_group->id) selected @endif>{{$item_group->name}}</option>
												@endforeach
						        			</select>
						        		</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="required col-sm-4 text-right">Sale Type</label>
					        			<div class="col-sm-8">
						        			<select class="form-control" name="sale_type" required>
						        				<option value="0">[None]</option>
						        				<option value="1" @if($inventory->sale_type==1) selected @endif>Purchase</option>
						        				<option value="2" @if($inventory->sale_type==2) selected @endif>Rental</option>
						        				<option value="3" @if($inventory->sale_type==3) selected @endif>Purchase and Rental</option>
						        			</select>
						        		</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right required">Status</label>
					        			<div class="col-sm-8">
						        			<select class="form-control" name="status" required>
						        				<option value="0">[None]</option>
						        				<option value="1" @if($inventory->status==1) selected @endif>Active</option>
						        				<option value="2" @if($inventory->status==2) selected @endif>Discontinued</option>
						        				<option value="3" @if($inventory->status==3) selected @endif>Superceded</option>
						        				<option value="4" @if($inventory->status==4) selected @endif>Obsolete</option>
						        			</select>
						        		</div>
					        		</div>
			        			</div>
			        			
			        			<div class="col-sm-4">
			        				<div class="form-group row">
					        			<label class="col-sm-4 text-center">User Data</label>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">User 1</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="user_1" class="form-control" value="{{ $inventory->user_1  }}">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">User 2</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="user_2" class="form-control" value="{{ $inventory->user_2  }}">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">User 3</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="user_3" class="form-control" value="{{ $inventory->user_3  }}">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">User 4</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="user_4" class="form-control" value="{{ $inventory->user_4  }}">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-center">Item Pricing</label>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Proc Code</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="proc_code" class="form-control" required value="{{ $inventory->proc_code }}">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Rental Amount</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="rental_amount" class="form-control" required value="{{ $inventory->rental_amount }}">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Purchase Amount</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="purchase_amount" class="form-control" required value="{{ $inventory->purchase_amount }}">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Default Billing Multiplier</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="default_multiplier" class="form-control" value="{{ $inventory->default_multiplier }}">
					        			</div>
					        		</div>
			        			</div>
			        			<div class="col-sm-4">
			        				
			        			</div>
			        		</div>
			        	</div>
			        	<div class="tab-pane" id="tab-3" role="tabpanel">
			        		<div class="row">
			        			<div class="col-lg-12">
			        				<a href="javascript:void(0)" class="btn btn-sm btn-primary float-right m-1">New Item Pricing</a>
					          		<div class="table-responsive">
					          			<table class="table">
					          				<thead>
					          					<tr>
					          						<th></th>
					          						<th>Procedure Code</th>
					          						<th>Price Type</th>
					          						<th>Start</th>
					          						<th>End</th>
					          						<th>Periods</th>
					          						<th>Charge</th>
					          						<th>Allow</th>
					          						<th>Multiplier</th>
					          						<th>Modifiers</th>
					          						<th></th>
					          					</tr>
					          				</thead>
					          				<tbody>
					          					<tr>
					          						
					          					</tr>
					          				</tbody>
					          			</table>
					          		</div>
			        			</div>
			        		</div>
			        	</div>
			        	
			        	<div class="tab-pane" id="tab-4" role="tabpanel">
			          		<div class="row">
			        			<div class="col-lg-8">
			        				<a href="javascript:void(0)" class="btn btn-sm btn-primary float-right m-1" data-toggle="modal" data-target="#package_item">New Item</a>
					          		<div class="table-responsive">
					          			<table class="table">
					          				<thead>
					          					<tr>
					          						<th>Qty</th>
					          						<th>Item ID</th>
					          						<th>Name</th>
					          						<th>Type</th>
					          						<th>Price Type</th>
					          						<th></th>
					          					</tr>
					          				</thead>
					          				<tbody>
					          					<tr>
					          						
					          					</tr>
					          				</tbody>
					          			</table>
					          		</div>
			        			</div>
			        		</div>
			        	</div>
			        	<div class="tab-pane" id="tab-5" role="tabpanel">
			          	
			        	</div>
			        	<div class="tab-pane" id="tab-6" role="tabpanel">
			          		<table class="table">
			          			<thead>
			          				<tr>
			          					<th>Date Changed</th>
			          					<th>Changed By</th>
			          					<th>Changed</th>
			          				</tr>
			          			</thead>
			          			<tbody>
			          				@foreach($inventory->activity as $activity)
			          				<tr>
			          					<td>{{ date('j M,Y', strtotime($activity->created_at)) }}</td>
			          					<td>{{ $activity->user->first_name }}</td>
			          					<td>{{ $activity->activity }}</td>
			          				</tr>
			          				@endforeach
			          			</tbody>
			          		</table>
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
<!-- Modal -->
<div id="package_item" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Package Item</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-lg-12">
        		<div class="form-group row">
        			<label class="required col-sm-3 text-right">Search</label>
        			<div class="col-sm-8">
        				<input type="text" class="form-control">
        			</div>
        		</div>
        	</div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection