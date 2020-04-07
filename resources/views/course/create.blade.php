@extends('layouts.main')

@section('content')
@include('layouts.nav')
<div id="wrapper">
@include('layouts.sidebar')

 <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Add New Course</div>
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

        <form method="post" action="/course/store">
          @csrf
            <div class="form-group">
              <label>Course Name</label>
              <select class="form-control" name="courseType">
                  <option value="">Select Course</option>
                  <option value="B.E.">B.E.</option>
                  <option value="M.E.">M.E.</option>
                  
              </select> 
              @error('courseType')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>


            <div class="row">
            <div class="form-group col-md-6">
            <label>Select Branch</label>
            <select class="form-control" name="branch_id">
              <option value="">select Branch</option>
              
              @foreach($data['branchs'] as $branch)
                <option value="{{$branch->id}}" {{ old('branch') == $branch->name ? 'selected' : '' }}>{{$branch->name}}</option>    
              @endforeach
              
              
            </select>
            @error('branch_id')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div>
        

        
          <div class="form-group col-md-6">
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
          </div>


          <div class="form-group">
              <label>Tution Fees</label>
              <input type="text" class="form-control" id="tution_fees" name="tution_fees" value="{{ old('tution_fees')}}" placeholder="Tution Fees">
              @error('tution_fees')
                  <small class="error">{{ $message }}</small>
              @enderror
              <small class="error" id="tution_fees_error" style="display: none;"></small>
            </div>


            <div class="form-group">
              <label>Development Fees</label>
              <input type="text" onblur='showTotalFees()' class="form-control" id="development_fees" name="development_fees" value="{{ old('development_fees')}}" placeholder="Development Fees">
              @error('development_fees')
                  <small class="error">{{ $message }}</small>
              @enderror
              <small class="error" id="development_fees_error" style="display: none;"></small>
            </div>

            <div class="form-group" style="display: none;" id="total_fees_div">
              <label>Total Fees</label>
              <input type="text"  class="form-control" value="" id="total_fees" readonly="true">
            </div>            

           <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
        
      </div>
    </div>
  </div>
  @endsection