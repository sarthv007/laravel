@extends('layouts.main')

@section('content')
@include('layouts.nav')
<div id="wrapper">
@include('layouts.sidebar')

 <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Update Student Fees</div>
      <div class="card-body">
        @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session()->get('success') }}
          </div>
        @endif

        @if(session()->has('errors'))
          <div class="alert alert-danger">
              {{ session()->get('errors') }}
          </div>
        @endif
        <form method="post" action="/update/{{$students->id}}/fees">
          @csrf
           
            <div class="form-group">
              <label>Student Name</label>
              <input type="text" class="form-control" value="{{ ucwords($students->first_name .' '.$students->last_name)}}" readonly placeholder="Type">
            </div>


            <div class="form-group">
              <label>Total Development Fees</label>
              <input type="text" class="form-control" readonly value="{{ $students->course->development_fees}}" placeholder="Type">
            </div>

            <div class="form-group">
              <label>Total tution Fees</label>
              <input type="text" class="form-control" value="{{ $students->course->tution_fees}}" readonly placeholder="Type">
            </div>

            <div class="form-group">
              <label>Total Fees</label>
              <input type="text" class="form-control" value="{{ $students->course->total_fees }}" readonly placeholder="Type">
            </div>

            <div class="form-group">
              <label>Pay Fees</label>
              <input type="text" class="form-control" name="FeesPaid" value="{{old('FeesPaid',$students->course->FeesPaid) }}" placeholder="Pay Fees">
              @error('FeesPaid')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
            <input type="hidden" name="course_id" value="{{$students->course_id}}">
            <input type="hidden" name="student_id" value="{{$students->id}}">
            <input type="hidden" name="total_fees" value="{{$students->course->total_fees}}">
           <button type="submit" class="btn btn-primary">Update Fee</button>
        </form>
        
      </div>
    </div>
  </div>
  @endsection