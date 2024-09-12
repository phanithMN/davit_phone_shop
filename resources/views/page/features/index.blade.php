@extends('layout.app')
@section('title') {{'Feature'}} @endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Responsive Table -->
   <div class="card">
        <div class="header-table-list">
            <h5 class="card-header">Feature Table</h5>
            <a href="{{ route('insert.feature') }}" type="button" class="btn btn-success">Add New</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($features as $feature)
                <tr>
                    <th scope="row">{{$feature->id}}</th>
                    <td><img src="{{ asset('uploads/features/' . $feature->image) }}" alt="banner" style="width: 30px;height: auto;"></td>
                    <td>{{$feature->title}}</td>
                    <td>{{$feature->type}}</td>
                    <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ url('/edit-feature/'.$feature->id) }}"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                              <a class="dropdown-item" href="{{url('/delete-feature/'.$feature->id) }}" onclick="return confirmation(event)"><i class="bx bx-trash me-2"></i> Delete</a>
                            </div>
                          </div>
                        </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
    <!--/ Responsive Table -->
</div>

@endsection