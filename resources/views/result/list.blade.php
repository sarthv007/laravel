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
            Result List
            <div style="float: right;">
	      		<a href="/result/create" class="btn btn-primary">Add new</a>
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
                    <th>Document type</th>
                    <th>Branch Name</th>
                    <th>Year</th>
                    <th>Semister</th>
                    <th>File</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
               
                <tbody>
                  @foreach($data['results'] as $result)
                  <tr>
                    <td>{{ $result->id }}</td>
                    <td>{{ ucfirst($result->doc_type) }}</td>
                    <td>
                      <?php 
                        $branch_name = App\Branch::find($result->branch_id);
                        echo ucfirst($branch_name->name);
                      ?>
                    </td>
                    <td>{{$result->year }}</td>
                    <td>{{$result->semister }}</td>
                    <td>{{$result->file }}</td>
                    
                    
                    <td>
                      <a href="/edit/{{$result->id}}/result"><i class="fa fa-edit"></i></a>
|
                      <form method="post" action="/delete/{{$result->id }}/result">
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
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
    

</div>
 @endsection