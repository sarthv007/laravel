@extends('layouts.main')

@section('content')
@include('layouts.nav')
<div id="wrapper">
@include('layouts.sidebar')

<div id="content-wrapper">

      @if($attendance)

      <div class="container-fluid">
      		<!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Attendance
            <div style="float: right;">
            <a href="javascript:void(0)" onclick="printDiv('pritMe');" class="btn btn-primary"><i class="fa fa-print"></i> &nbsp;Print</a>
          </div>
           

        </div>
            
            
          <div class="card-body pritMe">
          	<div class="table-responsive">
            	@if(session()->has('success'))
		          <div class="alert alert-success">
		              {{ session()->get('success') }}
		          </div>
		        @endif

                
                <div class="row">
                <div class="col-md-4">
                <form method="post" action="/employee/attendanceByMonth">
                  @csrf
                <select name="month" onchange="form.submit();" class="form-control col-md-6">
                  <option value="">Filter By Month</option>
                   <option selected value='Janaury'>Janaury</option>
                    <option value='February'>February</option>
                    <option value='March'>March</option>
                    <option value='April'>April</option>
                    <option value='May'>May</option>
                    <option value='June'>June</option>
                    <option value='July'>July</option>
                    <option value='August'>August</option>
                    <option value='September'>September</option>
                    <option value='October'>October</option>
                    <option value='November'>November</option>
                    <option value='December'>December</option>
                  </select>
                </form>
                </div>
                
                                
              </div>
              <br>


              <table class="table table-bordered" id="data" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Sr No.</th>
                    <th>Date</th>
                    <th>Day</th>
                    <th>In time</th>
                    <th>Out time</th>
                    <th>Late</th>
                    <th>Early</th>
                    <th>Status</th>
                    <th>Total Hours</th>
                    
                  </tr>
                </thead>
               
                <tbody>
                  <?php $i=0;?>
                  @foreach($attendance as $attend)
                 <tr>
                    <td>{{++$i}}</td>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d',$attend->date)->format('d M Y') }}</td>
                    <td>{{$attend->day }}</td>
                    <td>{{$attend->in_time }}</td>
                    <td>{{$attend->out }}</td>
                    <td>{{$attend->late }}</td>
                    <td>{{$attend->early }}</td>
                    <td>{{$attend->status }}</td>
                    <td>{{$attend->total_hour }}</td>
                  </tr>
                  
                 
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>

      @endif


</div>
 @endsection