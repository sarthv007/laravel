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

              @if(count($payments) >0)
              <table class="table table-bordered" id="1" width="100%" cellspacing="0">
                <thead>
                  
                  <tr>
                    <th>Full Name</th>
                    <td>{{ ucfirst(isset($payments->user->first_name)." ". isset($payments->user->last_name)) }}</td>
                  </tr>

                  <tr>
                    <th>Joining Date</th>
                    <td>{{isset($payments->user->joining_date)}}</td>
                  </tr>


                  <tr>
                    <th>Basic Salary</th>
                    <td><strong>{{(int)isset($payments->user->salary)}}/-</strong></td>
                  </tr>

                  
                  
                  <tr>
                    <th>Total AGP</th>
                    <td>{{(int)isset($payments->user->agp)}}</td>
                  </tr>

                  <tr>
                    <th>DA %</th>
                    <td>{{ (int)isset($payments->user->da_percent) }}</td>
                  </tr>

                  <tr>
                    <th>HRA %</th>
                    <td>{{ (int)isset($payments->user->hra_percent)}}</td>
                  </tr>

                  <tr style="border:none;">
                    <td>Deductions</td>
                    <td></td>
                  </tr>

                  <tr>
                    <th>PF Deduction</th>
                    <td>{{ (int)isset($payments->pf_deduction)}}</td>
                  </tr>
                  
                  
                  <tr>
                    <th>Professional tax</th>
                    <td>{{ (int)isset($payments->prof_tax_deduction)}}</td>
                  </tr>

                  <tr>
                    <th>Net Salary</th>
                    <td><strong>{{(int)isset($payments->net_salary)}}</strong> /-</td>
                  </tr>
                  
                  </tr>
                </thead>
               </tbody>
              </table>
              @endif
            </div>
          </div>
          
        </div>

      </div>
    

</div>
 @endsection