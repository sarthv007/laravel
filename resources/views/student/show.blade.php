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
            Student Details
            <div style="float: right;">
	      		<a href="javascript:void(0)" onclick="window.print();" class="btn btn-primary"><i class="fa fa-print"></i> &nbsp;Print</a>
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
                    <th>Username</th>
                    <td>{{$data['student']->username}}</td>
                  </tr>

                  <tr>
                    <th>Password</th>
                    <td>{{$data['student']->password_show}}</td>
                  </tr>  

                  <tr>
                    <th>Roll Number</th>
                    <td>{{$data['student']->roll_number}}</td>
                  </tr>

                  <tr>
                    <th>First Name</th>
                    <td>{{$data['student']->first_name}}</td>
                  </tr>

                  <tr>
                    <th>Last Name</th>
                    <td>{{$data['student']->last_name}}</td>
                  </tr>

                  <tr>
                    <th>Father Name</th>
                    <td>{{$data['student']->father_name}}</td>
                  </tr>

                  <tr>
                    <th>Mother Name</th>
                    <td>{{$data['student']->mother_name}}</td>
                  </tr>


                  <tr>
                    <th>Email</th>
                    <td>{{$data['student']->email}}</td>
                  </tr>

                  <tr>
                    <th>Contact Number</th>
                    <td>{{$data['student']->phone}}</td>
                  </tr>

                  <tr>
                    <th>Gender</th>
                    <td>{{$data['student']->gender}}</td>
                  </tr>

                  <tr>
                    <th>Photo</th>
                    <td>
                      <img style="margin:10px;border:1px solid silver;width: 40px;height: 40px;" src="{{ asset('storage/'.$data['student']->profile_image) }}">
                    </td>
                  </tr>

                  <tr>
                    <th>Branch</th>
                    <td><?php 
                        $branchCount = App\Branch::where('id','=',$data['student']->branch)->get()->count();
                        if($branchCount>0){
                          $branch = App\Branch::find($data['student']->branch);echo $branch->name;
                        }?></td>
                  </tr>


                  <tr>
                    <th>Year</th>
                    <td>{{$data['student']->year}}</td>
                  </tr>

                  <tr>
                    <th>Semister</th>
                    <td>{{$data['student']->semister}}</td>
                  </tr>

                  <tr>
                    <th>State</th>
                    <td>{{$data['student']->state}}</td>
                  </tr>

                  <tr>
                    <th>City</th>
                    <td>{{$data['student']->city}}</td>
                  </tr>

                  <tr>
                    <th>Pincode</th>
                    <td>{{$data['student']->pincode}}</td>
                  </tr>

                  <tr>
                    <th>Address</th>
                    <td>{{$data['student']->address}}</td>
                  </tr>

                  <tr>
                    <th>Tution Fees</th>
                    <td>{{$data['FeesDetails']->tution_fees}}</td>
                  </tr>

                  <tr>
                    <th>Development Fees</th>
                    <td>{{$data['FeesDetails']->development_fees}}</td>
                  </tr>

                  <tr>
                    <th>Total Fees</th>
                    <td>{{$data['FeesDetails']->total_fees}}</td>
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