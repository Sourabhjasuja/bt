@extends('frontend.layout')
@section('title', 'Inventory')
@section('content')

<main class="content">
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<h6>Inventory <a href="{{url('inventory/add')}}" class="float-right btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add New </a></h6>
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
								@foreach($inventory as $key=>$product)
								<tr>
									<td>{{$key+1}}</td>
									<td><a href="{{ url('/inventory/edit/'.$product->id) }}">{{ $product->name }}</a></td>
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