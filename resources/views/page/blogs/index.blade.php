@extends('layout.app')
@section('title') {{'Blog'}} @endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Responsive Table -->
   <div class="card">
        <div class="header-table-list">
            <h5 class="card-header">Blog Table</h5>
            <a href="{{ route('insert-blog') }}" type="button" class="btn btn-success">Add New</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>User ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                <tr>
                    <th scope="row">{{$blog->id}}</th>
                    <td><img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="banner" style="width: 30px;height: auto;"></td>
                    <td>{{$blog->title}}</td>
                    <td>{{$blog->date}}</td>
                    <td>{{$blog->user_name}}</td>
                    <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ route('update-blog',$blog->id) }}"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                              <a class="dropdown-item" href="{{route('delete-blog',$blog->id)}}" onclick="return confirmation(event)"><i class="bx bx-trash me-2"></i> Delete</a>
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