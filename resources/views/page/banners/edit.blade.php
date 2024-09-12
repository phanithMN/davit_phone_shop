@extends('layout.app')
@section('title') {{'Update Banner'}} @endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Banners/</span> Form Update Banner</h4>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Update Banner</h5>
            </div>
            <div class="card-body">
                <form method ="post" class="form-group" action="{{ url('/edit-data-banner/'. $banner->id)}}" enctype="multipart/form-data">
                    @csrf  
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Title</label>
                        <div class="input-group input-group-merge">
                            <input
                                type="text"
                                name="title"
                                value="{{$banner->title}}"
                                class="form-control"
                                id="basic-icon-default-fullname"
                                placeholder="Insert Title"
                                aria-describedby="basic-icon-default-fullname2"
                            />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Sub Title</label>
                        <div class="input-group input-group-merge">
                            <input
                                type="text"
                                name="sub_title"
                                value="{{$banner->sub_title}}"
                                class="form-control"
                                id="basic-icon-default-fullname"
                                placeholder="Insert Sub Title"
                                aria-describedby="basic-icon-default-fullname2"
                            />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Image</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                            <input
                                type="file"
                                name="image"
                                class="form-control"
                                id="basic-icon-default-fullname"    
                                placeholder="Insert Name"
                                aria-label="Insert Name"
                                aria-describedby="basic-icon-default-fullname2"
                            />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="badget">Badget</label>
                        <div class="input-group input-group-merge">
                            <input
                                type="text"
                                name="badget"
                                class="form-control"
                                id="badget"    
                                placeholder="Insert Badeget"
                                aria-label="Insert Badeget"
                                value="{{$banner->badget}}"
                            />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Select Type</label>
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="type">
                          <option value="">Chosse Type</option>
                          <option value="slide" {{$banner->type == 'slide' ? 'selected' : '' }}>Slide</option>
                          <option value="feature" {{$banner->type == 'feature' ? 'selected' : '' }}>Feature</option>
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