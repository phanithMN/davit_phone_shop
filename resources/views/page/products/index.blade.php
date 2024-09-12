@extends('layout.app')
@section('title') {{'Product'}} @endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
   <!-- Responsive Table -->
   <div class="card">
        <div class="header-table-list">
            <h5 class="card-header">@yield('title') Table</h5>
            <a href="{{ route('insert.product') }}" type="button" class="btn btn-success">Add New</a>
        </div>
        <div class="table-responsive text-nowrap">
          <div class="header-filter-table d-flex">
            <div class="form-head-bar-controll">
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
            <div class="form-head-bar-controll">
              <select class="form-select form-select-sm" id="type" name="type">
                <option value="">Chosse Type</option>
                <option value="new product" {{ request('type') == 'new product' ? 'selected' : '' }}>New Product</option>
                <option value="feature" {{ request('type') == 'feature' ? 'selected' : '' }}>Feature</option>
                <option value="best deal" {{ request('type') == 'best deal' ? 'selected' : '' }}>Best Deal</option>
              </select>
            </div>
            <div class="form-head-bar-controll">
              <select class="form-select form-select-sm" id="category"  name="category">
                <option value="">Chosse Category</option>
                @foreach ($categories as $category )
                <option value="{{$category->name}}" {{ request('category') == $category->name ? 'selected' : '' }}>{{$category->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-head-bar-controll">
              <select class="form-select form-select-sm" id="brand"  name="brand">
                <option value="">Chosse Brands</option>
                @foreach ($brands as $brand )
                  <option value="{{$brand->name}}" {{ request('brand') == $brand->name ? 'selected' : '' }}>{{$brand->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-head-bar-controll">
              <select class="form-select form-select-sm" id="product_type" name="product_type">
                <option value="">Chosse Product Type</option>
                @foreach ($products_type as $product_type )
                  <option value="{{$product_type->name}}" {{ request('product_type') == $product_type->name ? 'selected' : '' }}>{{$product_type->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-head-bar-controll">
              <select class="form-select form-select-sm" id="accessary_name" name="accessary_name">
                <option value="">Chosse Accessaries</option>
                @foreach ($accessaries as $accessary )
                  <option value="{{$accessary->name}}" {{ request('accessary_name') == $accessary->name ? 'selected' : '' }}>{{$accessary->name}}</option>
                @endforeach
              </select>
              <script>
                document.getElementById('accessary_name').addEventListener('change', function() {
                    let value = this.value;
                    let url = new URL(window.location.href);
                    url.searchParams.set('accessary_name', value);
                    window.location.href = url.toString();
                });
              </script>
            </div>
            <div class="form-head-bar-controll">
              <form action="{{ route('product') }}" method="GET" class="d-flex" id="search">
                @csrf
                <input 
                type="search" 
                name="search" 
                class="form-control form-control-sm" 
                placeholder="Search..." 
                aria-label="Search..." 
                value="{{$search_value}}"
                onchange="document.getElementById('search').submit();" 
                />
              </form>
            </div>
          </div>
          <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>price</th>
                    <th>Quantity</th>
                    <th>type</th>
                    <th>category</th>
                    <th>brand</th>
                    <th>product type</th>
                    <th>Accessaries</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @if ($products->isEmpty())
                <tr>
                  <td colspan="11" class="no-data-response">No Data Response</td>
                </tr>
              @else
                @foreach($products as $product)
                  <tr>
                    <td>{{$product->id}}</td>
                    <td><img src="{{ asset('uploads/products/' . $product->image) }}" alt="banner" style="width: 30px;height: auto;"></td>
                    <td>{{$product->name}}</td>
                    <td>${{number_format($product->price, 2)}}</td>  
                    <td>{{$product->quantity}}</td>
                    <td>
                      <span class="{{
                      $product->type == 'new product' ? 'color-new-product' : ($product->type == 'feature' ? 'color-feature' : 'color-best-deal')
                      }} status-color-type">
                      {{$product->type}}
                      </span>
                    </td>
                    <td>{{$product->category_name}}</td>
                    <td>{{$product->brand_name}}</td>
                    <td>{{$product->products_type_name}}</td>
                    <td>{{$product->accessary_name}}</td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="{{ route('update.product', $product->id) }}"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                          <a class="dropdown-item" href="{{ route('delete-product', $product->id) }}" onclick="return confirmation(event)"><i class="bx bx-trash me-2"></i> Delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              @endif
                
            </tbody>
            <tfoot>
              <tr>
                <td colspan="12" class="pagination-table">
                  {{$products->onEachSide(1)->links()}}
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
    </div>
    <!--/ Responsive Table -->
</div>

@endsection