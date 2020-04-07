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
            Leave List
            

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
                    <th>Id</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Reason</th>
                    <th>Days</th>
                    <th>HOD Approval</th>
                    <th>Pricipal Approval</th>
                    <th>Ajusted Faculty Name</th>
                    <th>Apply Date</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
               
                <tbody>
                  @foreach($leaves as $leave)
                  <tr>
                    <td>{{$leave->id }}</td>
                    <td>{{$leave->start_date }}</td>
                    <td>{{$leave->end_date }}</td>
                    <td>{{$leave->reason }}</td>
                    <td>{{$leave->days }}</td>
                    <td>{{$leave->approvedByHOD }}</td>
                    <td>{{$leave->approvedByPrincipal }}</td>
                    <td>{{$leave->ajustedFacultyName }}</td>
                    <td>{{ date('D-m-Y',strtotime($leave->created_at)) }}</td>
                    <td>
                      @if($leave->approvedByHOD == "Pending")
                        <a href="/leave-approve/{{$leave->id}}/approve">Approve</a>
                        <a href="/leave-decline/{{$leave->id}}/decline">Decline</a>  
                      @endif

                      @if($leave->approvedByHOD == 'Approved')
                        <a href="/leave-decline/{{$leave->id}}/decline">Decline</a>
                      @endif

                      @if($leave->approvedByHOD == 'Decline')
                        <a href="/leave-approve/{{$leave->id}}/approve">Approve</a>
                      @endif
                      
<!-- |
                      <form method="post" action="/delete/{{$leave->id }}/leave">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">delete</button>
                      </form> -->
                      
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