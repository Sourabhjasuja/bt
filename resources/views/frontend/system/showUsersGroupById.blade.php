@extends('frontend.layout')
@section('title', 'Sytem Setup')
@section('content')
<main class="content">
  <div class="col-lg-8">
  	<div class="card">
  		<div class="card-header">
  			<h6>{{ $group->name }}</h6>
  		</div>
  		<div class="card-body">
  		<form method="post">@csrf
  			<div class="tab">
		      	<ul class="nav nav-tabs" role="tablist">
		        	<li class="nav-item"><a class="nav-link active" href="#tab-1" data-toggle="tab" role="tab">Main</a></li>
		        	<li class="nav-item"><a class="nav-link" href="#tab-2" data-toggle="tab" role="tab">Permissions</a></li>
		        	<li class="nav-item"><a class="nav-link" href="#tab-5" data-toggle="tab" role="tab">Security</a></li>
		        	<li class="nav-item"><a class="nav-link" href="#tab-3" data-toggle="tab" role="tab">Document Management</a></li>
		        	<li class="nav-item"><a class="nav-link" href="#tab-4" data-toggle="tab" role="tab">History</a></li>
		        	
		      	</ul>
		      	
		      	<div class="tab-content">
			        	<div class="tab-pane active" id="tab-1" role="tabpanel">
			        		<div class="row">
			        			<div class="col-sm-6">
			        				<div class="form-group row">
					        			<label class="required col-sm-4 text-right">Name</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="name" class="form-control" required value="{{$group->name}}">
					        			</div>
					        		</div>
			        				<div class="form-group row">
					        			<label class="col-sm-4 text-right">Description</label>
					        			<div class="col-sm-8">
					        				<textarea class="form-control" name="description" rows="4">{{$group->description}}</textarea>
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-center">Alerts</label>
					        		</div>
					        		<div class="form-group row justify-content-md-center">
					        			<label class="col-sm-7"><input type="checkbox" name="eclaims" value="1" @if($group->alert_eclaim) checked @endif> eClaims</label>
					        			<label class="col-sm-7"><input type="checkbox" name="billing" value="1" @if($group->alert_billing) checked @endif> Billing</label>
					        			<label class="col-sm-7"><input type="checkbox" name="cmn" value="1" @if($group->alert_cmn) checked @endif> CMN</label>
					        		</div>
			        			</div>
			        			<div class="col-sm-6">
			        				<div class="form-group row">
					        			<label class="col-sm-4 text-center">Access Control</label>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4 text-right">IP Address</label>
					        			<div class="col-sm-8">
					        				<input type="text" name="ip_address" class="form-control" value="{{$group->ip_address}}">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4"><input type="checkbox" checked name="monday_checkbox" value="1"> Monday</label>
					        			<div class="col-sm-8">
					        				<label>From</label>
					        				<input type="text" name="monday_starttime" class="timepicker" style="width: 90px;" value="{{ unserialize($group->monday_time)['start'] }}">
					        				<label>To</label>
					        				<input type="text" name="monday_endtime" class="timepicker" style="width: 88px;" value="{{ unserialize($group->monday_time)['end'] }}">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4"><input type="checkbox" checked name="eclaims" value="1"> Tuesday</label>
					        			<div class="col-sm-8">
					        				<label>From</label>
					        				<input type="text" name="tuesday_starttime" class="timepicker" style="width: 90px;" value="{{ unserialize($group->tuesday_time)['start'] }}">
					        				<label>To</label>
					        				<input type="text" name="tuesday_endtime" class="timepicker" style="width: 88px;" value="{{ unserialize($group->tuesday_time)['end'] }}">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4"><input type="checkbox" checked name="eclaims" value="1"> Wednesday</label>
					        			<div class="col-sm-8">
					        				<label>From</label>
					        				<input type="text" name="wednesday_starttime" class="timepicker" style="width: 90px;" value="{{ unserialize($group->wednesday_time)['start'] }}">
					        				<label>To</label>
					        				<input type="text" name="wednesday_endtime" class="timepicker" style="width: 88px;" value="{{ unserialize($group->wednesday_time)['end'] }}">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4"><input type="checkbox" checked name="eclaims" value="1"> Thursday</label>
					        			<div class="col-sm-8">
					        				<label>From</label>
					        				<input type="text" name="thursday_starttime" class="timepicker" style="width: 90px;" value="{{ unserialize($group->thursday_time)['start'] }}">
					        				<label>To</label>
					        				<input type="text" name="thursday_endtime" class="timepicker" style="width: 88px;" value="{{ unserialize($group->thursday_time)['end'] }}">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4"><input type="checkbox" checked name="eclaims" value="1"> Friday</label>
					        			<div class="col-sm-8">
					        				<label>From</label>
					        				<input type="text" name="friday_starttime" class="timepicker" style="width: 90px;" value="{{ unserialize($group->friday_time)['start'] }}">
					        				<label>To</label>
					        				<input type="text" name="friday_endtime" class="timepicker" style="width: 88px;" value="{{ unserialize($group->friday_time)['end'] }}">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4"><input type="checkbox" checked name="eclaims" value="1"> Saturday</label>
					        			<div class="col-sm-8">
					        				<label>From</label>
					        				<input type="text" name="saturday_starttime" class="timepicker" style="width: 90px;" value="{{ unserialize($group->saturday_time)['start'] }}">
					        				<label>To</label>
					        				<input type="text" name="saturday_endtime" class="timepicker" style="width: 88px;" value="{{ unserialize($group->saturday_time)['end'] }}">
					        			</div>
					        		</div>
					        		<div class="form-group row">
					        			<label class="col-sm-4"><input type="checkbox" checked name="eclaims" value="1"> Sunday</label>
					        			<div class="col-sm-8">
					        				<label>From</label>
					        				<input type="text" name="sunday_starttime" class="timepicker" style="width: 90px;" value="{{ unserialize($group->sunday_time)['start'] }}">
					        				<label>To</label>
					        				<input type="text" name="sunday_endtime" class="timepicker" style="width: 88px;" value="{{ unserialize($group->sunday_time)['end'] }}">
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
									@foreach($group->group_permissions as $key=>$group_permission)
					                    <tr>
								    		<td>{{$group_permission->permission->permission_name}}</td>
								    		<td>
								    			<select id="{{$group_permission->permission_id}}" name="permissions[{{$group_permission->permission_id}}]">
								    				<option @if($group_permission->access == 'FullAccess') selected @endif value="FullAccess" >FullAccess</option>
												    <option @if($group_permission->access == 'ReadOnly') selected @endif value="ReadOnly">ReadOnly</option>
												    <option @if($group_permission->access == 'Denied') selected @endif value="Denied">Denied</option>
											  	</select>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
			        	</div>
			        	<div class="tab-pane" id="tab-5" role="tabpanel">
				 			<div class="form-group row">
				 				@foreach($group->security as $security)
			        			<label class="col-sm-7"><input type="checkbox" name="security[{{$security->security->id}}]" @if($security->access) checked @endif> {{$security->security->name}}</label>
			        			@endforeach
			        		</div>
						</div>
			        	<div class="tab-pane" id="tab-3" role="tabpanel">
			          		<table class="table">
			          			<thead>
									<th>Permission</th>
									<th>Access</th>
								</thead>
								<tbody>
									@foreach($group->doc_permissions as $key=>$group_permission)
					                    <tr>
								    		<td>{{$group_permission->permission->doc_permission_name}}</td>
								    		<td>
								    			<select  id="{{$group_permission->doc_permission_id}}" name="doc_permissions[{{$group_permission->doc_permission_id}}]">
								    				<option @if($group_permission->access == 'FullAccess') selected @endif value="FullAccess" >FullAccess</option>
												    <option @if($group_permission->access == 'ReadOnly') selected @endif value="ReadOnly">ReadOnly</option>
												    <option @if($group_permission->access == 'Denied') selected @endif value="Denied">Denied</option>
											  	</select>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
			          	</div>
			        	
			        	<div class="tab-pane" id="tab-4" role="tabpanel">
			          		<table class="table">
			          			<thead>
			          				<tr>
			          					<th>Date Changed</th>
			          					<th>Changed By</th>
			          					<th>Changed</th>
			          				</tr>
			          			</thead>
			          			<tbody>
			          				@foreach($group->activity as $activity)
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
      		      	<div class="form-group float-right">
			    		<input type="submit" name="" class="btn btn-primary" value="Save">
			    	</div>
      		    </div>
      		        
      		</form>
      		</div>
      		
      	</div>
  </div> 
</main>
@endsection     		       

