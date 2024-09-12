@extends('layout.app')
@section('title') {{'Stock'}} @endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Responsive Table -->
   <div class="card">
        <div class="header-table-list">
            <h5 class="card-header"> @yield('title') Table</h5>
            <a href="{{ route('insert-stock') }}" type="button" class="btn btn-success">Add New</a>
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
              <form action="{{ route('stock') }}" method="GET" class="d-flex" id="search">
                @csrf
                <input 
                type="search" 
                name="search" 
                class="form-control form-control-sm" 
                placeholder="Search..." 
                aria-label="Search..." 
                value="{{ request('search')}}"
                onchange="document.getElementById('search').submit();" 
                />
              </form>
            </div>
          </div>
          <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th style="width: 1%">#</th>
                    <th style="width: 1%">SKU</th>
                    <th style="width: 1%">Product</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stocks as $stock)
                <tr>
                  <td>{{$stock->id}}</td>
                  <td>{{$stock->sku}}</td>
                  <td>{{$stock->product_name}}</td>
                  <td>{{$stock->item_name}}</td>
                  <td>{{$stock->quantity}}</td>
                  <td>${{$stock->price}}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('update-stock', $stock->id) }}"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                        <a class="dropdown-item" href="{{ route('delete-stock', $stock->id) }}" onclick="return confirmation(event)"><i class="bx bx-trash me-2"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td colspan="10" class="pagination-table">
                  {{$stocks->onEachSide(1)->links()}}
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
    </div>
    <!--/ Responsive Table -->
</div>

@endsection