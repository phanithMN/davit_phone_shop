@extends('layout.app')
@section('title') {{'Categories'}} @endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Responsive Table -->
   <div class="card">
        <div class="header-table-list">
            <h5 class="card-header">Categories Table</h5>
            <a href="{{ route('insert.category') }}" type="button" class="btn btn-success">Add New</a>
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
                <script>
                    document.getElementById('add_row_length').addEventListener('change', function() {
                        let value = this.value;
                        let url = new URL(window.location.href);
                        url.searchParams.set('row_length', value);
                        window.location.href = url.toString();
                    });
                </script>
              </div>
            </div>
           
            <div class="col-sm-12 col-md-10 d-flex filter-control">
              <select class="form-select form-select-sm" id="product_type" name="product_type">
                <option value="">Chosse Product Type</option>
                @foreach ($products_type as $product_type )
                  <option value="{{$product_type->name}}" {{ request('product_type') == $product_type->name ? 'selected' : '' }}>{{$product_type->name}}</option>
                @endforeach
              </select>
              <script>
                document.getElementById('product_type').addEventListener('change', function() {
                    let value = this.value;
                    let url = new URL(window.location.href);
                    url.searchParams.set('product_type', value);
                    window.location.href = url.toString();
                });
              </script>
              <form action="{{ route('category') }}" method="GET" class="d-flex">
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
                    <th>Name Categories</th>
                    <th>Product Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->products_type_name}}</td>
                    <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ route('update-category',$category->id) }}"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                              <a class="dropdown-item" href="{{ route('delete-category',$category->id) }}" onclick="return confirmation(event)"><i class="bx bx-trash me-2"></i> Delete</a>
                            </div>
                          </div>
                        </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td colspan="10" class="pagination-table">
                  {{$categories->onEachSide(1)->links()}}
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
    </div>
    <!--/ Responsive Table -->
</div>

@endsection