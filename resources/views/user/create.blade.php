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

        @if(session()->has('error'))
          <div class="alert alert-danger">
              {{ session()->get('error') }}
          </div>
        @endif

        <form method="post" enctype="multipart/form-data" action="store">
           @csrf
          
          
            <div class="form-group">
              <label>Employee Code</label>
              <input type="text" class="form-control" name="employee_code" value="{{ old('employee_code')}}" placeholder="Employee Code">
              @error('employee_code')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          

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
            <div class="form-group col-md-6">
              <label>Photo</label>
              <input type="file" class="form-control" style="height:43px;" name="profile_image">
              @error('profile_image')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          

          <div class="form-group col-md-6">
            <label>Select Department</label>
            <select class="form-control" name="department_id">
              <option value="">select department</option>
              
              @foreach($data['departments'] as $department)
                <option value="{{$department->id}}" {{ old('department_id') == $department->id ? 'selected' : '' }}>{{$department->name}}</option>    
              @endforeach
              
              
            </select>
            @error('department_id')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div>
        </div>

        <div class="row">
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

          <div class="form-group col-md-6">
            <label>Select Role</label>
            <select class="form-control" name="role">
              <option value="">select gender</option>
              @foreach($data['roles'] as $role)
                <option {{ old('role') == $role->id ? 'selected' : '' }} value="{{$role->id}}">{{ucfirst($role->role)}}</option>    
              @endforeach
            </select>
            @error('role')
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

          <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" name="address" placeholder="Address">{{old('address')}}</textarea>
            @error('address')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div>

          <small>Salary Details</small>
          <hr>
          
          <div class="row">
          <div class="form-group col-md-6">
            <label>Date of joining</label>
            <input type="date" class="form-control" name="joining_date" value="{{old('joining_date')}}" placeholder="Date of joining">
            @error('joining_date')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div>

            <div class="form-group col-md-6">
              <label>Basic Salary</label>
              <input type="number" class="form-control" name="salary" id="basic_sal" value="{{old('salary')}}" placeholder="Salary">
              @error('salary')
                  <small class="error">{{ $message }}</small>
              @enderror
              <small class="error" id="basic_sal_error"></small>
            </div>
          </div>

          <div class="row">
              <div class="form-group col-md-6">
                  <label>DA %</label>
                  <input type="number" class="form-control" id="da" name="da" value="{{old('da')}}" placeholder="DA">
                  @error('da')
                      <small class="error">{{ $message }}</small>
                  @enderror
                  <small class="error" id="da_error"></small>
              </div>

              <div class="form-group col-md-6">
                  <label>HRA %</label>
                  <input type="number" class="form-control" name="hra" value="40" readonly placeholder="HRA">
                  @error('hra')
                      <small class="error">{{ $message }}</small>
                  @enderror
              </div>
          </div>

          <div class="row">
              <div class="form-group col-md-6">
                  <label>AGP</label>
                  <input type="number" onblur="getGrossSalary()" class="form-control" id="agp" name="agp" value="{{old('agp')}}" placeholder="AGP">
                  @error('agp')
                      <small class="error">{{ $message }}</small>
                  @enderror
                  <small class="error" id="agp_error"></small>
              </div>

              <div class="form-group col-md-6">
                  <label>Gross Salary</label>
                  <input type="number" class="form-control" id="gross_salary" readonly="true" value="{{old('gross_salary')}}" placeholder="Gross Salary">
                  @error('gross_salary')
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