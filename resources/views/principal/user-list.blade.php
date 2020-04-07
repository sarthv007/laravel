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
                <div class="col-md-10">
                  <form action="/principal/filter-by-dept">
                 
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
                
                  

                   
                  </div>                
              </div>
              <br>


              <table class="table table-bordered" id="data" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>User Id</th>
                    <th>Password</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Department</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Salary</th>
                    <th>Joining Date</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
               
                <tbody>
                  @foreach($data['users'] as $user)
                  <tr>
                    <td>{{$user->username }}</td>
                    <td>{{$user->password_show }}</td>
                    <td>{{$user->first_name }} {{$user->last_name}}</td>
                    <td>{{$user->email }}</td>
                    <td>{{$user->phone }}</td>
                    <td>
                      
                        @if(isset($user->department->name))
                          {{$user->department->name}}
                        @endif 
                      </td>
                    <td>{{$user->gender }}</td>
                    <td>
                      {{ucfirst($user->role->role)}}
                    	
                    </td>
                    <td>{{$user->salary }}</td>
                    <td>{{$user->joining_date }}</td>
                    <td>	
                    <a href="/show/{{$user->id }}/user">details</a>

                	</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $data['users']->links() }}
            </div>
          </div>

        </div>

      </div>

      @endif


</div>
 @endsection