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

        
 <form method="post" enctype="multipart/form-data" action="/user-store">
  @csrf
  <div class="form-group">
    <input type="file" style="height: 44px;" name="sample_file" class="form-control">
    <small class="error">
    @error('sample_file')
      {{$message}}
    @enderror
  </small>
  </div>
  
  
  <input type="submit" name="submit" value="submit" class="btn btn-primary">
  
  </form>
</div>
</div>
</div>
</div>
  @endsection 

