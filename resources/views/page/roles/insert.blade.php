@extends('layout.app')
@section('title') {{'Insert Role'}} @endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">@yield('title')/</span> Form Insert @yield('title')</h4>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">@yield('title')</h5>
            </div>
            <div class="card-body">
                <form method="post" class="form-group" action="{{route('insert-data-role')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="name">Name</label>
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