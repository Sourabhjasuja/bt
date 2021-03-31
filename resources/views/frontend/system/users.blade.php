@extends('frontend.layout')
@section('title', 'System Setup')
@section('content')

<main class="content">
	<div class="row">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header">
					<h6>Users <a href="{{url('system/users/add')}}" class="float-right btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add New User</a></h6>
				</div>
				<div class="card-body">
					@if(session()->has('message.level'))
                        <div class="alert alert-{{ session('message.level') }}">
                        {!! session('message.content') !!}
                        </div>
                    @endif
					<div class="table-responsive">
						<table class="table simpleDataTable">
							<thead>
								<th>Sr No#</th>
								<th>Name</th>
								<th>Email</th>
								<th>Login Name</th>
								<th>User Group</th>
								<th></th>
							</thead>
							<tbody>
								@foreach($users as $key=>$user)
								<tr>
									<td>{{$key+1}}</td>
									<td><a href="{{ url('/system/users/edit/'.$user->id) }}">{{ $user->first_name }}</a></td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->login_name }}</td>
									<td>{{ $user->user_group_name->name }}</td>
									<td><a href="{{ url('/system/users/edit/'.$user->id) }}" class="btn btn-sm"><i class="fas fa-edit text-warning"></i></a> <a href="javascript:void(0)" class="btn btn-sm" onclick="delConfirm('{{ $user->id }}')"><i class="fas fa-trash text-danger"></i></a></td>
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
