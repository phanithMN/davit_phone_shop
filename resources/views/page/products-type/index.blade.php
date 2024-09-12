@extends('layout.app')
@section('title') {{'Products Type'}} @endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Responsive Table -->
   <div class="card">
        <div class="header-table-list">
            <h5 class="card-header">Products Type Table</h5>
            <a href="{{ route('insert-product-type') }}" type="button" class="btn btn-success">Add New</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th>#</th>
                    <th>Name Categories</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products_type as $product_type)
                <tr>
                    <th scope="row">{{$product_type->id}}</th>
                    <td>{{$product_type->name}}</td>
                    <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ route('update-product-type',$product_type->id) }}"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                              <a class="dropdown-item" href="{{ route('delete-product-type',$product_type->id) }}" onclick="return confirmation(event)"><i class="bx bx-trash me-2"></i> Delete</a>
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