@extends('layouts.main')

@section('content')
@include('layouts.nav')
<div id="wrapper">
@include('layouts.sidebar')

 <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Student</div>
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

        <form method="post" enctype="multipart/form-data" action="/student/store">
           @csrf
          <small style="color:#07073a">Enter general details</small>
          <hr/>
          <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>First Name</label>
              <input type="text" class="form-control" name="first_name" value="{{ old('first_name')}}" placeholder="First Name">
              @error('first_name')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Father Name</label>
              <input type="text" class="form-control" name="father_name" value="{{ old('father_name')}}" placeholder="Father Name">
              @error('father_name')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Mother Name</label>
              <input type="text" class="form-control" name="mother_name" value="{{ old('mother_name')}}" placeholder="Mother Name">
              @error('mother_name')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" class="form-control" name="last_name" value="{{ old('last_name')}}" placeholder="First Name">
              @error('last_name')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          </div>
          </div>

          <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email" value="{{ old('email')}}" placeholder="Email">
              @error('email')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
           </div> 


          <div class="col-md-6"> 
            <div class="form-group">
              <label>Contact Number</label>
              <input type="number" class="form-control" name="phone" value="{{ old('phone')}}" placeholder="Contact Number">
              @error('phone')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          </div>
          </div>

          <div class="row">
            <div class="form-group col-md-12">
              <label>Photo</label>
              <input type="file" class="form-control" style="height:43px;" name="profile_image">
              @error('profile_image')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          

          
        </div>

        

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Roll Number</label>
              <input type="text" class="form-control" name="roll_number" value="{{ old('roll_number')}}" placeholder="Roll Number">
              @error('roll_number')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          </div>

          <div class="form-group col-md-6">
            <label>Select Gender</label>
            <select class="form-control" name="gender">
              <option value="">select gender</option>
              <option {{ old('gender') == 'Male' ? 'selected' : '' }} value="Male">Male</option>
              <option {{ old('gender') == 'FeMale' ? 'selected' : '' }} value="FeMale">FeMale</option>
            </select>
            @error('gender')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div>


           
        </div> 


        <div class="row">
            <div class="form-group col-md-6">
              <label>Date Of Birth</label>
              <input type="date" class="form-control" name="dob" value="{{old('dob')}}" placeholder="Contact Number">
              @error('dob')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          

          <div class="form-group col-md-6">
            <label>Adhar Number</label>
              <input type="text" class="form-control" name="adhar_number" value="{{old('adhar_number')}}" placeholder="Adhar Number">
              @error('adhar_number')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div>
        </div>
        <small style="color:#07073a">Enter residential details</small>
          <hr/>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>State</label>
              <input type="text" class="form-control" name="state" value="{{ old('state')}}" placeholder="State">
              @error('state')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          </div>


          <div class="col-md-4">
            <div class="form-group">
              <label>City</label>
              <input type="text" class="form-control" name="city" value="{{ old('city')}}" placeholder="City">
              @error('city')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          </div>

          <div class="form-group col-md-4">
            <label>Pincode</label>
              <input type="text" class="form-control" name="pincode" value="{{old('pincode')}}" placeholder="Pincode">
              @error('pincode')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div>
      </div>    

        <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" name="address" placeholder="Address">{{old('address')}}</textarea>
            @error('address')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div>

          <small style="color:#07073a">Enter course details</small>
          <hr/>

          <div class="row">
            <div class="form-group col-md-6">
              <label>Course Name</label>
              <select class="form-control" name="course_id" id="courseType">
                  <option value="">Select Course</option>
                  <option {{ old('course_id') == 'B.E.' ? 'selected' : '' }} value="B.E.">B.E.</option>
                  <option {{ old('course_id') == 'M.E.' ? 'selected' : '' }} value="M.E.">M.E.</option>
                  
              </select> 
              @error('course_id')
                  <small class="error">{{ $message }}</small>
              @enderror
              <small class="error course_name_error"></small>
            </div>
             
             <div class="form-group col-md-6">
            <label>Select Branch</label>
            <select class="form-control" name="branch" id="branch">
              <option value="">select Branch</option>
              
              @foreach($data['branchs'] as $branch)
                <option value="{{$branch->id}}" {{ old('branch') == $branch->id ? 'selected' : '' }}>{{$branch->name}}</option>    
              @endforeach
              
              
            </select>
            @error('branch')
                  <small class="error">{{ $message }}</small>
              @enderror
              <small class="error branch_name_error"></small>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label>Select Year</label>
            <select onchange="getFees()" class="form-control" name="year" id="year">
              <option value="">select Year</option>
                <option {{ old('year') == '1' ? 'selected' : '' }} value="1">1</option>
                <option {{ old('year') == '2' ? 'selected' : '' }} value="2">2</option>
                <option {{ old('year') == '3' ? 'selected' : '' }} value="3">3</option>
                <option {{ old('year') == '4' ? 'selected' : '' }} value="4">4</option>

              </select>
            @error('year')
                  <small class="error">{{ $message }}</small>
              @enderror
               <small class="error year_error"></small>
          </div>

          <div class="form-group col-md-6">
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
          </div>


          <div class="row">
              <div class="form-group col-md-6">
              <label>Tution Fees</label>
              <input type="text" readonly="true" class="form-control" id="tution_fees" placeholder="Tution Fees">
              <small class="error" id="tution_fees_error" style="display: none;"></small>
            </div>



              <div class="form-group col-md-6">
                <label>Development Fees</label>
                <input readonly="true" type="text" class="form-control" id="development_fees" placeholder="Development Fees" >
                <small class="error" id="development_fees_error" style="display: none;"></small>
            </div>

            <div class="form-group col-md-12">
                <label>Total Fees</label>
                <input readonly="true" type="text" class="form-control" id="total_fees" placeholder="Total Fees">
                <small class="error" id="development_fees_error" style="display: none;"></small>
            </div>
          </div>



          <small style="color:#07073a">Upload required documents</small>
          <hr/>
          

          <div class="row">
          <div class="form-group col-md-6">
            <label>SSC Marksheet</label>
            <input type="file" class="form-control" style="height:43px;" name="ssc_marksheet">
            @error('ssc_marksheet')
                <small class="error">{{ $message }}</small>
            @enderror
          </div>

            <div class="form-group col-md-6">
              <label>HSC Marksheet</label>
              <input type="file" class="form-control" style="height:43px;" name="hsc_marksheet">
              @error('hsc_marksheet')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
            </div>

            <div class="row">
            <div class="form-group col-md-6">
              <label>Diploma Marksheet</label>
              <input type="file" class="form-control" style="height:43px;" name="diploma_marksheet">
              @error('diploma_marksheet')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
            
            <div class="form-group col-md-6">
              <label>Leave Certificate</label>
              <input type="file" class="form-control" style="height:43px;" name="leave_cirtficates">
              
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