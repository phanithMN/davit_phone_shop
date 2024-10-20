@extends('layout.app-auth')
@section('title') {{'Register'}} @endsection
@section('content-auth')

<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner" style="max-width: 550px;">
      <!-- Register Card -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="index.html" class="app-brand-link gap-2">
              <span class="app-brand-text demo text-body fw-bolder">Register Account </span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Please sign up new account! 🚀</h4>
          <p class="mb-4">Make your app management easy and fun!</p>
          <form method="POST" action="{{ route('customer.register.submit') }}" class="mb-3" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="mb-3 form-password-toggle col-lg-12">
                  <label for="image">Image</label>
                  <input
                      type="file"
                      name="image"
                      class="form-control"
                      id="image"    
                  />
                  @error('image')
                      <span>{{ $message }}</span>
                  @enderror
              </div>
              <div class="mb-3 form-password-toggle col-lg-6">
                  <label for="name">Name</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="input name">
                  @error('name')
                      <span>{{ $message }}</span>
                  @enderror
              </div>
              <div class="mb-3 form-password-toggle col-lg-6">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="input email">
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3 form-password-toggle col-lg-6">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="input password">
                  @error('password')
                      <span>{{ $message }}</span>
                  @enderror
              </div>

              <div class="mb-3 form-password-toggle col-lg-6">
                  <label for="password_confirmation">Confirm Password</label>
                  <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="confirm password">
              </div>
              <div class="mb-3 form-password-toggle col-lg-6">
                  <label for="phone_number">Phone Number</label>
                  <input type="number" name="phone_number" id="phone_number" class="form-control" placeholder="input phone number">
              </div>
              <div class="mb-3 form-password-toggle col-lg-6">
                  <label for="dob">Date of Birth</label>
                  <input type="date" name="dob" id="dob" class="form-control" placeholder="input Date of Birth">
              </div>
              <div class="mb-3 form-password-toggle col-lg-12">
                  <label for="address">Address</label>
                  <textarea id="address" name="address" rows="4" cols="50" class="form-control" placeholder="input address"></textarea>
              </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary d-grid w-100">Register</button>
            </div>
          </form>
          <p class="text-center">
            <span>Already have an account?</span>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="align-middle">{{ __('Sign in') }}</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </p>
        </div>
      </div>
      <!-- Register Card -->
    </div>
  </div>
</div>

@endsection
