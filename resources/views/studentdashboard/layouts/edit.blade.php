@extends('layouts.main')

@section('content')
@include('layouts.nav')
<div id="wrapper">
@include('layouts.sidebar')

 <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session()->get('success') }}
          </div>
        @endif
        <form method="post" enctype="multipart/form-data" action="/update/{{$data['student']['id']}}/student">
           @csrf

          <div class="row">
            <div class="form-group col-md-6">
              <label>First Name</label>
              <input type="text" class="form-control" name="first_name" value="{{ old('first_name',$data['student']['first_name'])}}" placeholder="First Name">
              @error('first_name')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div>

          
            <div class="form-group col-md-6">
              <label>Last Name</label>
              <input type="text" class="form-control" name="last_name" value="{{ old('last_name',$data['student']['last_name'])}}" placeholder="First Name">
              @error('last_name')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          </div>

          <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Father Name</label>
              <input type="text" class="form-control" name="father_name" value="{{ old('father_name',$data['student']['father_name'])}}" placeholder="Father Name">
              @error('father_name')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          </div>

          
            <div class="form-group col-md-6">
              <label>Mother Name</label>
              <input type="text" class="form-control" name="mother_name" value="{{ old('mother_name',$data['student']['mother_name'])}}" placeholder="Mother Name">
              @error('mother_name')
                  <small class="error">{{ $message }}</small>
              @enderror
            
          </div>
          </div>

          <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email" value="{{ old('email',$data['student']['email'])}}" placeholder="Email">
              @error('email')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
           </div> 


          <div class="col-md-6"> 
            <div class="form-group">
              <label>Contact Number</label>
              <input type="number" class="form-control" name="phone" value="{{ old('phone',$data['student']['phone'])}}" placeholder="Contact Number">
              @error('phone')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          </div>
          </div>

          <div class="row">
            <div class="form-group col-md-6">
              <label>Photo</label>
              
              <input type="file" class="form-control" style="height:43px;" name="profile_image">
              <img style="margin:10px;border:1px solid silver;width: 40px;height: 40px;" src="{{ asset('uploads/students/'.$data['student']['profile_image'])}}">
              @error('profile_image')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          

          <div class="form-group col-md-6">
            <label>Select Branch</label>
            <select class="form-control" name="branch">
              <option value="">select Branch</option>
              
              @foreach($data['branchs'] as $branch)
                <option value="{{$branch->id}}" {{ $data['student']['branch'] == $branch->id ? 'selected' : '' }}>{{$branch->name}}</option>    
              @endforeach
              
              
            </select>
            @error('branch')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label>Select Gender</label>
            <select class="form-control" name="gender">
              <option value="">select gender</option>
              <option {{ $data['student']['gender'] == 'Male' ? 'selected' : '' }} value="Male">Male</option>
              <option {{ $data['student']['gender'] == 'FeMale' ? 'selected' : '' }} value="FeMale">FeMale</option>
            </select>
            @error('gender')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div>

          <div class="form-group col-md-6">
            <label>Select Year</label>
            <select class="form-control" name="year">
              <option value="">select Year</option>
                <option {{ $data['student']['year'] == '1' ? 'selected' : '' }} value="1">1</option>
                <option {{ $data['student']['year'] == '2' ? 'selected' : '' }} value="2">2</option>
                <option {{ $data['student']['year'] == '3' ? 'selected' : '' }} value="3">3</option>
                <option {{ $data['student']['year'] == '4' ? 'selected' : '' }} value="4">4</option>

              </select>
            @error('year')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Roll Number</label>
              <input type="text" class="form-control" name="roll_number" value="{{ old('roll_number',$data['student']['roll_number'])}}" placeholder="Roll Number">
              @error('roll_number')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          </div>


          <div class="form-group col-md-6">
            <label>Select Semister</label>
            <select class="form-control" name="semister">
              <option value="">select Year</option>
                <option {{ $data['student']['semister'] == '1' ? 'selected' : '' }} value="1">1</option>
                <option {{ $data['student']['semister'] == '2' ? 'selected' : '' }} value="2">2</option>
                <option {{ $data['student']['semister'] == '3' ? 'selected' : '' }} value="3">3</option>
                <option {{ $data['student']['semister'] == '4' ? 'selected' : '' }} value="4">4</option>
                <option {{ $data['student']['semister'] == '5' ? 'selected' : '' }} value="5">5</option>
                <option {{ $data['student']['semister'] == '6' ? 'selected' : '' }} value="6">6</option>
                <option {{ $data['student']['semister'] == '7' ? 'selected' : '' }} value="7">7</option>
                <option {{ $data['student']['semister'] == '8' ? 'selected' : '' }} value="8">8</option>

              </select>
            @error('semister')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div> 
        </div> 

          <div class="row">
            <div class="form-group col-md-6">
              <label>Date Of Birth</label>
              <input type="date" class="form-control" name="dob" value="{{old('dob',$data['student']['dob'])}}" placeholder="Contact Number">
              @error('dob')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          

          <div class="form-group col-md-6">
            <label>Adhar Number</label>
              <input type="text" class="form-control" name="adhar_number" value="{{old('adhar_number',$data['student']['adhar_number'])}}" placeholder="Adhar Number">
              @error('adhar_number')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div>
        </div>

          <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>State</label>
              <input type="text" class="form-control" name="state" value="{{ old('state',$data['student']['state'])}}" placeholder="State">
              @error('state')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          </div>


          <div class="col-md-4">
            <div class="form-group">
              <label>City</label>
              <input type="text" class="form-control" name="city" value="{{ old('city',$data['student']['city'])}}" placeholder="City">
              @error('city')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          </div>

          <div class="form-group col-md-4">
            <label>Pincode</label>
              <input type="text" class="form-control" name="pincode" value="{{old('pincode',$data['student']['pincode'])}}" placeholder="Pincode">
              @error('pincode')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div>
      </div>   

          <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" name="address" placeholder="Address">{{old('address',$data['student']['address'])}}</textarea>
            @error('address')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div>
          
          <small style="color:#07073a">Upload required documents</small>
          <hr/>
          

          <div class="row">
          <div class="form-group col-md-6">
            <label>SSC Marksheet</label>
            <input type="file" class="form-control" style="height:43px;" name="ssc_marksheet">
            <small>{{ $data['student']['sscMarksheet'] }}</small>
            @error('ssc_marksheet')
                <small class="error">{{ $message }}</small>
            @enderror
          </div>

            <div class="form-group col-md-6">
              <label>HSC Marksheet</label>
              <input type="file" class="form-control" style="height:43px;" name="hsc_marksheet">
              <small>{{ $data['student']['hscMarksheet'] }}</small>
              @error('hsc_marksheet')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
            </div>

            <div class="row">
            <div class="form-group col-md-6">
              <label>Deploma Marksheet</label>
              <input type="file" class="form-control" style="height:43px;" name="diploma_marksheet">
              <small>{{ $data['student']['diplomaMarksheet'] }}</small>
              @error('diploma_marksheet')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
            
            <div class="form-group col-md-6">
              <label>Leave Certificate</label>
              <input type="file" class="form-control" style="height:43px;" name="leave_cirtficates">
              <small>{{ $data['student']['leaveCirtficates'] }}</small>
              @error('leave_cirtficates')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
            </div>

          <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        
      </div>
    </div>
  </div>
  @endsection