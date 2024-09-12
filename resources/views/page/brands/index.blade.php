@extends('layout.app')
@section('title') {{'Brand'}} @endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Responsive Table -->
   <div class="card">
        <div class="header-table-list">
            <h5 class="card-header">Brands Table</h5>
            <a href="{{ route('insert.brand') }}" type="button" class="btn btn-success">Add New</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th>#</th>
                    <th>Image</th>
                    <th>Name Brand</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $brand)
                <tr>
                    <th scope="row">{{$brand->id}}</th>
                    <td><img src="{{ asset('uploads/brands/' . $brand->image) }}" alt="banner" style="width: 30px;height: auto;"></td>
                    <td>{{$brand->name}}</td>
                    <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ route('update.brand',$brand->id) }}"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                              <a class="dropdown-item" href="{{route('delete-brand',$brand->id)}}" onclick="return confirmation(event)"><i class="bx bx-trash me-2"></i> Delete</a>
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