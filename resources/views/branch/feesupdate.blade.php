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
        <form method="post" action="/update/{{$students->id}}/fees">
          @csrf
            <div class="form-group">
              <label>Total Development Fees</label>
              <input type="text" class="form-control" value="{{ $student->course->development_fees}}" placeholder="Type">
            </div>

            <div class="form-group">
              <label>Total Development Fees</label>
              <input type="text" class="form-control" value="{{ $student->course->development_fees}}" placeholder="Type">
            </div>

           <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        
      </div>
    </div>
  </div>
  @endsection