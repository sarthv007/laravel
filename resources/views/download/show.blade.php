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
                    <th>Download Reason</th>
                    <th>Download Details</th>
                    
                  </tr>
                </thead>
               
                <tbody>
                  @foreach($data['records'] as $record)
                  <tr>
                    <td>{{$record->id }}</td>
                    <td>{{$record->reason }}</td>
                    <td>
                      <?php 
                        $unserializeData = unserialize($record->details);
                        
                      ?>
                      <ul>
                        
                        <li>{{ ucfirst($unserializeData['user_name'])}}</li>
                        <li>{{ucfirst($unserializeData['document'])}}</li>
                    </ul>
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