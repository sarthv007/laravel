@extends('layouts.main')

@section('content')
@include('layouts.nav')
<div id="wrapper">
@include('layouts.sidebar')

<div id="content-wrapper">
      <div class="container-fluid">
      		<!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Payment List
            
        </div>
            
            
          <div class="card-body">
          	<div class="table-responsive">
            	@if(session()->has('success'))
		          <div class="alert alert-success">
		              {{ session()->get('success') }}
		          </div>
		        @endif

              
              
              <table class="table table-bordered" id="1" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>Basic Salary</th>
                    <th>Total Leaves</th>
                    <th>PF Deduction</th>
                    <th>Professional Tax Deduction</th>
                    <th>PF Deduction</th>
                    <th>Total Net Salary</th>
                  </tr>
                </thead>
               
                <tbody>
                  @foreach($data['payments'] as $payment)
                  <tr>
                    <td>{{$payment->id }}</td>
                    <td>{{$payment->user->first_name." ".$payment->user->last_name }}</td>
                    <td>{{(int)$payment->user->salary }}</td>
                    <td>{{$payment->total_leaves }}</td>
                    <td>{{$payment->pf_deduction }}</td>
                    <td>{{$payment->prof_tax_deduction }}</td>
                    <td>{{$payment->net_salary }} /-</td>
                    <td>{{$payment->created_at }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
    

</div>
 @endsection