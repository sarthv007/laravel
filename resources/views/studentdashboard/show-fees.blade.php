@extends('studentdashboard.layouts.main')

@section('content')
@include('studentdashboard.layouts.nav')
<div id="wrapper">
@include('studentdashboard.layouts.sidebar')

<div id="content-wrapper">
      <div class="container-fluid">
          <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Student Fees Details
            <div style="float: right;">
            <a href="javascript:void(0)" onclick="printDiv('pritMe');" class="btn btn-primary"><i class="fa fa-print"></i> &nbsp;Print</a>
          </div>

        </div>
            
            
          <div class="card-body pritMe">
            <div class="table-responsive">
              @if(session()->has('success'))
              <div class="alert alert-success">
                  {{ session()->get('success') }}
              </div>
            @endif

              <table class="table table-bordered" id="1" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Full Name</th>
                    <td>{{auth()->user()->first_name." ".auth()->user()->last_name}}</td>
                  </tr>

                  <tr>
                    <th>Adhar Number</th>
                    <td>{{auth()->user()->adhar_number}}</td>
                  </tr>

                  <tr>
                    <th>Contact Number</th>
                    <td>{{auth()->user()->phone}}</td>
                  </tr>

                  <tr>
                    <th>Email Address</th>
                    <td>{{auth()->user()->email}}</td>
                  </tr>

                  <tr>
                    <th>Branch Name</th>
                    <td>
                      <?php 
                      $user = \App\Branch::find(auth()->user()->branch);
                      
                      ?>
                      {{$user->name}}
                    </td>

                    <tr>
                      <th>Year</th>
                      <td>{{auth()->user()->year}}</td>
                    </tr>

                    <tr>
                      <th>Course Type</th>
                      <td>{{ $data['fees']->courseType }}</td>
                    </tr>

                    <tr>
                      <th>Tution Fees</th>
                      <td>{{ $data['fees']->tution_fees }}</td>
                    </tr>

                    <tr>
                      <th>Development Fees</th>
                      <td>{{ $data['fees']->development_fees }}</td>
                    </tr>

                    <tr>
                      <th>Total Fees</th>
                      <td><strong>{{ $data['fees']->total_fees }}</strong></td>
                    </tr>

                    <tr>
                      <th>Fees Status</th>
                      <td><strong>{{ $data['feesStatus']->status }}</strong></td>
                    </tr>
                  
                  </thead>
                </table>
              
              
            </div>
          </div>
        </div>

      </div>
    

</div>
 @endsection