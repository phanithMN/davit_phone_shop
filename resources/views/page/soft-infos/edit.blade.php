@extends('layout.app')
@section('title') {{'Update Soft Info'}} @endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products/</span> Form Update Soft Info</h4>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Update Soft Info</h5>
            </div>
            <div class="card-body">
                <form method="post" class="form-group" action="{{ route('edit-data-soft-info', $softinfo->id)}}" enctype="multipart/form-data">
                    @csrf  
                    @method('PUT')
                    <div class="mb-3">
                        <label for="product" class="form-label">Select Product</label>
                        <select class="form-select" id="product" aria-label="Default select example" name="product_id">
                          <option value="">Chosse Product</option>
                          @foreach($products as $product)
                            <option value="{{$product->id}}" {{$product->id == $softinfo->product_id ? 'selected' : ''}}>{{$product->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
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
                    <div class="mb-3">
                        <label class="form-label" for="level">Level</label>
                        <div class="input-group input-group-merge">
                            <input
                                type="text"
                                name="level"
                                class="form-control"
                                id="level"
                                placeholder="Insert level"
                                value={{$softinfo->level}}
                            />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description">Description</label>
                        <div class="input-group input-group-merge">
                            <input
                                type="text"
                                name="description"
                                class="form-control"
                                id="description"
                                placeholder="Insert description"
                                value={{ $softinfo->description}}
                            />
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