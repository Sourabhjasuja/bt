  @extends('frontend.layout')
@section('title', 'Add User Group')
@section('content')

<main class="content">
  <div class="col-lg-8">
  	<div class="card">
  		<div class="card-header">
  			<h6>Add User Group</h6>
  		</div>
  		<div class="card-body">
  			<form method="post">@csrf
	  			<div class="tab">
			      	<ul class="nav nav-tabs" role="tablist">
			        	<li class="nav-item"><a class="nav-link active" href="#tab-1" data-toggle="tab" role="tab">Main</a></li>
			        	<li class="nav-item"><a class="nav-link" href="#tab-2" data-toggle="tab" role="tab">Permissions</a></li>
			        	<li class="nav-item"><a class="nav-link" href="#tab-3" data-toggle="tab" role="tab">Security</a></li>
			        	<li class="nav-item"><a class="nav-link" href="#tab-4" data-toggle="tab" role="tab">Documents</a></li>
			        	
			      	</ul>
			      	<div class="tab-content">
			        	<div class="tab-pane active" id="tab-1" role="tabpanel">
			        		<div class="row">
			        			<div class="col-sm-6">
			        				<div class="form-group row">
					        			<label class="required col-sm-4 text-right">Name</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="name" class="form-control" required>
					        			</div>
					        		</div>
			        				<div class="form-group row">
					        			<label class="col-sm-4 text-right">Description</label>
					        			<div class="col-sm-8">
					        				<textarea class="form-control" name="description" rows="4"></textarea>
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-center">Alerts</label>
					        		</div>
					        		<div class="form-group row justify-content-md-center">
					        			<label class="col-sm-7"><input type="checkbox" name="eclaims" value="1"> eClaims</label>
					        			<label class="col-sm-7"><input type="checkbox" name="billing" value="1"> Billing</label>
					        			<label class="col-sm-7"><input type="checkbox" name="cmn" value="1"> CMN</label>
					        		</div>
			        			</div>
			        			<div class="col-sm-6">
			        				<div class="form-group row">
					        			<label class="col-sm-4 text-center">Access Control</label>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">IP Address</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="ip_address" class="form-control" value="*.*.*.*">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4"><input type="checkbox" name="eclaims" value="1" checked> Monday</label>
					        			<div class="col-sm-8">
					        				<label>From</label>
					        				<input type="text" name="" class="timepicker" style="width: 90px;" value="12:00 Am">
					        				<label>To</label>
					        				<input type="text" name="" class="timepicker" style="width: 88px;" value="11:59 Pm">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4"><input type="checkbox" name="eclaims" value="1" checked> Tuesday</label>
					        			<div class="col-sm-8">
					        				<label>From</label>
					        				<input type="text" name="" class="timepicker" style="width: 90px;" value="12:00 Am">
					        				<label>To</label>
					        				<input type="text" name="" class="timepicker" style="width: 88px;" value="11:59 Pm">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4"><input type="checkbox" name="eclaims" value="1" checked> Wednesday</label>
					        			<div class="col-sm-8">
					        				<label>From</label>
					        				<input type="text" name="" class="timepicker" style="width: 90px;" value="12:00 Am">
					        				<label>To</label>
					        				<input type="text" name="" class="timepicker" style="width: 88px;" value="11:59 Pm">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4"><input type="checkbox" name="eclaims" value="1" checked> Thursday</label>
					        			<div class="col-sm-8">
					        				<label>From</label>
					        				<input type="text" name="" class="timepicker" style="width: 90px;" value="12:00 Am">
					        				<label>To</label>
					        				<input type="text" name="" class="timepicker" style="width: 88px;" value="11:59 Pm">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4"><input type="checkbox" name="eclaims" value="1" checked> Friday</label>
					        			<div class="col-sm-8">
					        				<label>From</label>
					        				<input type="text" name="" class="timepicker" style="width: 90px;" value="12:00 Am">
					        				<label>To</label>
					        				<input type="text" name="" class="timepicker" style="width: 88px;" value="11:59 Pm">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4"><input type="checkbox" name="eclaims" value="1" checked> Saturday</label>
					        			<div class="col-sm-8">
					        				<label>From</label>
					        				<input type="text" name="" class="timepicker" style="width: 90px;" value="12:00 Am">
					        				<label>To</label>
					        				<input type="text" name="" class="timepicker" style="width: 88px;" value="11:59 Pm">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4"><input type="checkbox" name="eclaims" value="1" checked> Sunday</label>
					        			<div class="col-sm-8">
					        				<label>From</label>
					        				<input type="text" name="" class="timepicker" style="width: 90px;" value="12:00 Am">
					        				<label>To</label>
					        				<input type="text" name="" class="timepicker" style="width: 88px;" value="11:59 Pm">
					        			</div>
					        		</div>
			        			</div>
			        		</div>
			        		
			        	</div>
			        	<div class="tab-pane" id="tab-2" role="tabpanel">
			                <table class="table">
							<thead>
								<th>Permission</th>
								<th>Access</th>
								
							</thead>
							<tbody>
								@foreach($permissions as $key=>$group)
					                <tr>  
								    	<td>{{$group->permission_name}}</td>
								    	<td>
											<select  id="{{$group->permission_id}}" name="permissions[{{$group->permission_id}}]">
											    <option  value="FullAccess" >FullAccess</option>
											    <option value="ReadOnly">ReadOnly</option>
											    <option selected value="Denied">Denied</option>
											</select>
								    	</td>
									</tr>
								@endforeach	
							</tbody>
							</table>
						</div>		
				 		<div class="tab-pane" id="tab-3" role="tabpanel">
				 			<div class="form-group row">
				 				@foreach($securities as $security)
			        			<label class="col-sm-7"><input type="checkbox" name="security[{{$security->id}}]"> {{$security->name}}</label>
			        			@endforeach
			        		</div>
						</div>
			        
				        <div class="tab-pane" id="tab-4" role="tabpanel">
				            <table class="table">
								<thead>
									<th>Permission</th>
									<th>Access</th>
								</thead>
								<tbody>
									@foreach($doc_permissions as $key=>$group)
						                <tr>
						                	<td>{{$group->doc_permission_name}}</td>
									    	<td>
									    		<select  id="{{$group->doc_permission_id}}" name="doc_permissions[{{$group->doc_permission_id}}]">
												    <option  value="FullAccess" >FullAccess</option>
												    <option value="ReadOnly">ReadOnly</option>
												    <option selected value="Denied">Denied</option>
												  </select>
									    	</td>
										</tr>
									@endforeach
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
