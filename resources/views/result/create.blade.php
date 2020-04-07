@extends('layouts.main')

@section('content')
@include('layouts.nav')
<div id="wrapper">
@include('layouts.sidebar')

 <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Add New Result</div>
      <div class="card-body">
        @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session()->get('success') }}
          </div>
        @endif

        <form method="post" action="/result/store" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <label>Select Document Type</label>
              <select name="doc_type" class="form-control">
                <option value="">Please select</option>
                <option value="results">Results</option>
                <option value="fees">Fees</option>
                <option value="assignment">Assignment</option>
                <option value="attendance">Attendance</option>
              </select>
              @error('doc_type')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>  

            <div class="form-group">
              <label>Select Branch Name</label>
              <select name="branch_id" class="form-control">
                <option value="">Select Branch Name</option>
                @foreach($data['branchs'] as $branch)
                  <option value="{{$branch->id}}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>{{$branch->name}}</option>
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
                <option {{ old('year') == '1' ? 'selected' : '' }} value="1">1</option>
                <option {{ old('year') == '2' ? 'selected' : '' }} value="2">2</option>
                <option {{ old('year') == '3' ? 'selected' : '' }} value="3">3</option>
                <option {{ old('year') == '4' ? 'selected' : '' }} value="4">4</option>

              </select>
            @error('year')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div>


          <div class="form-group">
            <label>Select Semister</label>
            <select class="form-control" name="semister">
              <option value="">select Year</option>
                <option {{ old('semister') == '1' ? 'selected' : '' }} value="1">1</option>
                <option {{ old('semister') == '2' ? 'selected' : '' }} value="2">2</option>
                <option {{ old('semister') == '3' ? 'selected' : '' }} value="3">3</option>
                <option {{ old('semister') == '4' ? 'selected' : '' }} value="4">4</option>
                <option {{ old('semister') == '5' ? 'selected' : '' }} value="5">5</option>
                <option {{ old('semister') == '6' ? 'selected' : '' }} value="6">6</option>
                <option {{ old('semister') == '7' ? 'selected' : '' }} value="7">7</option>
                <option {{ old('semister') == '8' ? 'selected' : '' }} value="8">8</option>

              </select>
            @error('semister')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div> 


          <div class="form-group">
              <label>Upload Image</label>
              <input type="file" class="form-control" style="height:43px;" name="result_file">
              @error('result_file')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>


           <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        
      </div>
    </div>
  </div>
  @endsection