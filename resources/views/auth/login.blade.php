@extends('layouts.main')
@section('content')
<div class="back-img">
<div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="form-group">
            <div class="form-label-group">
              <input id="inputEmail" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus="autofocus">

                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              <label for="inputEmail">username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">

              <input id="inputPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="inputPassword">Password</label>
            </div>
          </div>

          <div class="form-group">
            <div class="form-label-group">
              <select name="role" id="role" class="form-control">
                <option>Select Role</option>
                @foreach($roles as $role)
                <option value="{{$role->id}}">{{ucfirst($role->role)}}</option>
                @endforeach
              </select>
            </div>     
          </div>    
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                Remember Password
              </label>
            </div>
          </div>
          <button style="width:100%;" type="submit" class="btn btn-primary btn-block">
            {{ __('Login') }}
        </button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
</div>  
@endsection
