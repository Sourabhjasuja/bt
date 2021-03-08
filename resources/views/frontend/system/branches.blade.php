@extends('frontend.layout')
@section('title', 'System Setup')
@section('content')

<main class="content">
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<h6>Branches <a href="{{url('system/branch/add')}}" class="float-right btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add New Branch</a></h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table simpleDataTable">
							<thead>
								<th>Sr No#</th>
								<th>Name</th>
								<th></th>
							</thead>
							<tbody>
								@foreach($branches as $key=>$branch)
								<tr>
									<td>{{$key+1}}</td>
									<td><a href="{{ url('/users/edit/'.$branch->id) }}">{{ $branch->branch_name }}</a></td>
									<td></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
	  			</div>
			</div>
		</div>
	</div>
  	
</main>


@endsection