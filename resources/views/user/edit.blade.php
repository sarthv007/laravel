@extends('layouts.main')

@section('content')
@include('layouts.nav')
<div id="wrapper">
@include('layouts.sidebar')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



 <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session()->get('success') }}
          </div>
        @endif
        <form method="post" enctype="multipart/form-data" action="/update/{{$data['user']['id']}}">
           @csrf

           <div class="form-group">
              <label>Employee Code</label>
              <input type="text" class="form-control" readonly="true" value="{{ old('employee_code',$data['user']->employee_code)}}" placeholder="Employee Code">
              @error('employee_code')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>

          <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>First Name</label>
              <input type="text" class="form-control" name="first_name" value="{{ old('first_name',$data['user']['first_name'])}}" placeholder="First Name">
              @error('first_name')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" class="form-control" name="last_name" value="{{ old('last_name',$data['user']['last_name'])}}" placeholder="First Name">
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
              <input type="email" class="form-control" name="email" value="{{ old('email',$data['user']['email'])}}" placeholder="Email">
              @error('email')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
           </div> 


          <div class="col-md-6"> 
            <div class="form-group">
              <label>Contact Number</label>
              <input type="number" class="form-control" name="phone" value="{{ old('phone',$data['user']['phone'])}}" placeholder="Contact Number">
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
              @if(isset($user->profile_image))
                      <img style="margin:10px;border:1px solid silver;width: 40px;height: 40px;" src="{{ asset('storage/'.$data['user']['profile_image']) }}">
                      @else
                      <img style="margin:10px;border:1px solid silver;width: 40px;height: 40px;" src="{{ asset('img/user.jpg') }}">
                      @endif
              @error('profile_image')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          

          <div class="form-group col-md-6">
            <label>Select Department</label>
            <select class="form-control" name="department_id">
              <option value="">select department</option>
              
              @foreach($data['departments'] as $department)
                <option value="{{$department->id}}" {{ $data['user']['department_id'] == $department->id ? 'selected' : '' }}>{{$department->name}}</option>    
              @endforeach
              
              
            </select>
            @error('department')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label>Select Gender</label>
            <select class="form-control" name="gender">
              <option value="">select gender</option>
              <option {{ $data['user']['gender'] == 'Male' ? 'selected' : '' }} value="Male">Male</option>
              <option {{ $data['user']['gender'] == 'FeMale' ? 'selected' : '' }} value="FeMale">FeMale</option>
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
                <option {{ $role->id == $data['user']['role_id'] ? 'selected' : '' }} value="{{$role->id}}">{{ucfirst($role->role)}}</option>    
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
              <input type="date" class="form-control" name="dob" value="{{old('dob',$data['user']['dob'])}}" placeholder="Contact Number">
              @error('dob')
                  <small class="error">{{ $message }}</small>
              @enderror
            </div>
          

          <div class="form-group col-md-6">
            <label>Adhar Number</label>
              <input type="text" class="form-control" name="adhar_number" value="{{old('adhar_number',$data['user']['adhar_number'])}}" placeholder="Adhar Number">
              @error('adhar_number')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div>
        </div>

          <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" name="address" placeholder="Address">{{old('address',$data['user']['address'])}}</textarea>
            @error('address')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div>
          
          <div class="row">
          <div class="form-group col-md-6">
            <label>Date of joining</label>
            <input type="date" class="form-control" name="joining_date" value="{{old('joining_date',$data['user']['joining_date'])}}" placeholder="Date of joining">
            @error('joining_date')
                  <small class="error">{{ $message }}</small>
              @enderror
          </div>

            <div class="form-group col-md-6">
              <label>Salary</label>
              <input type="number" class="form-control" id="basic_sal" name="salary" value="{{old('salary',$data['user']['salary'])}}" placeholder="Salary">
              @error('salary')
                  <small class="error">{{ $message }}</small>
              @enderror
              <small class="error" id="basic_sal_error"></small>
            </div>
          </div>



          <div class="row">
              <div class="form-group col-md-6">
                  <label>DA %</label>
                  <input type="number" class="form-control" id="da" name="da" value="{{old('da',$data['user']['da_percent'])}}" placeholder="DA">
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
                  <input type="number" onblur="getGrossSalary()" class="form-control" id="agp" name="agp" value="{{old('agp',$data['user']['agp'])}}" placeholder="AGP">
                  @error('agp')
                      <small class="error">{{ $message }}</small>
                  @enderror
                  <small class="error" id="agp_error"></small>
              </div>

              <div class="form-group col-md-6">
                  <label>Gross Salary</label>
                  <input type="number" class="form-control" id="gross_salary" readonly="true" value="{{old('gross_salary',$data['user']['gross_salary'])}}" placeholder="Gross Salary">
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