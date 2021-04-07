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
  			
	  			<div class="tab">
			      	<ul class="nav nav-tabs" role="tablist">
			        	<li class="nav-item"><a class="nav-link active" href="#tab-1" data-toggle="tab" role="tab">Item</a></li>
			        	<li class="nav-item"><a class="nav-link" href="#tab-3" data-toggle="tab" role="tab" onclick="$('.pricingForm').hide();$('.pricingTable').show();">Pricing</a></li>
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
	                        <form method="post">@csrf
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
				        			<div class="col-sm-8">
								    	<input type="submit" name="" class="btn btn-primary float-right" value="Save">
								    </div>
			        			</div>
			        		</form>
			        	</div>
			        	<div class="tab-pane" id="tab-3" role="tabpanel">
			        		@if(session()->has('message.level'))
					            <div class="alert alert-{{ session('message.level') }}">
					            {!! session('message.content') !!}
					            </div>
					        @endif
			        		<div class="row">
			        			<div class="col-lg-12">
			        				<div class="pricingForm" style="display: none;">
			        					<form autocomplete="off" id="pricingForm"> <input type="hidden" name="id">
			        						<div class="row">
			        							<div class="col-sm-4">
					        						<div class="form-group row">
									        			<label class="col-sm-4 text-right">Price Table</label>
									        			<div class="col-sm-8">
									        				<input type="text" name="price_table" class="form-control" required>
									        			</div>
									        		</div>
									        		<div class="form-group row">
									        			<label class="col-sm-4 text-right">Proc Code</label>
									        			<div class="col-sm-8">
									        				<input type="text" name="proc_code" required class="form-control" required value="{{ $inventory->proc_code }}" readonly>
									        			</div>
									        		</div>
									        		<div class="form-group row">
									        			<label class="col-sm-4 text-right">Price Type</label>
									        			<div class="col-sm-8">
									        				<select class="form-control" required name="price_type"><option value="">[None]</option><option value="1">Purchase</option><option value="2">Rental</option></select>
									        			</div>
									        		</div>
									        		<div class="form-group row">
									        			<label class="col-sm-4 text-right">Effective Dates</label>
									        			<div class="col-sm-8">
									        				<div class="row">
									        					<div class="col-sm-2"><label>Start</label></div>
									        					<div class="col-sm-10"><input type="text" name="effective_date_start" class="form-control datepicker" readonly></div>	
									        				</div>
									        				<div class="row">
									        					<div class="col-sm-2"><label>End</label></div>
									        					<div class="col-sm-10"><input type="text" name="effective_date_end" class="form-control datepicker" readonly></div>	
									        				</div>
									        			</div>
									        		</div>
				        						</div>
				        						<div class="col-sm-4">
				        							<div class="form-group row">
									        			<label class="col-sm-4 text-right">Periods</label>
									        			<div class="col-sm-8">
									        				<div class="row">
									        					<div class="col-sm-2"><label>Start</label></div>
									        					<div class="col-sm-10"><input type="number" name="periods_start" required class="form-control"></div>	
									        				</div>
									        				<div class="row">
									        					<div class="col-sm-2"><label>End</label></div>
									        					<div class="col-sm-10"><input type="number" name="periods_end" required class="form-control"></div>	
									        				</div>
									        			</div>
									        		</div>
									        		<div class="form-group row">
									        			<label class="col-sm-4 text-right">Billing Cycle</label>
									        			<div class="col-sm-8">
									        				<div class="row">
									        					<div class="col-sm-2"><label>Periods</label></div>
									        					<div class="col-sm-10">
									        						<select name="billing_period" class="form-control">
									        							<option value="0">[None]</option>
									        							<option value="1">Day</option>
									        							<option value="2">Week</option>
									        							<option value="3">Month</option>
									        							<option value="4">BiMonthly</option>
									        						</select>
									        					</div>	
									        				</div>
									        				<div class="row">
									        					<div class="col-sm-2"><label>Interval</label></div>
									        					<div class="col-sm-10"><input type="text" name="billing_interval" class="form-control"></div>	
									        				</div>
									        			</div>
									        		</div>
				        						</div>
				        						<div class="col-sm-4">
				        							<div class="form-group row">
									        			<label class="col-sm-4 text-right">Charge</label>
									        			<div class="col-sm-8">
									        				<input type="text" name="charge" class="form-control" required>
									        			</div>
									        		</div>
									        		<div class="form-group row">
									        			<label class="col-sm-4 text-right">Allow</label>
									        			<div class="col-sm-8">
									        				<input type="text" name="allow" required class="form-control">
									        			</div>
									        		</div>
									        		@for($i=1;$i<=4;$i++)
									        		<div class="form-group row">
									        			<label class="col-sm-4 text-right">Modifier {{$i}}</label>
									        			<div class="col-sm-8">
									        				<input type="text" name="modifier_{{$i}}" class="form-control">
									        			</div>
									        		</div>
									        		@endfor
									        		<div class="form-group row">
									        			<label class="col-sm-4 text-right">Billing Units</label>
									        			<div class="col-sm-8">
									        				<input type="number" min="1" name="billing_units" required class="form-control" value="1">
									        			</div>
									        		</div>
				        						</div>
				        						<div class="col-sm-12">
				        							<input type="submit" name="pricing" class="btn btn-sm btn-primary float-right" value="Submit">
				        						</div>
				        					</div>
			        					</form>
			        				</div>
					          		<div class="table-responsive pricingTable">
					          			<a href="javascript:void(0)" class="btn btn-sm btn-primary float-right m-1" onclick="$('.pricingForm').show();$('.pricingTable').hide();$('#pricingForm')[0].reset();">New Item Pricing</a>
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
					          					@foreach($inventory->pricing as $pricing)
					          					<tr>
					          						<td><a href="javascript:void(0)" class="btn btn-sm editPricing" data-id="{{$pricing->id}}"><i class="fas fa-edit text-warning"></i></a></td>
					          						<td>{{ $pricing->proc_code }}</td>
					          						<td>@if($pricing->price_type==1) Purchase @else Rental @endif</td>
					          						<td>{{$pricing->effective_date_start}}</td>
					          						<td>{{$pricing->effective_date_end}}</td>
					          						<td>{{$pricing->periods_start}} - {{$pricing->periods_end}}</td>
					          						<td>{{$pricing->charge}}</td>
					          						<td>{{$pricing->allow}}</td>
					          						<td>{{$pricing->billing_units}}</td>
					          						<td>{{$pricing->modifier_1}} {{$pricing->modifier_2}} {{$pricing->modifier_3}} {{$pricing->modifier_4}}</td>
					          						<td><a href="javascript:void(0)" class="btn btn-sm" onclick="delConfirmCom('inventory_prices','{{ $pricing->id }}', '1')"><i class="fas fa-trash text-danger"></i></a></td>
					          					</tr>
					          					@endforeach
					          				</tbody>
					          			</table>
					          		</div>
			        			</div>
			        		</div>
			        	</div>
			        	
			        	<div class="tab-pane" id="tab-4" role="tabpanel">
			        		@if(session()->has('message.level'))
					            <div class="alert alert-{{ session('message.level') }}">
					            {!! session('message.content') !!}
					            </div>
					        @endif
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
					          					@foreach($inventory->package as $package)
					          					<tr>
					          						<td>{{$package->qty}}</td>
					          						<td>{{$package->inventory->sku}}</td>
					          						<td>{{$package->inventory->name}}</td>
					          						<td> @switch($package->inventory->item_type) @case(2) Generic @break @case(3) Non-Serialized @break @case(5) Serialized @break @endswitch</td>
					          						<td> @switch($package->inventory->sale_type) @case(1) Purchase @break @case(2) Rental @break @endswitch</td>
					          						<td><a href="javascript:void(0)" class="btn btn-sm" onclick="delConfirmCom('inventory_packages','{{ $package->id }}', '1')"><i class="fas fa-trash text-danger"></i></a></td>
					          					</tr>
					          					@endforeach
					          				</tbody>
					          			</table>
					          		</div>
			        			</div>
			        		</div>
			        	</div>
			        	<div class="tab-pane" id="tab-5" role="tabpanel">
			          		@if(session()->has('message.level'))
					            <div class="alert alert-{{ session('message.level') }}">
					            {!! session('message.content') !!}
					            </div>
					        @endif
			          		<div class="row">
			        			<div class="col-lg-8">
			        				<form> </form>
			        				<form id="fileForm" method="post" action="{{url('inventory/documentUpload')}}" enctype="multipart/form-data">@csrf
			        					<input type="hidden" name="id" value="{{$inventory->id}}">
			        					<label for="fileupload" class="btn btn-sm btn-primary float-right">Upload</label>
			        					<input type="file" name="document" id="fileupload" style="display: none;" onchange="$('#fileForm').submit();">
			        				</form>
					          		<div class="table-responsive">
					          			<table class="table">
					          				<thead>
					          					<tr>
					          						<th>Sr no</th>
					          						<th>File</th>
					          						<th></th>
					          					</tr>
					          				</thead>
					          				<tbody>
					          					@foreach($inventory->documents as $key=>$document)
					          					<tr>
					          						<td>{{$key+1}}</td>
					          						<td>{{$document->uploadedFile}}</td>
					          						<td><a href="javascript:void(0)" class="btn btn-sm" onclick="delConfirmCom('inventory_documents','{{ $document->id }}', '1')"><i class="fas fa-trash text-danger"></i></a></td>
					          					</tr>
					          					@endforeach
					          				</tbody>
					          			</table>
					          		</div>
			        			</div>
			        		</div>
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
			    
		    </form>	
  		</div>
  	</div>
  </div>
</main>
<style type="text/css">ul.ui-autocomplete { z-index: 1100; }</style>
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
        		<div class="form-group row searchForm">
        			<label class="required col-sm-3 text-right">Search</label>
        			<div class="col-sm-8">
        				<input type="text" class="form-control search_inventory" name="search_input">
        			</div>
        		</div>
        		<div class="searchInventory" style="display: none;">
        			<form>
	        			<div class="form-group row">
		        			<label class="required col-sm-3 text-right">Item</label>
		        			<div class="col-sm-8">
		        				<input type="text" class="form-control" readonly name="s_item_name">
		        				<input type="hidden" name="s_item_id">
		        			</div>
		        		</div>
		        		<div class="form-group row">
		        			<label class="required col-sm-3 text-right">Qty</label>
		        			<div class="col-sm-8">
		        				<input type="number" min="1" class="form-control" name="qty" required>
		        			</div>
		        		</div>	
		        		<div class="form-group row">
		        			<div class="col-sm-3">&nbsp;</div>
		        			<div class="col-sm-8">
		        				<button type="submit" class="btn btn-sm btn-primary float-right">Add</button>
		        			</div>
		        		</div>
	        		</form>
        		</div>
        	</div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection