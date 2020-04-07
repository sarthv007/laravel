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
            Course List
            <div style="float: right;">
	      		<a href="/course/create" class="btn btn-primary">Add new course</a>
	      	</div>

        </div>
            
            
          <div class="card-body">
          	<div class="table-responsive">
            	@if(session()->has('success'))
		          <div class="alert alert-success">
		              {{ session()->get('success') }}
		          </div>
		          @endif

              @if(session()->has('error'))
              <div class="alert alert-danger">
                  {{ session()->get('error') }}
              </div>
              @endif  
              
              <table class="table table-bordered" id="1" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Course Name</th>
                    <th>Branch Name</th>
                    <th>Year</th>
                    <th>Tution Fees</th>
                    <th>Development Fees</th>
                    <th>Total Fees</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
               
                <tbody>
                  @foreach($courses as $course)
                  <tr>
                    <td>{{$course->id }}</td>
                    <td>{{$course->courseType }}</td>
                    <td>
                    {{ 
                      $course->branch->name 
                    }}</td>
                    <td>{{$course->year }}</td>
                    <td>{{$course->tution_fees }}</td>
                    <td>{{$course->development_fees }}</td>
                    <td>{{$course->total_fees }}</td>
                    <td>{{$course->created_at }}</td>

                    <td>
                      <a href="/edit/{{$course->id}}/course"><i class="fa fa-edit"></i></a>
                      |
                      <form method="post" action="/delete/{{$course->id }}/course">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">delete</button>
                      </form>
                      
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