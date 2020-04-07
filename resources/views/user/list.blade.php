@extends('layouts.main')

@section('content')
@include('layouts.nav')
<div id="wrapper">
@include('layouts.sidebar')

<div id="content-wrapper">

      @if($data['users'])

      <div class="container-fluid">
      		<!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            User Listing
            <div style="float: right;">
	      		<a href="/create" class="btn btn-primary">Add new</a>
	      	</div>

        </div>
            
            
          <div class="card-body">
          	<div class="table-responsive">
            	@if(session()->has('success'))
		          <div class="alert alert-success">
		              {{ session()->get('success') }}
		          </div>
		        @endif

            <div>
                
                <div class="row">
                <div class="col-md-4">
                  <form action="/filter-by-dept">
                 
                <select name="department" onchange="form.submit();" class="form-control col-md-6">
                  <option value="">Filter By Department</option>
                  @if(count($data['departments'])>0)
                    @foreach($data['departments'] as $department)
                      <option value="{{$department->id}}"> {{$department->name}}</option>
                    @endforeach
                  @endif
                </select>
                </form>
                </div>
                
                <div class="col-md-4">
                  <form method="gets" action="/filter-by-year">
                  <input class="" required type="date" name="joining_date" value="">
                  <button type="submit">Search</button>
                  </form>
                  </div>
                  

                  <div class="col-md-4">
                    <a class="btn btn-primary" href="/export-users">Export to excel</a>
                  </div>     
                  </div>                
              </div>
              <br>


              <table class="table table-bordered" id="data" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Employee code</th>
                    <th>User Id</th>
                    <th>Password</th>
                    <th>Full Name</th>
                    <!-- <th>Email</th>
                    <th>Phone Number</th> -->
                    <th>Department</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>GrossSalary</th>
                    <th>Joining Date</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
               
                <tbody>
                  <?php $i=0;?>
                  @foreach($data['users'] as $user)
                 
                  <tr>
                    <td>{{$user->employee_code }}</td>
                    <td>{{$user->username }}</td>
                    <td>{{$user->password_show }}</td>
                    <td>{{$user->first_name }} {{$user->last_name}}</td>
                    <!-- <td>{{$user->email }}</td>
                    <td>{{$user->phone }}</td> -->
                    <td>
                      
                        @if(isset($user->department->name))
                          {{$user->department->name}}
                        @endif 
                      </td>
                    <td>{{$user->gender }}</td>
                    <td>
                      @if(isset($user->role->role))
                        {{ucfirst($user->role->role)}}
                    	@endif
                    </td>
                    <td>{{isset($user->gross_salary)?$user->gross_salary:'' }}</td>
                    <td>{{ isset($user->joining_date)?$user->joining_date:'' }}</td>
                    <td><a href="edit/{{$user->id }}"><i class="fa fa-edit"></i></a>|
                    &nbsp;	
                    <form method="post" action="delete/user/{{$user->id }}">
	                  @csrf
	                  @method('DELETE')
	                  <button class="btn btn-danger" type="submit">Delete</button>
	                </form>
                  |<a href="/show/{{$user->id }}/user">details</a>

                	</td>
                  </tr>
                  
                  <?php $i++; ?>
                  @endforeach
                </tbody>
              </table>
              {{ $data['users']->links() }}
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>

      @endif


</div>
 @endsection