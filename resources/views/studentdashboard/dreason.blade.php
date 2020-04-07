@extends('studentdashboard.layouts.main')

@section('content')
@include('studentdashboard.layouts.nav')
<div id="wrapper">
@include('studentdashboard.layouts.sidebar')

 <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">{{$data['title']}}</div>
      <div class="card-body">
        @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session()->get('success') }}
          </div>
        @endif
        <form method="post" action="/download">
          @csrf
            <div class="form-group">
              <input type="text" class="form-control" readonly value="{{$data['docs']}}">
            </div>
            <input type="hidden" name="path" value="{{ $data['docs'] }}">
            <div class="form-group">
              <label>Download Reason</label>
              <textarea cols="20" rows="10" class="form-control" name="download_reason" placeholder="Download Reason">{{ old('download_reason')}}</textarea>
              @error('download_reason')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>

           <button type="submit" style="width:100%;" class="btn btn-primary btn-block"><i class="fa fa-download"></i>&nbsp;&nbsp;Download</button>
        </form>
        
      </div>
    </div>
  </div>
  @endsection