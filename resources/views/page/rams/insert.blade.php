@extends('layout.app')
@section('title') {{'Ram Insert'}} @endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ram/</span> Form Insert Ram</h4>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Insert Ram</h5>
            </div>
            <div class="card-body">
                <form method="post" class="form-group" action="{{route('insert-data-ram')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="title">Size</label>
                        <div class="input-group input-group-merge">
                            <input
                                type="text"
                                name="size"
                                class="form-control"
                                id="size"
                                placeholder="Insert size"
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