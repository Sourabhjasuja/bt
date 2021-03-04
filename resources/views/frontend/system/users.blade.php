@extends('frontend.layout')
@section('title', 'Sytem Setup')
@section('content')

<main class="content">
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<h6>User Group <a href="{{url('system/users/add')}}" class="float-right btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add New User</a></h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table simpleDataTable">
							<thead>
								<th>Sr No#</th>
								<th>Name</th>
								<th>Email</th>
								<th>User Group</th>
								<th></th>
							</thead>
							<tbody>
								@foreach($users as $key=>$user)
								<tr>
									<td>{{$key+1}}</td>
									<td><a href="{{ url('/users/edit/'.$user->id) }}">{{ $user->first_name }}</a></td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->user_group->name }}</td>
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