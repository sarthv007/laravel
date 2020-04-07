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
            Student Fees List
           

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
                    <th>Roll Number</th>
                    <th>Student Name</th>
                    <th>Course Name</th>
                    <th>Branch Name</th>
                    <th>Year</th>
                    <th>Developement Fees</th>
                    <th>Tution Fees</th>
                    <th>Total Fees</th>  
                    <th>Fees Status</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
               
                <tbody>
                  @foreach($students as $student)
                  <tr>
                    <td>{{$student->roll_number }}</td>
                    <td>{{$student->first_name }} {{$student->last_name}}</td>
                    <td>{{$student->course->courseType }}</td>
                    <td>{{$student->course->Branch->name }}</td>
                    <td>{{$student->course->year }}</td>
                    <td>{{$student->course->tution_fees }}</td>
                    <td>{{$student->course->development_fees }}</td>
                    <td>{{$student->course->total_fees }}</td>
                    <td>{{$student->StudentFees->status }}</td>
                    <td>
                      @if($student->StudentFees->status === 'Pending')
                        <a href="/update-fees/{{$student->id }}">Update Fees</a>
                      @else
                        <a href="/show/{{$student->id }}/student">Student details</a>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              
            </div>
          </div>
        </div>

      </div>
    

</div>
 @endsection