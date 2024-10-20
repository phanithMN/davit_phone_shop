@extends('layout.web-app.app')
@section('title') {{'Profile'}} @endsection
@section('content-web')
    <div class="container py-3 main-profile">
        <div class="row mt-5 mb-5">
          <div class="col-lg-3 pt-4 pt-lg-0">
            <div class="rounded-lg box-shadow-lg px-0 pb-0 mb-5 mb-lg-0 border">
              <div class="px-4 bg-fill rounded-top border-bottom">
                <div class="media align-items-center py-3">
                  <div class="img-thumbnail rounded-circle position-relative" style="width: 6.375rem;">
                    <img class="rounded-circle" src="{{!is_null(Auth::guard('customer')->user()) && isset(Auth::guard('customer')->user()->image) ? asset('uploads/users/' . Auth::guard('customer')->user()->image) : '../assets/img/avatars/1.png'  }}" alt="avatar">
                  </div>
                  <div class="media-body pl-3">
                    <h3 class="font-size-base mb-0">{{!is_null(Auth::guard('customer')->user()) && isset(Auth::guard('customer')->user()->name) ? Auth::guard('customer')->user()->name : 'Admin'  }}</h3>
                    <span class="text-accent font-size-sm">{{!is_null(Auth::guard('customer')->user()) && isset(Auth::guard('customer')->user()->email) ? Auth::guard('customer')->user()->email : 'admin@gmail.com'  }}</span>
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
                <h3 class="m-0 p-0" style="font-size: 25px ; color: #144194;">Personal Information</h3>
              </div>
              <form id="formAccountSettings" method="post" action="{{ route('profile-update-data-setting')}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="bg-secondary rounded-lg p-4 mb-4">
                  <div class="avatar-wrapper">
                    <div class="spinner">
                      <div class="spinner-dot"></div>
                      <div class="spinner-dot"></div>
                      <div class="spinner-dot"></div>
                    </div>
                    <div id="avatar"></div>
                    <div id="avatar-control-buttons" class="text-center d-none">
                      <button type="button" id="cancel-upload" class="btn btn-light btn-shadow btn-sm mb-2">
                        <i class="czi-close mr-2"></i>Cancel </button>
                      <button type="submit" id="save-photo" class="btn btn-light btn-shadow btn-sm mb-2">
                        <i class="czi-check mr-2"></i>Save </button>
                    </div>
                    <div id="avatar-controls" class="media align-items-center px-4">
                      <img class="rounded-circle" src="{{!is_null(Auth::guard('customer')->user()) && isset(Auth::guard('customer')->user()->image) ? asset('uploads/users/' . Auth::guard('customer')->user()->image) : '../assets/img/avatars/1.png'  }}" width="90" alt="avatar">
                      <div class="media-body pl-3">
                        <button type="button" class="btn btn-light btn-shadow btn-sm mb-2" id="change-avatar" data-toggle="modal" data-target="#choose-modal">
                          <i class='bx bx-revision mr-1'></i>Change avatar </button>
                        <div class="p mb-0 font-size-ms text-muted">Upload JPG, PNG image required.</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="choose-modal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-4 avatar-source" id="no-photo" data-url="https://soklyphone.com/account/profile/avatar/update/external">
                            <img src="https://soklyphone.com/img/avatar.jpeg" class="rounded-circle img-thumbnail img-responsive">
                            <p class="mt-3 mt-3">Default</p>
                          </div>
                          <div class="col-md-4 avatar-source">
                            <div class="btn btn-light btn-upload bg-white">
                              <i class="fa fa-upload"></i>
                              <input type="file" name="image" id="avatar-upload" accept="image/png, image/jpeg">
                            </div>
                            <p class="mt-3">Upload Photo</p>
                          </div>
                          <div class="col-md-4 avatar-source source-external" data-url="{{!is_null(Auth::guard('customer')->user()) && isset(Auth::guard('customer')->user()->image) ? asset('uploads/users/' . Auth::guard('customer')->user()->image) : '../assets/img/avatars/1.png'  }}">
                            <img src="{{!is_null(Auth::guard('customer')->user()) && isset(Auth::guard('customer')->user()->image) ? asset('uploads/users/' . Auth::guard('customer')->user()->image) : '../assets/img/avatars/1.png'  }}" class="rounded-circle img-thumbnail img-responsive">
                            <p class="mt-3">Profile</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <div class="row px-4">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="name" class="">Full Name</label>
                      <div class="password-toggle">
                        <input type="text" name="name" value="{{!is_null(Auth::guard('customer')->user()) && isset(Auth::guard('customer')->user()->name) ? Auth::guard('customer')->user()->name : '' }}" placeholder="Enter your full name" class="form-control ">
                        <div>
                          <label class="password-toggle-btn">
                            <i class='bx bxs-user password-toggle-indicator'></i>
                            <span class="sr-only">Show name</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="birthday" class="">Birthday</label>
                      <div class="input-group date" data-provide="datepicker" data-date-format="dd-M-yyyy">
                        <input type="text" name="dob" value="{{!is_null(Auth::guard('customer')->user()) && isset(Auth::guard('customer')->user()->dob) ? Auth::guard('customer')->user()->dob : '' }}" placeholder="Enter your birthday" class="form-control " onkeypress="disableInput(event);">
                        <div class="input-group-addon">
                          <label class="password-toggle-btn">
                            <i class="bx bx-calendar-alt password-toggle-indicator"></i>
                            <span class="sr-only">Show birthday</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="email" class="">Email</label>
                      <div class="password-toggle">
                        <input type="email" name="email" value="{{!is_null(Auth::guard('customer')->user()) && isset(Auth::guard('customer')->user()->email) ? Auth::guard('customer')->user()->email : '' }}" placeholder="Enter your email" class="form-control ">
                        <div>
                          <label class="password-toggle-btn">
                            <i class="bx bx-envelope password-toggle-indicator"></i>
                            <span class="sr-only">Show email</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="phone" class="">Phone Number</label>
                      <div class="password-toggle">
                        <input type="text" name="phone_number" value="{{!is_null(Auth::guard('customer')->user()) && isset(Auth::guard('customer')->user()->phone_number) ? Auth::guard('customer')->user()->phone_number : '' }}" placeholder="Enter your phone number" class="form-control " onkeypress="inputNumber(event);">
                        <div>
                          <label class="password-toggle-btn">
                            <i class="bx bxs-phone password-toggle-indicator"></i>
                            <span class="sr-only">Show phone</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 mb-lg-4">
                    <label>Address</label>
                    <textarea name="address" class="form-control" placeholder="Enter your address">{{!is_null(Auth::guard('customer')->user()) && isset(Auth::guard('customer')->user()->address) ? old('address', Auth::guard('customer')->user()->address) : '' }}</textarea>
                  </div>
                  <div class="col-12">
                    <hr class="mt-2 mb-3">
                    <div class="d-flex flex-wrap justify-content-center align-items-center mb-4 py-4">
                      <button type="submit" class="btn btn-primary btn-update mt-3 mt-sm-0 px-5">Update</button>
                    </div>
                  </div>
                </div>
              </form>
          </div>
        </div>
    </div>
@endsection