@extends('frontend.layout')
@section('title', 'Inventory')
@section('content')

<main class="content">
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<h6>Inventory <span class="float-right"><a href="{{url('inventory/transactions')}}" class="btn btn-sm btn-primary">Transactions </a> <a href="{{url('inventory/add')}}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add New </a></span></h6>
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
								<th>Item ID#</th>
								<th>Item Name</th>
								
							</thead>
							<tbody>
								@foreach($inventory as $key=>$product)
								<tr>
									<td><a href="{{ url('/inventory/edit/'.$product->id) }}" class="btn btn-sm"><i class="fas fa-edit text-warning"></i></a><a href="javascript:void(0)" class="btn btn-sm" onclick="delConfirm('{{ $product->id }}')"><i class="fas fa-trash text-danger"></i></a></td>
									<td>{{$product->sku}}</td>
									<td><a href="{{ url('/inventory/edit/'.$product->id) }}">{{ $product->name }}</a></td>
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