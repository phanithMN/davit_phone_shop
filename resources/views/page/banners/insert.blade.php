@extends('layout.app')
@section('title') {{'Silde Banner'}} @endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Silde Banner/</span> Form Insert Silde Banner</h4>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Insert Banner</h5>
            </div>
            <div class="card-body">
                <form method="post" class="form-group" action="insert-data-banner" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Title</label>
                        <div class="input-group input-group-merge">
                            <input
                                type="text"
                                name="title"
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
                            />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Select Type</label>
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="type">
                          <option value="">Chosse Type</option>
                          <option value="slide">Slide</option>
                          <option value="feature">Feature</option>
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