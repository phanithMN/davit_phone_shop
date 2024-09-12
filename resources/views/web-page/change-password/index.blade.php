@extends('layout.web-app.app')
@section('title') {{'Change Password'}} @endsection
@section('content-web')
    <div class="container py-3 main-profile">
        <div class="row mt-5 mb-5">
          <div class="col-lg-3 pt-4 pt-lg-0">
            <div class="rounded-lg box-shadow-lg px-0 pb-0 mb-5 mb-lg-0 border">
              <div class="px-4 bg-fill rounded-top border-bottom">
                <div class="media align-items-center py-3">
                  <div class="img-thumbnail rounded-circle position-relative" style="width: 6.375rem;">
                    <img class="rounded-circle" src="https://lh3.googleusercontent.com/a/ACg8ocLckUD5FOwZL05AeKEUqcdXv8R90srDuE9jy6WH3LvJWo_zYJlz=s96-c?sz=150" alt="avatar">
                  </div>
                  <div class="media-body pl-3">
                    <h3 class="font-size-base mb-0">MN PHANITH</h3>
                    <span class="text-accent font-size-sm">phanith.mn@gmail.com</span>
                  </div>
                </div>
              </div>
              <div>
                @include('comons.menu-side-seeting')
              </div>
            </div>
          </div>
          <div class="col-lg-9">
              <div class="d-flex justify-content-between align-items-center pb-4 pb-lg-3 mb-lg-3">
                <h3 class="m-0 p-0" style="font-size: 25px ; color: #144194;">Change Password</h3>
              </div>
              <form action="{{route('update-password')}}" method="post" id="change-password" enctype="multipart/form-data">
                @csrf  
                @method('PUT')
                <div class="row px-4">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="current_password" class="form-label">Current Password <span class="required">*</span></label>
                      <div class="password-toggle">
                        <input type="password" name="current_password" value="" placeholder="*********" class="form-control" >
                        <div>
                          <label class="password-toggle-btn">
                            <input type="checkbox" class="custom-control-input">
                            <i class="bx bxs-low-vision password-toggle-indicator"></i>
                            <span class="sr-only">Show current_password</span>
                          </label>
                        </div>
                        @if($errors->has('current_password'))
                            <span class="text-danger pos-absolute">{{ $errors->first('current_password') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="new_password" class="form-label">New Password <span class="required">*</span></label>
                      <div class="password-toggle">
                        <input type="password" name="new_password" value="" placeholder="*********" class="form-control" >
                        <div>
                          <label class="password-toggle-btn">
                            <input type="checkbox" class="custom-control-input">
                            <i class="bx bxs-low-vision password-toggle-indicator"></i>
                            <span class="sr-only">Show new_password</span>
                          </label>
                        </div>
                        @if($errors->has('new_password'))
                          <span class="text-danger pos-absolute">{{ $errors->first('new_password') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="confirm_password" class="form-label">Re-enter your password <span class="required">*</span></label>
                      <div class="password-toggle">
                        <input type="password" name="confirm_password" value="" placeholder="*********" class="form-control" >
                        <div>
                          <label class="password-toggle-btn">
                            <input type="checkbox" class="custom-control-input">
                            <i class="bx bxs-low-vision password-toggle-indicator"></i>
                            <span class="sr-only">Show confirm_password</span>
                          </label>
                        </div>
                        @if($errors->has('confirm_password'))
                          <span class="text-danger pos-absolute">{{ $errors->first('confirm_password') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <hr class="mt-2 mb-3">
                    <div class="d-flex flex-wrap justify-content-center align-items-center mb-4 py-4">
                      <button type="submit" class="btn btn-primary mt-3 mt-sm-0 px-5">Update</button>
                    </div>
                  </div>
                </div>
              </form>
          </div>
        </div>
    </div>
@endsection