@extends('layout.app')
@section('title') {{'Update Product'}} @endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products/</span> Form Update Product</h4>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Update Product</h5>
            </div>
            <div class="card-body">
                <form method ="post" class="form-group" action="{{ url('/edit-data-product/'. $product->id)}}" enctype="multipart/form-data">
                    @csrf  
                    @method('PUT')
                    <div class="row">
                        <div class="mb-3 col-12 col-lg-6">
                            <label class="form-label" for="name">Name</label>
                            <div class="input-group input-group-merge">
                                <input
                                    type="text"
                                    name="name"
                                    value="{{$product->name}}"
                                    class="form-control"
                                    id="name"
                                    placeholder="Insert Name"
                                    aria-describedby="basic-icon-default-fullname2"
                                />
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-lg-6">
                            <label class="form-label" for="price">Price</label>
                            <div class="input-group input-group-merge">
                                <input
                                    type="number"
                                    name="price"
                                    value="{{$product->price}}"
                                    class="form-control"
                                    id="price"
                                    placeholder="Insert Price"
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
                                    value="{{$product->discount_price}}"
                                    step="any"
                                />
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-lg-6">
                            <label class="form-label" for="quantity">Quantity</label>
                            <div class="input-group input-group-merge">
                                <input
                                    type="number"
                                    name="quantity"
                                    class="form-control"
                                    id="quantity"    
                                    placeholder="Insert quantity"
                                    value="{{$product->quantity}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-lg-6">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-select" id="type" aria-label="Default select example" name="type">
                                <option value="">Chosse Type</option>
                                <option value="new product" {{$product->type == 'new product' ? 'selected' : '' }}>New Product</option>
                                <option value="feature" {{$product->type == 'feature' ? 'selected' : '' }}>Feature</option>
                                <option value="best deal" {{$product->type == 'best deal' ? 'selected' : '' }}>Best Deal</option>
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-lg-6">
                            <label for="type" class="form-label">Select Categories</label>
                            <select class="form-select" id="type" aria-label="Default select example" name="category_id">
                                <option value="">Chosse Categories</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-lg-6">
                            <label for="type" class="form-label">Select Brand</label>
                            <select class="form-select" id="type" aria-label="Default select example" name="brand_id">
                                <option value="">Chosse Brand</option>
                                @foreach($brands as $brand)
                                <option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? 'selected' : '' }}>{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-lg-6">
                            <label for="product_type" class="form-label">Select Product Type</label>
                            <select class="form-select" id="product_type" aria-label="Default select example" name="product_type">
                                <option value="">Chosse Product Type</option>
                                @foreach($products_type as $product_type)
                                <option value="{{$product_type->id}}" {{$product_type->id == $product->product_type ? 'selected' : '' }}>{{$product_type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-12 col-lg-6">
                            <label for="product_type" class="form-label">Select Accessaries Type</label>
                            <select class="form-select" id="product_type" aria-label="Default select example" name="accessary_id">
                                <option value="">Chosse Accessaries Type</option>
                                @foreach($accessaries as $accessary)
                                <option value="{{$accessary->id}}" {{$accessary->id == $product->accessary_id ? 'selected' : '' }}>{{$accessary->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3 col-12 col-lg-6">
                            <label class="form-label" for="image">Image</label>
                            <div class="input-group input-group-merge">
                                <input
                                    type="file"
                                    name="image"
                                    class="form-control"
                                    id="image"    
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