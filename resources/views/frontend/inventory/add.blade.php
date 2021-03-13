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
  			<form>
	  			<div class="tab">
			      	<ul class="nav nav-tabs" role="tablist">
			        	<li class="nav-item"><a class="nav-link active" href="#tab-1" data-toggle="tab" role="tab">Item</a></li>
			        	<li class="nav-item"><a class="nav-link" href="#tab-2" data-toggle="tab" role="tab">Serial Nos.</a></li>
			        	<li class="nav-item"><a class="nav-link" href="#tab-3" data-toggle="tab" role="tab">Pricing</a></li>
			        	<li class="nav-item"><a class="nav-link" href="#tab-4" data-toggle="tab" role="tab">Package</a></li>
			        	<li class="nav-item"><a class="nav-link" href="#tab-5" data-toggle="tab" role="tab">Documents</a></li>
			        	<li class="nav-item"><a class="nav-link" href="#tab-6" data-toggle="tab" role="tab">History</a></li>
			      	</ul>
			      	<div class="tab-content">
			        	<div class="tab-pane active" id="tab-1" role="tabpanel">
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
						        				<option value="1">Basic</option>
						        				<option value="2">Generic</option>
						        				<option value="3">Non-Serialized</option>
						        				<option value="4">Package</option>
						        				<option value="5">Serialized</option>
						        			</select>
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Item Group</label>
					        			<div class="col-sm-8">
						        			<select class="form-control" name="item_group">
						        				<option value="0">[None]</option>
												<option value="8">Aids to Living</option>
												<option value="9">Ambulatory Aids</option>
												<option value="10">Bathroom Aids</option>
												<option value="52">BATTERY</option>
												<option value="11">Beds</option>
												<option value="45">Beds - Components</option>
												<option value="1">Beds - Specialty</option>
												<option value="51">BIPAP</option>
												<option value="12">Breast Pumps</option>
												<option value="15">CPAP/BiLevel</option>
												<option value="16">CPAP/BiLevel Supplies</option>
												<option value="17">CPM - Equipment</option>
												<option value="46">CPM - Supplies</option>
												<option value="18">Decubitis Care</option>
												<option value="47">Diabetic - Glucose Monitors</option>
												<option value="19">Diabetic - Supplies</option>
												<option value="20">Enteral - Nutrients</option>
												<option value="21">Enteral - Pumps</option>
												<option value="22">Enteral - Supplies</option>
												<option value="24">HME - Incontinence Products</option>
												<option value="28">HME - Lymphedema Pumps</option>
												<option value="30">HME - Misc</option>
												<option value="35">HME - Patient Lifts</option>
												<option value="44">HME - Walkers</option>
												<option value="25">Infusion - Pumps</option>
												<option value="26">Infusion - Supplies</option>
												<option value="6">IV Group</option>
												<option value="34">Orthopedics</option>
												<option value="13">Oxygen - Concentrators</option>
												<option value="14">Oxygen - Consv Devices</option>
												<option value="23">Oxygen - Gaseous</option>
												<option value="27">Oxygen - Liquid</option>
												<option value="36">Oxygen - Pulse Oximeters</option>
												<option value="48">Oxygen - Supplies</option>
												<option value="37">Respiratory - Medications</option>
												<option value="31">Respiratory - Misc.</option>
												<option value="32">Respiratory - Nebulizers</option>
												<option value="2">Respiratory - Suction</option>
												<option value="29">Supplies - Medical/Surgical</option>
												<option value="33">Supplies - Occupational Therapy</option>
												<option value="38">Tens</option>
												<option value="41">Urologicals</option>
												<option value="39">Wheelchair Accessories</option>
												<option value="40">Wheelchairs - Manual</option>
												<option value="43">Wheelchairs - Power</option>
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
					        			<label class="col-sm-4 text-right">Coverage Type</label>
					        			<div class="col-sm-8">
						        			<select class="form-control" name="coverage_type" required>
						        				<option value="0">[None]</option>
						        				<option value="1">DME</option>
						        				<option value="2">Major Medical</option>
						        			</select>
						        		</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Weight</label>
					        			<div class="col-sm-8">
						        			<input type="text" name="weight" class="form-control">
						        		</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right required">Status</label>
					        			<div class="col-sm-8">
						        			<select class="form-control" name="coverage_type" required>
						        				<option value="0">[None]</option>
						        				<option value="1">Active</option>
						        				<option value="2">Discontinued</option>
						        				<option value="3">Superceded</option>
						        				<option value="4">Obsolete</option>
						        			</select>
						        		</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Service Cat</label>
					        			<div class="col-sm-8">
						        			<input type="text" name="service_cat" class="form-control">
						        		</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Prior System Key</label>
					        			<div class="col-sm-8">
					        				<div class="form-check">
					        					<input type="checkbox" name="prior_system[]" value="5" class="form-check-input" id="exampleCheck5">
    											<label class="form-check-label" for="exampleCheck5">Lotted</label>
					        				</div>
					        				<div class="form-check">
					        					<input type="checkbox" name="prior_system[]" value="1" class="form-check-input" id="exampleCheck1">
    											<label class="form-check-label" for="exampleCheck1">Kit Item</label>
					        				</div>
						        			<div class="form-check">
	    										<input type="checkbox" name="prior_system[]" value="2" class="form-check-input" id="exampleCheck2">
	    										<label class="form-check-label" for="exampleCheck2">Auto Re-order</label>
    										</div>
    										<div class="form-check">
	    										<input type="checkbox" name="prior_system[]" value="3" class="form-check-input" id="exampleCheck3">
	    										<label class="form-check-label" for="exampleCheck3">Exclude from Purchase Order</label>
    										</div>
    										<div class="form-check">
	    										<input type="checkbox" name="prior_system[]" value="4" class="form-check-input" id="exampleCheck4">
	    										<label class="form-check-label" for="exampleCheck4">Exclude from Sales Order</label>
    										</div>
						        		</div>
					        		</div>
			        			</div>
			        			
			        			<div class="col-sm-4">
			        				<div class="form-group row">
					        			<label class="col-sm-4 text-center">Manufacturer</label>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Name</label>
					        			<div class="col-sm-8">
						        			<select name="manufacturer_name" class="form-control">
												<option selected="selected" value="0">[None]</option>
												<option value="114">AirSep</option>
												<option value="118">DRIVE</option>
												<option value="116">Guardian</option>
												<option value="105">Invacare</option>
												<option value="292">LOT#______________________________________________</option>
												<option value="120">MABIS DMI</option>
												<option value="336">MAKE:____________________MODEL:_______________</option>
												<option value="337">MAKE:____________________MODEL:_______________SIZE</option>
												<option value="132">MAKE:__________________MODEL:__________________HRS</option>
												<option value="119">MEDLINE</option>
												<option value="129">PRIDE</option>
												<option value="121">PROBASICS</option>
												<option value="111">ResMed</option>
												<option value="108">Respironics</option>
												<option value="112">Ross Labs</option>
												<option value="109">Salter Labs</option>
												<option value="307">SN#_______________________________________________</option>
											</select>
						        		</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">ID</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="manufacturer_id" class="form-control">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Bar Code</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="manufacturer_bar_code" class="form-control">
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
					        				<input type="text" name="user_data_{{$i}}" class="form-control">
					        			</div>
					        		</div>
					        		@endfor
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-center">Item Pricing</label>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Proc Code</label>
					        			<div class="col-sm-6">
					        				<input type="text" name="proc_code" class="form-control">
					        			</div>
					        			<div class="col-sm-2">
					        				<a href="javascript:void(0)" class="btn btn-sm"><i class="fa fa-search"></i></a><a href="javascript:void(0)" class="btn btn-sm"><i class="fa fa-trash"></i></a>
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Rental Amount</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="rental_amount" class="form-control">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Purchase Amount</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="purchase_amount" class="form-control">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">Default Billing Multiplier</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="default_billing_multiplier" class="form-control">
					        			</div>
					        		</div>
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
			    <div class="form-group row float-right">
			    	<input type="submit" name="" class="btn btn-primary" value="Save">
			    </div>
		    </form>	
  		</div>
  	</div>
  </div>
</main>

@endsection