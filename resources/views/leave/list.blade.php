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
            Leaves List
            <div style="float: right;">
	      		<a href="/leave/create" class="btn btn-primary">Add new</a>
	      	</div>

        </div>
            
            
          <div class="card-body">
          	<div class="table-responsive">
            	@if(session()->has('success'))
		          <div class="alert alert-success">
		              {{ session()->get('success') }}
		          </div>
		        @endif
              
              <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Leave Type</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
               
                <tbody>
                  @foreach($leaves as $leave)
                  <tr>
                    <td>{{$leave->id }}</td>
                    <td>{{$leave->type }}</td>
                    
                    <td>
                      <a href="/edit/{{$leave->id}}/leave"><i class="fa fa-edit"></i></a>

                      <!-- <form method="post" action="/delete/{{$leave->id }}/leave">
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
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
    

</div>
 @endsection