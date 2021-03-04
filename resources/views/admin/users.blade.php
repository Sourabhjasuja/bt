@extends('admin.layout')
@section('title', 'Users')
@section('content')


<div class="page-inner">
    <div class="page-title">
        <h3>Users</h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Users</li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="row">
            
            <div class="col-sm-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Users List</h4>
                    </div>
                    @if(session()->has('message.level'))
                        <div class="alert alert-{{ session('message.level') }}"> 
                        {!! session('message.content') !!}
                        </div>
                    @endif
                    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
                    <div class="panel-body">
                       <div class="table-responsive">
                        <a href="?export=all" class="btn btn-rounded btn-primary">Export All Users</a>
                        <table class="display table simpleDataTable" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Company Name</th>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>City</th>
                                    <th>Phone No</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($users as $key => $customer)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $customer->company_name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->first_name.' '.$customer->last_name }}</td>
                                        <td>{{ $customer->city }}</td>
                                        <td>{{ $customer->phone_no }}</td>
                                        <td>@if($customer->status) Disabled @else Active @endif</td>
                                        <td>
                                            <a href="{{ url('admin/user/edit/'.$customer->id) }}" class="btn btn-rounded btn-warning">
                                                <i class="fa fa-search">Edit</i>
                                            </a>&nbsp;
                                            <a href="{{url('/admin/users?d='.$customer->id)}}" class="btn btn-rounded btn-danger confirmdel">
                                                <i class="fa fa-close">Delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                           </table>  
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Row -->
        
    </div><!-- Main Wrapper -->
   
@endsection