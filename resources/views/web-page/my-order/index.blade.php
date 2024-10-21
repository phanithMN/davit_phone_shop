@extends('layout.web-app.app')
@section('title') {{'My Order'}} @endsection
@section('content-web')
    <div class="container py-3 main-profile">
        <div class="row mt-5 mb-5">
            <div class="col-lg-3 pt-4 pt-lg-0">
              <div class="rounded-lg box-shadow-lg px-0 pb-0 mb-5 mb-lg-0 border">
                <div class="px-4 bg-fill rounded-top border-bottom">
                  <div class="media align-items-center py-3">
                    <div class="img-thumbnail rounded-circle position-relative" style="width: 6.375rem;">
                      <img class="rounded-circle" src="{{!is_null(Auth::guard('customer')->user()) && isset(Auth::guard('customer')->user()->image) ? asset('uploads/users/' . Auth::guard('customer')->user()->image) : '../assets/img/avatars/1.png'  }}"  alt="avatar">
                    </div>
                    <div class="media-body pl-3">
                      <h3 class="font-size-base mb-0">{{!is_null(Auth::guard('customer')->user()) && isset(Auth::guard('customer')->user()->name) ? Auth::guard('customer')->user()->name : '' }}</h3>
                      <span class="text-accent font-size-sm">{{!is_null(Auth::guard('customer')->user()) && isset(Auth::guard('customer')->user()->email) ? Auth::guard('customer')->user()->email : '' }}</span>
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
                <h3 class="m-0 p-0" style="font-size: 25px ; color: #144194;">@yield('title')</h3>
              </div>
              <div class="table-responsive font-size-md">
                <table class="table table-hover mb-0 text-center">
                  <thead class="bg-fill rounded-top">
                    <tr>
                      <th>#</th>
                      <th>Order ID</th>
                      <th>Product ID</th>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($order_items as $item)
                      <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->order_id}}</td>
                        <td>{{$item->product_id}}</td>
                        <td>{{$item->product_name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>${{number_format($item->price, 2)}}</td>
                        <td>{{$item->created_at->format('Y-m-d');}}</td>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
@endsection