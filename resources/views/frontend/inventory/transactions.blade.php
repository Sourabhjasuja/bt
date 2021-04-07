@extends('frontend.layout')
@section('title', 'Purchase Transactions')
@section('content')

<main class="content">
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<h6>Purchase Transactions <span class="float-right"> <a href="{{url('inventory/transactions/add')}}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add New </a></span></h6>
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
								<th></th>
								<th>Trans. ID#</th>
								<th>Reference</th>
								<th>Date Created</th>
								
							</thead>
							<tbody>
								@foreach($transactions as $key=>$transaction)
								<tr>
									<td><a href="{{ url('/inventory/transactions/edit/'.$transaction->id) }}" class="btn btn-sm"><i class="fas fa-edit text-warning"></i></a></td>
									<td><a href="{{ url('/inventory/transactions/edit/'.$transaction->id) }}">{{$transaction->id}}</a></td>
									<td>{{$transaction->reference}}</td>
									<td>{{date('m/d/Y', strtotime($transaction->trans_date))}}</td>
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