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
                    <th>SSC Marksheet</th>
                    <td>SSC Marksheet</td>
                    <td><a href="docs-download/1"><i class="fa fa-download"></i>&nbsp;Download</a></td>
                  </tr>
                  <tr>  
                    <th>HSC Marksheet</th>
                    <td>HSC Marksheet</td>
                    <td><a href="docs-download/2"><i class="fa fa-download"></i>&nbsp;Download</a></td>
                  </tr>
                  <tr>  
                    <th>Diploma Marksheet</th>
                    <td>Diploma Marksheet</td>
                    <td><a href="docs-download/3"><i class="fa fa-download"></i>&nbsp;Download</a></td>
                  </tr>
                  <tr>
                  	<th>Leaving Certficates</th>
                    <td>Leaving Certficates</td>
                    <td><a href="docs-download/4"><i class="fa fa-download"></i>&nbsp;Download</a></td>	
                  </tr>
                </thead>
               </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
    

</div>       
@endsection