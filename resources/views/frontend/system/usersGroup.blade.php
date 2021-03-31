@extends('frontend.layout')
@section('title', 'Sytem Setup')
@section('content')

<main class="content">
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<h6>User Group <a href="{{url('system/users/group/add')}}" class="float-right btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add New Group</a></h6>
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
								<th></th>
							</thead>
							<tbody>
								@foreach($userGroups as $key=>$group)
								<tr>
									<td>{{$key+1}}</td>
									<td><a href="{{ url('/system/users/group/'.$group->id) }}">{{ $group->name }}</a></td>
									<td><a href="{{ url('/system/users/group/'.$group->id) }}" class="btn btn-sm"><i class="fas fa-edit text-warning"></i></a> <a href="javascript:void(0)" class="btn btn-sm" onclick="delConfirm('{{ $group->id }}')"><i class="fas fa-trash text-danger"></i></a></td>
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