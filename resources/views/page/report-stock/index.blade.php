@extends('layout.app')
@section('title') {{'Report Stock'}} @endsection
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
            <div class="col-sm-12 col-md-2 row-leng">
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
              <div class="btn-filter date-picker">
                <form action="{{ route('report-stock') }}" method="GET" class="d-flex" id="filterForm">
                  <div class="input-filter d-flex">
                      <label for="start_date">Start Date:</label>
                      <input type="date" id="start_date" name="start_date"
                      class="form-control form-control-sm"
                      value="{{ request('start_date') }}"
                      onchange="document.getElementById('filterForm').submit();">
                  </div>

                  <div class="input-filter d-flex">
                      <label for="end_date">End Date:</label>
                      <input type="date" id="end_date" name="end_date"
                      class="form-control form-control-sm"
                      value="{{ request('end_date') }}"
                      onchange="document.getElementById('filterForm').submit();">
                  </div>
                  <div class="search-filter">
                    <input 
                    type="search" 
                    name="search" 
                    class="form-control form-control-sm" 
                    placeholder="Search..." 
                    aria-label="Search..." 
                    value="{{ request('search')}}"
                    onchange="document.getElementById('filterForm').submit();" 
                    />
                  </div>
              </form>
              </div>
              <div class="btn-filter btn-export">
                <a href="#" class="btn btn-primary btn-sm">Export</a>
              </div>
              
            </div>
          </div>
          <table class="table">
            <thead>
                <tr class="text-nowrap">
                    <th style="width: 1%">#</th>
                    <th>Date</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($report_stocks as $item)
                <tr>
                  <td>{{$item->id}}</td>
                  <td>{{$item->created_at->format('Y-d-m') }}</td>
                  <td>{{$item->product_name}}</td>
                  <td>{{$item->quantity}}</td>
                  <td>${{$item->price}}</td>
                  <td>${{number_format($item->quantity * $item->price, 2)}}</td>
                </tr>
                @endforeach
                <tr class="bg-total">
                  <td colspan="3" class="text-center">Sub Total</td>
                  <td>{{$report_stocks->sum('quantity')}}</td>
                  <td>${{number_format($report_stocks->sum('price'), 2)}}</td>
                  <td>${{number_format($report_stocks->sum('price') * $report_stocks->sum('quantity'), 2)}}</td>
                </tr>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="10" class="pagination-table">
                  {{$report_stocks->onEachSide(1)->links()}}
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
    </div>
    <!--/ Responsive Table -->
</div>

@endsection