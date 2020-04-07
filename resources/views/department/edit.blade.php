@extends('layouts.main')

@section('content')
@include('layouts.nav')
<div id="wrapper">
@include('layouts.sidebar')

 <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Edit department name</div>
      <div class="card-body">
        @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session()->get('success') }}
          </div>
        @endif
        <form method="post" action="/department/{{$department->id}}/update">
          @csrf
            <div class="form-group">
              <label>Department Name</label>
              <input type="text" class="form-control" name="name" value="{{ old('name',$department->name)}}" placeholder="Department">
              @error('name')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>

           <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        
      </div>
    </div>
  </div>
  @endsection