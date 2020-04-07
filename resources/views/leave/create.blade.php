@extends('layouts.main')

@section('content')
@include('layouts.nav')
<div id="wrapper">
@include('layouts.sidebar')

 <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Add Leave Type</div>
      <div class="card-body">
        @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session()->get('success') }}
          </div>
        @endif
        <form method="post" action="/leave/store">
          @csrf
            <div class="form-group">
              <label>Leave Type</label>
              <input type="text" class="form-control" name="type" value="{{ old('type')}}" placeholder="Type">
              @error('type')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>

           <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        
      </div>
    </div>
  </div>
  @endsection