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
      <div class="card-header">{{ $data['title'] }}</div>
      <div class="card-body">
        @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session()->get('success') }}
          </div>
        @endif
        <form method="post" enctype="multipart/form-data" action="/employee-profile/{{$data['user']['id']}}/update">
           @csrf
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
              <input readonly type="email" class="form-control" value="{{ old('email',$data['user']['email'])}}" placeholder="Email">
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
              
              @if(isset($data['user']['profile_image']))
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
          
          

          <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        
      </div>
    </div>
  </div>
  @endsection