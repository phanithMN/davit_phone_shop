@extends('layout.app')
@section('title') {{'Insert Feature'}} @endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Feature/</span> Form Insert Feature</h4>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Insert Feature</h5>
            </div>
            <div class="card-body">
                <form method="post" class="form-group" action="insert-data-feature" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <div class="input-group input-group-merge">
                            <input
                                type="text"
                                name="title"
                                class="form-control"
                                id="title"
                                placeholder="Insert title"
                            />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="sub_title">Sub Title</label>
                        <div class="input-group input-group-merge">
                            <input
                                type="text"
                                name="sub_title"
                                class="form-control"
                                id="sub_title"
                                placeholder="Insert sub title"
                            />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="Image">Image</label>
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
                        <label for="type" class="form-label">Type</label>
                        <select class="form-select" id="type" aria-label="type" name="type">
                          <option value="">Chosse Type</option>
                          <option value="Feature Top">Feature Top</option>
                          <option value="Feature Center">Feature Center</option>
                          <option value="Feature Bottom">Feature Bottom</option>
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