@extends('layout.app')
@section('title') {{'Insert New Product'}} @endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products/</span> Form @yield('title')</h4>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">@yield('title')</h5>
            </div>
            <div class="card-body">
                <form method="post" class="form-group" action="insert-data-product" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-12 col-lg-6">
                            <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                            <div class="input-group input-group-merge">
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    id="name"
                                    placeholder="Insert Name"
                                    required
                                />
                            </div>
                            @error('product_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-12 col-lg-6">
                            <label class="form-label" for="price">Price <span class="text-danger">*</span></label>
                            <div class="input-group input-group-merge">
                                <input
                                    type="number"
                                    name="price"
                                    class="form-control"
                                    id="price"
                                    placeholder="Insert Price"
                                    step="any"
                                    required
                                />
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-lg-6">
                            <label class="form-label" for="discount_price">Price Discount</label>
                            <div class="input-group input-group-merge">
                                <input
                                    type="number"
                                    name="discount_price"
                                    class="form-control"
                                    id="discount_price"
                                    placeholder="Insert Discount Price"
                                    step="any"
                                    required
                                />
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-lg-6">
                            <label class="form-label" for="quantity">Quantity <span class="text-danger">*</span></label>
                            <div class="input-group input-group-merge">
                                <input
                                    type="number"
                                    name="quantity"
                                    class="form-control"
                                    id="quantity"    
                                    placeholder="Insert quantity"
                                    aria-label="Insert quantity"
                                    aria-describedby="quantity"
                                    required
                                />
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-lg-6">
                            <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                            <select class="form-select" id="type" name="type" required>
                                <option value="">Chosse Type</option>
                                <option value="new product">New Product</option>
                                <option value="feature">Feature</option>
                                <option value="best deal">Best Deal</option>
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-lg-6">
                            <label for="category_id" class="form-label">Select Categories <span class="text-danger">*</span></label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                <option value="">Chosse Categories</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-lg-6">
                            <label for="brand_id" class="form-label">Select Brand <span class="text-danger">*</span></label>
                            <select class="form-select" id="brand_id" name="brand_id" required>
                                <option value="">Chosse Brand</option>
                                @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-lg-6">
                            <label for="product_type" class="form-label">Select Product Type <span class="text-danger">*</span></label>
                            <select class="form-select" id="product_type" name="product_type" required>
                                <option value="">Chosse Product Type</option>
                                @foreach($products_type as $product_type)
                                <option value="{{$product_type->id}}">{{$product_type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-lg-6">
                            <label for="product_type" class="form-label">Select Accessaries Type <span class="text-danger">*</span></label>
                            <select class="form-select" id="product_type" name="accessary_id" required>
                                <option value="">Chosse Accessaries Type</option>
                                @foreach($accessaries as $accessary)
                                <option value="{{$accessary->id}}">{{$accessary->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-lg-6">
                            <label class="form-label" for="image">Image <span class="text-danger">*</span></label>
                            <div class="input-group input-group-merge">
                                <input
                                    type="file"
                                    name="image"
                                    class="form-control"
                                    id="image"    
                                    placeholder="Insert Name"
                                    aria-label="Insert Name"
                                    required
                                />
                            </div>
                        </div>
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