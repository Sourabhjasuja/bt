@extends('frontend.layout')
@section('title', 'Purchase Transaction')
@section('content')

<main class="content">
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<h6>Purchase Transaction </h6>
				</div>
				<div class="card-body">
					@if(session()->has('message.level'))
                        <div class="alert alert-{{ session('message.level') }}">
                        {!! session('message.content') !!}
                        </div>
                    @endif
                    @if($transaction_item)
                    	<form method="post">@csrf
	                    	<div class="row">
	                    		<div class="col-sm-4">
	                    			<h6><strong> Transaction Info</strong></h6>
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Trans. ID</strong></div>
	                    				<div class="col-sm-7">{{$transaction->id}}</div>
	                    			</div>
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Trans. Reference</strong></div>
	                    				<div class="col-sm-7">{{$transaction->reference}}</div>
	                    			</div>
	                    			<h6 style="margin-top: 10px;"><strong>Item Info</strong></h6>
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Type</strong></div>
	                    				<div class="col-sm-7">@switch($item->item_type) @case(2) Generic @break @case(3) Non-Serialized @break @case(5) Serialized @break @endswitch</div>
	                    			</div>
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Location</strong></div>
	                    				<div class="col-sm-7">branch</div>
	                    			</div>
	                    			@if($item->item_type==5)
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Quantity</strong></div>
	                    				<div class="col-sm-7"><input type="text" name="qty" readonly value="{{ $transaction_item->qty }}" class="form-control"></div>
	                    			</div>
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Billing Quantity</strong></div>
	                    				<div class="col-sm-7"><input type="text" name="bill_qty" readonly value="{{ $transaction_item->bill_qty }}" class="form-control"></div>
	                    			</div>
	                    			@else
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Quantity</strong></div>
	                    				<div class="col-sm-7"><input type="text" name="qty" value="{{ $transaction_item->qty }}" class="form-control"></div>
	                    			</div>
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Billing Quantity</strong></div>
	                    				<div class="col-sm-7"><input type="text" name="bill_qty" value="{{ $transaction_item->bill_qty }}" class="form-control"></div>
	                    			</div>
	                    			@endif
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Unit Amount</strong></div>
	                    				<div class="col-sm-7"><input type="text" name="unit_amount" class="form-control" value="{{ $transaction_item->unit_amount }}"></div>
	                    			</div>
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Item ID</strong></div>
	                    				<div class="col-sm-7">{{$item->sku}}</div>
	                    			</div>
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Item Name</strong></div>
	                    				<div class="col-sm-7">{{$item->name}}</div>
	                    			</div>
	                    		</div>
	                    		<div class="col-sm-8" style="line-height: 20px">
	                    			@if($item->item_type==5)
		                    			<h6><strong> Serial Numbers</strong></h6>
		                    			<a href="javascript:void(0)" class="btn btn-sm btn-primary float-right addSerialNumber"><i class="fas fa-plus"></i> Add Serial Number</a>
		                    			<div class="table-responsive">
		                    				<table class="table serialNumberTable">
		                    					<thead>
		                    						<tr>
		                    							<th>Qty</th>
		                    							<th>Serial Number</th>
		                    							<th>Asset Number</th>
		                    							<th></th>
		                    						</tr>
		                    					</thead>
		                    					<tbody>
		                    						@foreach($transaction_item->serial_numbers as $serial_number)
		                    						<tr>
		                    							<td><input type="number" min="1" name="serial_qty[]" value="{{ $serial_number->qty }}" readonly></td>
		                    							<td><input type="text" name="serial_number[]" required value="{{ $serial_number->serial_number }}"></td>
		                    							<td><input type="text" name="asset_number[]" value="{{ $serial_number->asset_number }}"></td>
		                    							<td></td>
		                    						</tr>
		                    						@endforeach
		                    					</tbody>
		                    				</table>
		                    			</div>
		                    		@endif
	                    		</div>
	                    	</div>
	                    	<button type="submit" class="btn btn-sm btn-primary float-right">Save</button>
	                    </form>
                    @elseif($item && $type)
                    	<form method="post">@csrf
	                    	<div class="row">
	                    		<div class="col-sm-4">
	                    			<h6><strong> Transaction Info</strong></h6>
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Trans. ID</strong></div>
	                    				<div class="col-sm-7">{{$transaction->id}}</div>
	                    			</div>
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Trans. Reference</strong></div>
	                    				<div class="col-sm-7">{{$transaction->reference}}</div>
	                    			</div>
	                    			<h6 style="margin-top: 10px;"><strong>Item Info</strong></h6>
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Type</strong></div>
	                    				<div class="col-sm-7">@switch($item->item_type) @case(2) Generic @break @case(3) Non-Serialized @break @case(5) Serialized @break @endswitch</div>
	                    			</div>
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Location</strong></div>
	                    				<div class="col-sm-7">branch</div>
	                    			</div>
	                    			@if($item->item_type==5)
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Quantity</strong></div>
	                    				<div class="col-sm-7"><input type="text" name="qty" readonly value="1" class="form-control"></div>
	                    			</div>
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Billing Quantity</strong></div>
	                    				<div class="col-sm-7"><input type="text" name="bill_qty" readonly value="1" class="form-control"></div>
	                    			</div>
	                    			@else
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Quantity</strong></div>
	                    				<div class="col-sm-7"><input type="text" name="qty" value="1" class="form-control"></div>
	                    			</div>
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Billing Quantity</strong></div>
	                    				<div class="col-sm-7"><input type="text" name="bill_qty" value="1" class="form-control"></div>
	                    			</div>
	                    			@endif
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Unit Amount</strong></div>
	                    				<div class="col-sm-7"><input type="text" name="unit_amount" class="form-control"></div>
	                    			</div>
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Item ID</strong></div>
	                    				<div class="col-sm-7">{{$item->sku}}</div>
	                    			</div>
	                    			<div class="row">
	                    				<div class="col-sm-5 text-right"><strong>Item Name</strong></div>
	                    				<div class="col-sm-7">{{$item->name}}</div>
	                    			</div>
	                    		</div>
	                    		<div class="col-sm-8" style="line-height: 20px">
	                    			@if($item->item_type==5)
		                    			<h6><strong> Serial Numbers</strong></h6>
		                    			<a href="javascript:void(0)" class="btn btn-sm btn-primary float-right addSerialNumber"><i class="fas fa-plus"></i> Add Serial Number</a>
		                    			<div class="table-responsive">
		                    				<table class="table serialNumberTable">
		                    					<thead>
		                    						<tr>
		                    							<th>Qty</th>
		                    							<th>Serial Number</th>
		                    							<th>Asset Number</th>
		                    							<th></th>
		                    						</tr>
		                    					</thead>
		                    					<tbody>
		                    						<tr>
		                    							<td><input type="number" min="1" name="serial_qty[]" value="1" readonly></td>
		                    							<td><input type="text" name="serial_number[]" required></td>
		                    							<td><input type="text" name="asset_number[]"></td>
		                    							<td></td>
		                    						</tr>
		                    					</tbody>
		                    				</table>
		                    			</div>
		                    		@endif
	                    		</div>
	                    	</div>
	                    	<button type="submit" class="btn btn-sm btn-primary float-right">Save</button>
	                    </form>
                    @elseif($item)
                    	<div class="row">
                    		<div class="col-sm-4">
                    			<div class="row">
                    				<div class="col-sm-4"><strong>Item ID</strong></div>
                    				<div class="col-sm-8">{{$item->sku}}</div>
                    			</div>
                    			<div class="row">
                    				<div class="col-sm-4"><strong>Item Name</strong></div>
                    				<div class="col-sm-8">{{$item->name}}</div>
                    			</div>
                    			<div class="row">
                    				<div class="col-sm-4"><strong>Item Group</strong></div>
                    				<div class="col-sm-8">{{$item->item_group_inventory->name}}</div>
                    			</div>
                    			<div class="row">
                    				<div class="col-sm-4"><strong>Item Type</strong></div>
                    				<div class="col-sm-8">@switch($item->item_type) @case(2) Generic @break @case(3) Non-Serialized @break @case(5) Serialized @break @endswitch</div>
                    			</div>
                    			<div class="row">
                    				<div class="col-sm-4"><strong>Item Status</strong></div>
                    				<div class="col-sm-8">@switch($item->status) @case(1) Active @break @case(2) Discontinued @break @case(3) Superceded @break @case(4) Obsolete @break @endswitch</div>
                    			</div>
                    			<div class="row">
                    				<div class="col-sm-4"><strong>Item Sale Type</strong></div>
                    				<div class="col-sm-8">@switch($item->sale_type) @case(1) Purchase @break @case(2) Rental @break @case(3) Purchase and Rental @break @endswitch</div>
                    			</div>
                    		</div>
                    		<div class="col-sm-8">
                    			<div class="table-responsive">
                    				<table class="table">
                    					<thead>
                    						<tr>
                    							<th>Option</th>
                    							<th>Location</th>
                    							<th>On-hand</th>
                    							<th>On-Rent</th>
                    							<th>Available</th>
                    						</tr>
                    					</thead>
                    					<tbody>
                    						@foreach($branches as $branch)
                    						<tr>
                    							<td><select onchange="window.location.href='?item_no={{$item->id}}&type='+this.value"><option>[Select an Option]</option><option value="1">Purchase</option><option value="2">Purchase Return</option></select></td>
                    							<td>{{$branch}}</td>
                    							<td>0</td>
                    							<td>0</td>
                    							<td>0</td>
                    						</tr>
                    						@endforeach
                    					</tbody>
                    				</table>
                    			</div>
                    		</div>
                    	</div>
                    @else
	                    <form autocomplete="off">
		                    <div class="row">
		                    	<div class="col-sm-6">
		                    		<div class="form-group row">
					        			<label class="required col-sm-4 text-right">Trans. Date</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="trans_date" class="form-control datepicker" required value="{{$transaction->trans_date}}">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class=" col-sm-4 text-right">Reference</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="reference" class="form-control" value="{{$transaction->reference}}">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class=" col-sm-4 text-right">Description</label>
					        			<div class="col-sm-8">
					        				<textarea class="form-control" name="description" rows="4">{{$transaction->description}}</textarea>
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<div class="col-sm-12">
					        				
					        			</div>
					        		</div>
		                    	</div>
		                    </div>
		                </form>
		                <div class="row">
			                <div class="col-sm-12"> <a href="{{url('inventory/transactions/item/add')}}" class="btn btn-sm btn-primary float-right" style="margin-bottom: 5px;" data-toggle="modal" data-target="#package_item"><i class="fas fa-plus"></i> Add Item </a></div>
			                <div class="table-responsive">
			                	<table class="table">
			                		<thead>
			                			<tr>
			                				<th></th>
			                				<th>Qty</th>
			                				<th>Item ID</th>
			                				<th>Item Name</th>
			                				<th>Unit Amount</th>
			                				<th>Location</th>
			                			</tr>
			                		</thead>
			                		<tbody>
			                			@foreach($transaction->inventory_items as $item)
			                			<tr>
			                				<td><a href="{{ url('/inventory/transactions/edit/'.$transaction->id.'?item_no='.$item->item->id.'&transaction_item_id='.$item->id) }}" class="btn btn-sm"><i class="fas fa-edit text-warning"></i></a></td>
			                				<td>{{$item->qty}}</td>
			                				<td>{{$item->item->sku}}</td>
			                				<td>{{$item->item->name}}</td>
			                				<td>{{$item->unit_amount}}</td>
			                				<td></td>
			                			</tr>
			                			@endforeach
			                		</tbody>
			                	</table>
			                </div>
			            </div>
		            @endif
                </div>
            </div>
        </div>
    </div>
</main>
<style type="text/css">ul.ui-autocomplete { z-index: 1100; } .row{ line-height: 30px; }</style>
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
        				<input type="text" class="form-control search_inventory_trans" name="search_input">
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