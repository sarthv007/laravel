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
                    <th>Stream</th>
                    <th>Year</th>
                    <th>Semister</th>
                    <th>File</th>
                    
                  </tr>
                </thead>
               
                <tbody>
                  @foreach($data['results'] as $result)
                  <tr>
                    <td>{{$result->id }}</td>
                    <td>{{$result->branch->name }}</td>
                    <td>{{$result->year }}</td>
                    <td>{{$result->semister }}</td>
                    <td><a target="_blank" href="{{ asset('uploads/results/'. $result->file) }}">{{  $result->file }}</a></td>
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