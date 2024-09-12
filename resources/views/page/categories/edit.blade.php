@extends('layout.app')
@section('title') {{'Update Categories'}} @endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Categories/</span> Form Update Categories</h4>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Update Categories</h5>
            </div>
            <div class="card-body">
                <form method ="post" class="form-group" action="{{ route('update-data-category',$category->id)}}" enctype="multipart/form-data">
                    @csrf  
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="name">Name</label>
                        <div class="input-group input-group-merge">
                            <input
                                type="text"
                                name="name"
                                value="{{$category->name}}"
                                class="form-control"
                                id="name"
                                placeholder="Insert Name"
                                aria-label="Insert Name"
                            />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Products Type</label>
                        <select class="form-select" id="type" aria-label="Default select example" name="product_type">
                          <option value="">Chosse Prodcuts Type</option>
                          @foreach($products_type as $product_type)
                          <option value="{{$product_type->id}}" {{$category->product_type == $product_type->id ? 'selected' : '' }}>{{$product_type->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button class="btn btn-danger"  onclick="history.back(); return false;">Cancel</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection