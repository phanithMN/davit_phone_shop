@extends('layout.app')
@section('title') {{'Insert Blog'}} @endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Blog/</span> Form Insert Blog</h4>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Insert Blog</h5>
            </div>
            <div class="card-body">
                <form method="post" class="form-group" action="{{route('data-insert-blog')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <div class="input-group input-group-merge">
                            <input
                                type="text"
                                name="title"
                                class="form-control"
                                placeholder="Insert Title"
                                aria-label="Insert Title"
                            />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="date">Date</label>
                        <div class="input-group input-group-merge">
                            <input
                                type="date"
                                name="date"
                                class="form-control"
                                placeholder="Insert Date"
                                aria-label="Insert Date"
                            />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description">Descriptin</label>
                        <div class="input-group input-group-merge">
                            <textarea id="description" class="form-control" name="description" rows="10" cols="50"> {{ old('content') }}</textarea>
                        </div>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button class="btn btn-danger"  onclick="history.back(); return false;">Cancel</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection