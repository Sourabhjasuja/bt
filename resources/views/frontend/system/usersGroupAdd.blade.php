  @extends('frontend.layout')
@section('title', 'Add User Group')
@section('content')

<main class="content">
  <div class="col-lg-12">
  	<div class="card">
  		<div class="card-header">
  			<h6>Add User Group</h6>
  		</div>
  		<div class="card-body">
  			<form>
	  			<div class="tab">
			      	<ul class="nav nav-tabs" role="tablist">
			        	<li class="nav-item"><a class="nav-link active" href="#tab-1" data-toggle="tab" role="tab">Main</a></li>
			        	<li class="nav-item"><a class="nav-link" href="#tab-2" data-toggle="tab" role="tab">Permissions</a></li>
			        	<li class="nav-item"><a class="nav-link" href="#tab-3" data-toggle="tab" role="tab">Documents</a></li>
			        	<li class="nav-item"><a class="nav-link" href="#tab-4" data-toggle="tab" role="tab">History</a></li>
			      	</ul>
			      	<div class="tab-content">
			        	<div class="tab-pane active" id="tab-1" role="tabpanel">
			        		<div class="form-group">
			        			<label>Name</label>
			        			<input type="text" name="name" class="form-control" required>		
			        		</div>
			        		<div class="form-group">
			        			<label>Description</label>
			        			<textarea class="form-control" name="description" rows="4" required></textarea>
			        		</div>
			        	</div>
			        	<div class="tab-pane" id="tab-2" role="tabpanel">
			                   <table class="table simpleDataTable">
							<thead>
								<th>Permission</th>
								<th>Access</th>
								
							</thead>
							<tbody>
							<div class="form-group">
					                      @foreach($permissions as $key=>$group)
					                       <tr>  
								    
								    	
								    	<td>{{$group->permission_name}}</td>
								    	<td>
								    	
								    	
								    	
								    	        <div class="input-group mb-3">
											  <div class="input-group-prepend">
											    <label class="input-group-text" for="{{$group->permission_id}}"></label>
											  </div>
											  <select class="custom-select" id="{{$group->permission_id}}" name="{{'permission'.$group->permission_id}}"  onsubmit="permissionSelectOnChange(this)">
											    <option  value="FullAccess" >FullAccess</option>
											    <option value="ReadOnly">ReadOnly</option>
											    <option selected value="Denied">Denied</option>
											  </select>
										
											
								    	</td>
	     				                                  
	     				                                    
								    	
								    </div>
								</tr>
								@endforeach
							</div>	
							</tbody>
						</table>
					</div>		
				 
			        
			        <div class="tab-pane" id="tab-3" role="tabpanel">
			                   <table class="table simpleDataTable">
							<thead>
								<th>Permission</th>
								<th>Access</th>
								
							</thead>
							<tbody>
							<div class="form-group">
					                      @foreach($doc_permissions as $key=>$group)
					                       <tr>  
								    
								    	
								    	<td>{{$group->doc_permission_name}}</td>
								    	<td>
								    	
								    	
								    	
								    	        <div class="input-group mb-3">
											  <div class="input-group-prepend">
											    <label class="input-group-text" for="{{$group->doc_permission_id}}"></label>
											  </div>
											  <select class="custom-select" id="{{$group->doc_permission_id}}" name="{{'doc_permission'.$group->doc_permission_id}}"  onsubmit="permissionSelectOnChange(this)">
											    <option  value="FullAccess" >FullAccess</option>
											    <option value="ReadOnly">ReadOnly</option>
											    <option selected value="Denied">Denied</option>
											  </select>
										
											
								    	</td>
	     				                                  
	     				                                    
								    	
								    </div>
								</tr>
								@endforeach
							</div>	
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
<script>
function permissionSelectOnChange(elem) {
    d = document.getElementsByTagName("select").value;
    alert(elem.name);
}
</script>

 
@endsection
