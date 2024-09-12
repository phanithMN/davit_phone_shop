@extends('layout.web-app.app')
@section('title') {{'Product Shop'}} @endsection
@section('content-web')

<main role="main">
  <div id="shopify-section-template--15048369012934__main" class="shopify-section">
    <!-- Start Shop Page -->
    <div class="main-shop-page" id="section-template--15048369012934__main">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb custom-bread">
            <li class="breadcrumb-item"><a href="{{route('home-page')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('product-shop')}}">Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
          </ol>
        </nav>
        <div class="row flex-row-reverse">
          <div class="col-lg-9 col-12">
            <div class="row">
              <div class="col-lg-12">
                <!-- Grid & List View Start -->
                <div class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
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
                  <!-- Toolbar Short Area Start -->
                  <div class="main-toolbar-sorter clearfix">
                    <div class="toolbar-sorter d-md-flex align-items-center short-list">
                      <label for="SortBy">Sort by</label>
                      <select name="sort_by" id="SortBy" class="sorter wide">
                        <option value="">Defualt</option>
                        <option value="title-ascending" {{request('sort_by') == "title-ascending" ? 'selected' : '' }}>Alphabetically, A-Z</option>
                        <option value="title-descending" {{request('sort_by') == 'title-descending' ? 'selected' : '' }}>Alphabetically, Z-A</option>
                        <option value="price-ascending" {{request('sort_by') == 'price-descending' ? 'selected' : '' }}>Price, low to high</option>
                        <option value="price-descending" {{request('sort_by') == 'price-descending' ? 'selected' : '' }}>Price, high to low</option>
                      </select>
                      <script>
                        document.getElementById('SortBy').addEventListener('change', function() {
                            let value = this.value;
                            let url = new URL(window.location.href);
                            url.searchParams.set('sort_by', value);
                            window.location.href = url.toString();
                        });
                      </script>
                    </div>
                  </div>
                  <!-- Toolbar Short Area End -->
                </div>
                <!-- Grid & List View End -->
              </div>
            </div>
            <div class="shop-area mb-all-40">
              <div class="tab-content">
                <div id="grid-view">
                  <div class="row border-hover-effect">
                    @foreach($products as $product)
                      <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <!-- Single Product Start -->
                        <div class="single-ponno-product 13332997603395">
                          <!-- Product Image Start -->
                          <div class="pro-img">
                            <a href="{{route('product-detail', $product->id)}}">
                              <img class="primary-img popup_cart_image" src="{{ asset('uploads/products/'. $product->image)}}" alt="{{$product->name}}">
                            </a>
                            <div class="pro-actions-link">
                              <a href="#" class="compare" data-toggle="tooltip" title="Compare" data-pid="accusantium-doloremque" data-original-title="Compare" data-placement="left" title="Compare View">
                                <i class="icon icon-MusicMixer"></i>
                              </a>
                              <a href="javascript:void(0);" class="action-btn quick-view" onclick="quiqview('accusantium-doloremque')" data-toggle="modal" data-target="#quickViewModal" title="Quick View">
                                <span class="icon icon-Eye"></span>
                              </a>
                            </div>
                            <a class="action-wishlist action--wishlist tile-actions--btn flex wishlist-btn wishlist sticker-new"  href="{{ route('favorite-add', $product->id)}}" button-wishlist data-product-handle="accusantium-doloremque" title="Wishlist">
                              <i class="ti-heart"></i>
                              <i class="ti-settings fa-spin"></i>
                              <i class="fa fa-heart"></i>
                            </a>
                          </div>
                          <!-- Product Image End -->
                          <!-- Product Content Start -->
                          <div class="pro-content">
                            <div class="pro-info">
                              <h4 class="popup_cart_title">
                                <a href="{{route('product-detail', $product->id)}}">{{$product->name}}</a>
                              </h4>
                              <p>
                                <span class="special-price">
                                  <span class=money>${{$product->price}}</span>
                                </span>
                                @if($product->discount_price)
                                  <span class="special-price-old">
                                    <span class=money>${{$product->discount_price}}</span>
                                  </span>
                                @endif
                              </p>
                              <div class="product-rating">
                                <span class="shopify-product-reviews-badge" data-id="1488429252675"></span>
                              </div>
                            </div>
                          </div>
                          <!-- Product Content End -->
                          <div class="pro-add-cart">
                            <a href="{{ route('cart.add', $product->id)  }}" class="action-btn"  data-original-title="add to cart" title="add to cart">
                              <span class="addto">Add To Cart</span>
                            </a>
                          </div>
                        </div>
                        <!-- Single Product End -->
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <!-- Shop Breadcrumb Area Start -->
            <div class="shop-breadcrumb-area border-default {{count($products) <= 12 ? 'd-none' : ''}}">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 pagination-shop-product">
                    {{$products->onEachSide(1)->links()}}
                  <script>
                    $(".theme-default-pagination .disabled a").removeAttr("href");
                    $(".theme-default-pagination li.active a").removeAttr("href");
                  </script>
                </div>
              </div>
            </div>
            <!-- Shop Breadcrumb Area End -->
          </div>
          <div class="col-lg-3 col-12">
            <div class=" shop-sidebar">
                <!-- Sidebar Product Type Start -->
                <div class="sidebar-categorie mb-30 sidebar-widget">
                  <form class="filter-form" id="productTypeForm">
                    <h3 class="sidebar-title">Product type</h3>
                    <ul class="sidbar-style">
                      @foreach($products_type as $product_type)
                        <li>
                          <input type="checkbox" name="product_type_name[]" value="{{$product_type->name}}" id="{{$product_type->name}}"
                          {{ request('product_type_name') == $product_type->name ? 'checked' : '' }} 
                          onchange="submitProductType('{{$product_type->name}}')">
                          <label for="{{$product_type->name}}">{{$product_type->name}}</label>
                        </li>
                      @endforeach
                    </ul>
                  </form>
                </div>
                <!-- Sidebar Product Type End -->

                <!-- Sidebar Brands Start -->
                <div class="sidebar-categorie mb-30 sidebar-widget">
                  <h3 class="sidebar-title">Brand</h3>
                  <div class="row">
                  @foreach($brands as $brand)
                    <div class="col-lg-6 col-3 row-brand">
                      <a href="{{ url('/product-shop') }}?brand_id={{ $brand->id }}" class="link-to-brand">
                        <img src="{{ asset('uploads/brands/' . $brand->image) }}" alt="{{$brand->name}}" />
                      </a>
                    </div>
                    @endforeach
                  </div>
                </div>
                <!-- Sidebar Brands End -->
                <!-- Sidebar Categorie Start -->
                <div class="sidebar-categorie mb-30 sidebar-widget">
                  <form class="filter-form" name="category_name" id="categoryForm">
                      <h3 class="sidebar-title">Categories</h3>
                      <ul class="sidbar-style">
                          @foreach($categories as $category)
                          <li>
                            <input type="checkbox" name="category_name[]" value="{{$category->name}}" id="{{$category->name}}" 
                            {{ request('category_name') == $category->name ? 'checked' : '' }} 
                            onchange="submitCategory('{{ $category->name }}')">
                            <label for="{{$category->name}}">{{$category->name}}</label>
                          </li>
                          @endforeach
                      </ul>
                  </form>
                </div>
                <!-- Sidebar Categorie End -->
            </div>
            <script>
              $('input[type="checkbox"]').click(function() {
                setTimeout(function() {
                  $('form[name="testform"]').submit();
                }, 500);
              });
            </script>
          </div>
        </div>
      </div>
    </div>
    <!-- End Shop Page -->
  </div>
</main>
@endsection
