@extends('frontend.layout')
@section('title', 'User Activity')
@section('content')

<main class="content">
	<div class="row">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header">
					<h6>User Activity</h6>
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
								<th>Logout</th>
								<th>User Name (Login Name)</th>
								<th>Last Login</th>
								<th>Last Logout</th>
								<th></th>
							</thead>
							<tbody>
								@foreach($users as $key=>$user)
								<tr>
									<td><a href="javascript:void(0)" onclick="logout('{{$user->id}}')"><i class="fas fa-users"></i></a></td>
									<td>{{ $user->first_name.' '.$user->last_name }} ({{ $user->login_name }})</td>
									<td>@if($user->sessions) {{date('Y-m-d H:i:s', strtotime($user->sessions->created_at))}} @endif</td>
									<td>@if($user->sessions) {{date('Y-m-d H:i:s', $user->sessions->last_activity)}} @endif</td>
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
<script type="text/javascript">
	function logout(id){
		if(confirm('Are you sure you want to logout this user')){
			window.location.href='?logout='+id;
		}
	}
</script>

@endsection
