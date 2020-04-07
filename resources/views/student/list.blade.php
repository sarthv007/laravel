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
            Student List
            <div style="float: right;">
	      		<a href="/student/create" class="btn btn-primary">Add new</a>
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
                <div class="col-md-5">
                  <form method="get" action="/student/filter-branch">
              
                <select name="branch" onchange="form.submit();" class="form-control col-md-6">
                  <option value="">Filter By Branch</option>
                  @if(isset($data['branchs']))
                    @foreach($data['branchs'] as $branch)
                      <option value="{{$branch->id}}"> {{$branch->name}}</option>
                    @endforeach
                  @endif
                </select>
                </form>
                </div>
                
                <div class="col-md-5">
                <form method="get" action="/student/filter-year">
               
                <select name="year" onchange="form.submit();" class="form-control col-md-4">
                  <option value="">Filter By Year</option>
                  <option {{ old('year') == '1' ? 'selected' : '' }} value="1">1</option>
                  <option {{ old('year') == '2' ? 'selected' : '' }} value="2">2</option>
                  <option {{ old('year') == '3' ? 'selected' : '' }} value="3">3</option>
                  <option {{ old('year') == '4' ? 'selected' : '' }} value="4">4</option>                
                  </select>
                  </form>
                  </div>

                  <div class="col-md-2">
                    <a class="btn btn-primary" href="/export-stud">Export to excel</a>
                  </div>

                  </div>
                
              </div>
              <br>
              <table class="table table-bordered" id="1" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Roll Number</th>
                    <th>Full Name</th>
                    <th>Father Name</th>
                    <th>Mother Name</th>  
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Profile Image</th>
                    <th>Branch</th>
                    <th>Year</th>
                    <th>Semister</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Pincode</th>
                    <th>Address</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
               
                <tbody>
                  @foreach($data['students'] as $student)
                  <tr>
                    <td>{{$student->username }}</td>
                    <td>{{$student->password_show }}</td>
                    <td>{{$student->roll_number }}</td>
                    <td>{{$student->first_name }} {{$student->last_name}}</td>
                    <td>{{$student->father_name }}</td>
                    <td>{{$student->mother_name }}</td>
                    <td>{{$student->email }}</td>
                    <td>{{$student->phone }}</td>
                    <td>{{$student->gender }}</td>
                    <td><img style="margin:10px;border:1px solid silver;width: 40px;height: 40px;" src="{{asset('storage/'.$student->profile_image) }}"></td>
                    <td>
                      <?php 
                        $branchCount = App\Branch::where('id','=',$student->branch)->get()->count();
                        if($branchCount>0){
                          $branch = App\Branch::find($student->branch);echo $branch->name;
                        }
                        
                      ?>
                    </td>
                    <td>{{$student->year }}</td>
                    <td>{{$student->semister }}</td>
                    <td>{{$student->state }}</td>
                    <td>{{$student->city }}</td>
                    <td>{{$student->pincode }}</td>
                    <td>{{$student->address }}</td>
                    
                    <td>
                      <a href="/edit/{{$student->id }}/student"><i class="fa fa-edit"></i></a>
|
                      <form method="post" action="/delete/{{$student->id }}/student">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">delete</button>
                      </form>
                      |
                      <a href="/show/{{$student->id }}/student">details</a>
                     </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $data['students']->links() }}
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
    

</div>
 @endsection