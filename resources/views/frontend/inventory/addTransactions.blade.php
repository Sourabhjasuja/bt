@extends('frontend.layout')
@section('title', 'Add Transactions')
@section('content')

<main class="content">
	<div class="row">
		<div class="col-lg-3">
			<div class="card">
				<div class="card-header">
					<h6>Add Transactions </h6>
				</div>
				<div class="card-body">
					@if(session()->has('message.level'))
                        <div class="alert alert-{{ session('message.level') }}">
                        {!! session('message.content') !!}
                        </div>
                    @endif
                    <form autocomplete="off">
	                    <div class="row">
	                    	<div class="col-sm-12">
	                    		<div class="form-group row">
				        			<label class="required col-sm-4 text-right">Trans. Date</label>
				        			<div class="col-sm-8">
				        				<input type="text" name="trans_date" class="form-control datepicker" required>
				        			</div>
				        		</div>
				        		<div class="form-group row">
				        			<label class=" col-sm-4 text-right">Reference</label>
				        			<div class="col-sm-8">
				        				<input type="text" name="reference" class="form-control">
				        			</div>
				        		</div>
				        		<div class="form-group row">
				        			<label class=" col-sm-4 text-right">Description</label>
				        			<div class="col-sm-8">
				        				<textarea class="form-control" name="description" rows="4"></textarea>
				        			</div>
				        		</div>
				        		<div class="form-group row">
				        			<div class="col-sm-12">
				        				<button type="submit" class="btn btn-sm btn-primary float-right">Add</button>
				        			</div>
				        		</div>
	                    	</div>
	                    </div>
	                </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection