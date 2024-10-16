@extends('layout.app')
@section('title') {{'Coupons'}} @endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Responsive Table -->
   <div class="card">
        <div class="header-table-list">
            <h5 class="card-header"> @yield('title') Table</h5>
            <a href="{{ route('insert-admin-coupon') }}" type="button" class="btn btn-success">Add New</a>
        </div>
        <div class="table-responsive text-nowrap">
          <div class="row header-filter-table">
           
            
          <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th style="width: 1%">#</th>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Value</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($coupons as $key => $coupon)
                <tr>
                    <td>{{$key}}</td>
                    <td>{{$coupon->code}}</td>
                    <td>{{$coupon->title}}</td>
                    <td>${{$coupon->value}}</td>
                    <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ route('update-admin-coupon', $coupon->id) }}"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                              <a class="dropdown-item" href="{{ route('delete-admin-coupon', $coupon->id) }}" onclick="return confirmation(event)"><i class="bx bx-trash me-2"></i> Delete</a>
                            </div>
                          </div>
                        </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
    <!--/ Responsive Table -->
</div>

@endsection