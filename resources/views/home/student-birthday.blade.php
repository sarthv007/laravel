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
            Student Birthday List
           
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
                    <th>Full Name</th>
                    <th>Birth Date</th>
                    
                  </tr>
                </thead>
               
                <tbody>
                  @foreach($data['student_birthday'] as $birthday)
                  <tr>
                    <td>{{$birthday->id }}</td>
                    <td>{{$birthday->first_name." " .$birthday->last_name }}</td>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d',$birthday->dob)->format('d-F-Y') }}</td>
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