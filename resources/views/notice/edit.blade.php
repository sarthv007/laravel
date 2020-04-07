@extends('layouts.main')

@section('content')
@include('layouts.nav')
<div id="wrapper">
@include('layouts.sidebar')

 <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Edit Notice</div>
      <div class="card-body">
        @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session()->get('success') }}
          </div>
        @endif
        <form method="post" action="/notice/{{$data['notice']->id}}/update">
          @csrf
            <div class="form-group">
              <label>Select Branch Name</label>
              <select name="branch_id" class="form-control">
                <option value="">Select Branch Name</option>
                @foreach($data['branchs'] as $branch)
                  <option value="{{$branch->id}}" {{ old('branch_id',$data['notice']['branch_id']) == $branch->id ? 'selected' : '' }}>{{$branch->name}}</option>
                @endforeach
              </select>  
              @error('branch_id')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>


            <div class="form-group">
            <label>Select Year</label>
            <select class="form-control" name="year">
              <option value="">select Year</option>
                <option {{ old('year',$data['notice']['year']) == '1' ? 'selected' : '' }} value="1">1</option>
                <option {{ old('year',$data['notice']['year']) == '2' ? 'selected' : '' }} value="2">2</option>
                <option {{ old('year',$data['notice']['year']) == '3' ? 'selected' : '' }} value="3">3</option>
                <option {{ old('year',$data['notice']['year']) == '4' ? 'selected' : '' }} value="4">4</option>

              </select>
            @error('year')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div>


          <div class="form-group">
            <label>Select Semister</label>
            <select class="form-control" name="semister">
              <option value="">select Year</option>
                <option {{ $data['notice']['semister'] == '1' ? 'selected' : '' }} value="1">1</option>
                <option {{ $data['notice']['semister'] == '2' ? 'selected' : '' }} value="2">2</option>
                <option {{ $data['notice']['semister'] == '3' ? 'selected' : '' }} value="3">3</option>
                <option {{ $data['notice']['semister'] == '4' ? 'selected' : '' }} value="4">4</option>
                <option {{ $data['notice']['semister'] == '5' ? 'selected' : '' }} value="5">5</option>
                <option {{ $data['notice']['semister'] == '6' ? 'selected' : '' }} value="6">6</option>
                <option {{ $data['notice']['semister'] == '7' ? 'selected' : '' }} value="7">7</option>
                <option {{ $data['notice']['semister'] == '8' ? 'selected' : '' }} value="8">8</option>

              </select>
            @error('semister')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div> 


            <div class="form-group">
              <label>Notice Title</label>
              <input type="text" class="form-control" name="title" value="{{ old('title',$data['notice']->title)}}" placeholder="Title">
              @error('title')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label>Notice Body</label>
              <textarea rows="10" cols="100" class="form-control" name="body" placeholder="Body">{{ old('body',$data['notice']->body)}}</textarea> 
              @error('body')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>

           <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        
      </div>
    </div>
  </div>
  @endsection