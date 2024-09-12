@extends('layout.app')
@section('title') {{'Feature Image'}} @endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Responsive Table -->
   <div class="card">
      <div class="header-table-list">
          <h5 class="card-header">Feature Image Table</h5>
          <a href="{{ route('insert.feature-image') }}" type="button" class="btn btn-success">Add New</a>
      </div>
      <div class="table-responsive text-nowrap">
        <div class="row header-filter-table">
          <div class="col-sm-12 col-md-2">
            <div class="dataTables_length" id="add-row_length">
              <label class="d-flex">
                Show 
                <select id="add_row_length" name="add_row_length" aria-controls="add-row" class="select-length form-control form-control-sm">
                  <option value="10" {{ request('row_length') == 10 ? 'selected' : '' }}>10</option>
                  <option value="25" {{ request('row_length') == 25 ? 'selected' : '' }}>25</option>
                  <option value="50" {{ request('row_length') == 50 ? 'selected' : '' }}>50</option>
                  <option value="100" {{ request('row_length') == 100 ? 'selected' : '' }}>100</option>
                </select> entries 
              </label>
            </div>
          </div>
          <div class="col-sm-12 col-md-10 d-flex filter-control">
            <form action="{{ route('feature.image') }}" method="GET" class="d-flex">
              @csrf
              <input 
              type="search" 
              name="search" 
              class="form-control form-control-sm" 
              placeholder="Search..." 
              aria-label="Search..." 
              value="{{$search_value}}"
              />
            </form>
          </div>
        </div>
        <table class="table">
          <thead>
              <tr class="text-nowrap">
                  <th>#</th>
                  <th>Product ID</th>
                  <th>Image</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              @foreach($features_img as $feature_img)
              <tr>
                  <th scope="row">{{$feature_img->id}}</th>
                  <th scope="row">{{$feature_img->product_name}}</th>
                  <td><img src="{{ asset('uploads/features-img/' . $feature_img->image) }}" alt="banner" style="width: 30px;height: auto;"></td>
                  <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('update.feature-image', $feature_img->id)}}"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                            <a class="dropdown-item" href="{{route('delete-feature-image', $feature_img->id)}}" onclick="return confirmation(event)"><i class="bx bx-trash me-2"></i> Delete</a>
                          </div>
                        </div>
                      </td>
              </tr>
              @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td colspan="10" class="pagination-table">
                {{$features_img->onEachSide(1)->links()}}
              </td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <!--/ Responsive Table -->
</div>

@endsection