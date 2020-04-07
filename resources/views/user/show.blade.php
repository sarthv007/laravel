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
            User Details
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
                    <th>Roll Number</th>
                    <td>{{$user->roll_number}}</td>
                  </tr>

                  <tr>
                    <th>Employee Code</th>
                    <td>{{$user->employee_code}}</td>
                  </tr>

                  <tr>
                    <th>User Id</th>
                    <td>{{$user->username}}</td>
                  </tr>
                  
                  <tr>
                    <th>Password</th>
                    <td>{{$user->password_show}}</td>
                  </tr>

                  <tr>
                    <th>First Name</th>
                    <td>{{$user->first_name}}</td>
                  </tr>

                  <tr>
                    <th>Last Name</th>
                    <td>{{$user->last_name}}</td>
                  </tr>

                  


                  <tr>
                    <th>Email</th>
                    <td>{{$user->email}}</td>
                  </tr>

                  <tr>
                    <th>Contact Number</th>
                    <td>{{$user->phone}}</td>
                  </tr>

                  <tr>
                    <th>Gender</th>
                    <td>{{$user->gender}}</td>
                  </tr>

                  <tr>
                    <th>Photo</th>
                    <td>
                      @if(isset($user->profile_image))
                      <img style="margin:10px;border:1px solid silver;width: 40px;height: 40px;" src="{{ asset('storage/'.$user->profile_image) }}">
                      @else
                      <img style="margin:10px;border:1px solid silver;width: 40px;height: 40px;" src="{{ asset('img/user.jpg') }}">
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <th>Department</th>
                    <td>
                    @if(isset($user->department->name))
                      {{$user->department->name}}</td>
                    @endif  
                  </tr>

                  <tr>
                    <th>Gender</th>
                    <td>{{$user->gender}}</td>
                  </tr>

                  <tr>
                    <th>Role</th>
                    <td>
                      @if(isset($user->role->role))
                        {{ucfirst($user->role->role)}}
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <th>Birth Date</th>
                    <td>{{$user->dob}}</td>
                  </tr>

                  <tr>
                    <th>Adhar Card Number</th>
                    <td>{{$user->adhar_number}}</td>
                  </tr>

                  <tr>
                    <th>Address</th>
                    <td>{{$user->address}}</td>
                  </tr>

                  <tr>
                    <th>Joining Date</th>
                    <td>{{$user->joining_date}}</td>
                  </tr>

                  <tr>
                    <th>Basic Salary</th>
                    <td>{{$user->salary}}</td>
                  </tr>

                  <tr>
                    <th>DA %</th>
                    <td>{{(int)$user->da_percent}} %</td>
                  </tr>

                  <tr>
                    <th>HRA %</th>
                    <td>{{(int)$user->da_percent}} %</td>
                  </tr>

                  <tr>
                    <th>Gross Salary</th>
                    <td>{{$user->gross_salary}}</td>
                  </tr>

                  


                  </tr>
                </thead>
               </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
    

</div>
 @endsection