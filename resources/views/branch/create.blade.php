@extends('layouts.main')

@section('content')
@include('layouts.nav')
<div id="wrapper">
@include('layouts.sidebar')

 <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Add New Branch</div>
      <div class="card-body">
        @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session()->get('success') }}
          </div>
        @endif
        <form method="post" action="/branch/store">
          @csrf
            <div class="form-group">
              <label>Branch Name</label>
              <input type="text" class="form-control" name="name" value="{{ old('name')}}" placeholder="Branch Name">
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