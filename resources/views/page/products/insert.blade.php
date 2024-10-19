@extends('layout.app')
@section('title') {{'Insert New Product'}} @endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products/</span> Form @yield('title')</h4>
    <!-- Basic Layout -->
    
    <form method="post" class="form-group" action="insert-data-product" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">@yield('title')</h5>
                    </div>
                    <div class="card-body">
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
                                        
                                    />
                                </div>
                                @error('name')
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
                                    />
                                </div>
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
                                        
                                    />
                                </div>
                                @error('discount_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
                                        
                                    />
                                </div>
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                                <select class="form-select" id="type" name="type" >
                                    <option value="">Chosse Type</option>
                                    <option value="new product">New Product</option>
                                    <option value="feature">Feature</option>
                                    <option value="best deal">Best Deal</option>
                                </select>
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="category_id" class="form-label">Select Categories <span class="text-danger">*</span></label>
                                <select class="form-select" id="category_id" name="category_id" >
                                    <option value="">Chosse Categories</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="brand_id" class="form-label">Select Brand <span class="text-danger">*</span></label>
                                <select class="form-select" id="brand_id" name="brand_id" >
                                    <option value="">Chosse Brand</option>
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="product_type" class="form-label">Select Product Type <span class="text-danger">*</span></label>
                                <select class="form-select" id="product_type" name="product_type" >
                                    <option value="">Chosse Product Type</option>
                                    @foreach($products_type as $product_type)
                                    <option value="{{$product_type->id}}">{{$product_type->name}}</option>
                                    @endforeach
                                </select>
                                @error('product_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="product_type" class="form-label">Select Accessaries Type <span class="text-danger">*</span></label>
                                <select class="form-select" id="product_type" name="accessary_id" >
                                    <option value="">Chosse Accessaries Type</option>
                                    @foreach($accessaries as $accessary)
                                    <option value="{{$accessary->id}}">{{$accessary->name}}</option>
                                    @endforeach
                                </select>
                                @error('product_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <label class="form-label" for="image">Image <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <input
                                        type="file"
                                        name="image"
                                        class="form-control"
                                        id="image"    
                                    />
                                </div>
                                @error('images')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="fw-bold py-2">Add Feature Product</h4>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Thumbnail</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-12 col-lg-6">
                                <label class="form-label" for="Thumbnail ">Thumbnail  Images</label>
                                <div class="input-group input-group-merge">
                                    <input
                                        type="file"
                                        name="thumbnails[]"
                                        class="form-control"
                                        id="Thumbnail "    
                                        multiple 
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Colors</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-12 col-lg-6 rams-blog">
                                @foreach ($colors as $color )
                                    <div class="d-flex align-items-center rams-check">
                                        <input type="checkbox" id="colors-{{$color->id}}" name="colors[]" value="{{$color->id}}">
                                        <label class="form-label" for="colors-{{$color->id}}">
                                            <span class="colors-check" style="background: {{$color->color_code}};"></span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Rams</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-12 col-lg-6 rams-blog">
                                @foreach ($rams as $ram )
                                    <div class="d-flex align-items-center rams-check">
                                        <input type="checkbox" id="rams-{{$ram->id}}" name="rams[]" value="{{$ram->id}}">
                                        <label class="form-label" for="rams-{{$ram->id}}">{{$ram->size}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Storages</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-12 col-lg-6 rams-blog">
                                @foreach ($storages as $storage )
                                    <div class="d-flex align-items-center rams-check">
                                        <input type="checkbox" id="storages-{{$storage->id}}" name="storages[]" value="{{$storage->id}}">
                                        <label class="form-label" for="storages-{{$storage->id}}">{{$storage->size}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Colors</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-12 col-lg-6 rams-blog">
                                <div class="d-flex align-items-center">
                                    <input type="checkbox" id="rams" name="rams[]" value="rams">
                                    <label class="form-label" for="rams">Rams</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   -->
            <h4 class="fw-bold py-2">Add Info Product</h4>
            <!-- button  -->
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button class="btn btn-danger"  onclick="history.back(); return false;">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection