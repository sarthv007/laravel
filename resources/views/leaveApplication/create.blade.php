@extends('layouts.main')

@section('content')
@include('layouts.nav')
<div id="wrapper">
@include('layouts.sidebar')

 <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">{{ $data['title'] }}</div>
      <div class="card-body">
        @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session()->get('success') }}
          </div>
        @endif

        @if(session()->has('error'))
          <div class="alert alert-danger">
              {{ session()->get('error') }}
          </div>
        @endif

        <form method="post" action="/leave-application/store">
          @csrf
            <div class="form-group">
              <label>Employee Name</label>
              <input type="text" class="form-control"  value="{{ ucfirst(Auth::user()->first_name .' '.Auth::user()->last_name) }}" placeholder="Branch Name" readonly="true">
              @error('name')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label>Leave Balance</label>
              <input type="text" class="form-control"  value="{{ Auth::user()->leave_count }}" placeholder="Balance" readonly="true">
              @error('name')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>



            <div class="form-group">
              <label>Select Leave Type</label>
              <select name="leave_type" class="form-control">
                <option>select leave type</option>
                <?php 
                $leavesType = \App\Leave::all();
                ?>
                @foreach($leavesType as $leave)
                  <option value="">{{ $leave->type }}</option>
                @endforeach
              </select>
            </div>            

            <div class="form-group">
              <label>Select Faculty to adjust</label>
              <select name="ajustedFacultyName" class="form-control">
                <option value="">Select Faculty</option>
                @foreach($data['users'] as $user)
                <option value="{{ $user->first_name .' '. $user->last_name }}">{{ $user->first_name.' '. $user->last_name }}</option>
                @endforeach
              </select>
              @error('ajustedFacultyName')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>


             <div class="form-group">
              <label>From Date</label>
              <input type="date" class="form-control"  name="start_date" value="{{ old('start_date') }}">
              @error('start_date')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>


            <div class="form-group">
              <label>To Date</label>
              <input type="date" class="form-control"  name="end_date" value="{{ old('end_date') }}">
              @error('end_date')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>


            <div class="form-group">
              <label>Reason</label>
              <textarea class="form-control" cols="3" rows="4" name="reason" value="{{ old('reason') }}"></textarea>
              @error('reason')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>



           <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        
      </div>
    </div>
  </div>
  @endsection