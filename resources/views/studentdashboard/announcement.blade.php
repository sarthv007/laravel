@extends('studentdashboard.layouts.main')

@section('content')
@include('studentdashboard.layouts.nav')
<div id="wrapper">
@include('studentdashboard.layouts.sidebar')

<div id="content-wrapper">
      <div class="container-fluid">
      		<!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
             {{$data['title']}}
            

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
                    <th>Title</th>
                    <th>Body</th>
                    
                  </tr>
                </thead>
               
                <tbody>
                  @foreach($data['notices'] as $notice)
                  <tr>
                    <td>{{$notice->id }}</td>
                    <td>{{$notice->title }}</td>
                    <td>{{$notice->body }}</td>
                    
                    
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