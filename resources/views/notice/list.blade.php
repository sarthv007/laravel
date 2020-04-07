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
            Notice List
            <div style="float: right;">
	      		<a href="/notice/create" class="btn btn-primary">Add new</a>
	      	</div>

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
                    <th>Action</th>
                  </tr>
                </thead>
               
                <tbody>
                  @foreach($notices as $notice)
                  <tr>
                    <td>{{$notice->id }}</td>
                    <td>{{$notice->title }}</td>
                    <td>{{$notice->body }}</td>
                    
                    <td>
                      <a href="/edit/{{$notice->id}}/notice"><i class="fa fa-edit"></i></a>
|
                      <form method="post" action="/delete/{{$notice->id }}/notice">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">delete</button>
                      </form>
                      
                     </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $notices->links() }}
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
    

</div>
 @endsection