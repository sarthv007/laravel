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
            Salary Details
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
                    <td>{{ ucfirst($data['salary']->first_name." ". $data['salary']->last_name) }}</td>
                  </tr>

                  <tr>
                    <th>Joining Date</th>
                    <td>{{$data['salary']->joining_date}}</td>
                  </tr>


                  <tr>
                    <th>Basic Salary</th>
                    <td><strong>{{(int)$data['salary']->salary}}/-</strong></td>
                  </tr>

                  <tr>
                    <th>Total DA</th>
                    <td>{{ (int)$data['salary']->total_da}}</td>
                  </tr>

                  <tr>
                    <th>Total HRA</th>
                    <td>{{(int)$data['salary']->total_hra}}</td>
                  </tr>
                  
                  <tr>
                    <th>Total AGP</th>
                    <td>{{(int)$data['salary']->agp}}</td>
                  </tr>

                  <tr>
                    <th>DA %</th>
                    <td>{{ (int)$data['salary']->da_percent }}</td>
                  </tr>

                  <tr>
                    <th>HRA %</th>
                    <td>{{ (int)$data['salary']->hra_percent}}</td>
                  </tr>
                  
                  <tr>
                    <th>Gross Salary</th>
                    <td><strong>{{(int)$data['salary']->gross_salary}}</strong> /-</td>
                  </tr>
                  
                  </tr>
                </thead>
               </tbody>
              </table>
            </div>
          </div>
          
        </div>

      </div>
    

</div>
 @endsection