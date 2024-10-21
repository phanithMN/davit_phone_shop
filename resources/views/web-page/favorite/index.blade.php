@extends('layout.web-app.app')
@section('title') {{'Favorite'}} @endsection
@section('content-web')
    <div class="container py-3 main-profile favorite">
        <div class="row mt-5 mb-5">
          <div class="col-lg-3 pt-4 pt-lg-0">
            <div class="rounded-lg box-shadow-lg px-0 pb-0 mb-5 mb-lg-0 border">
              <div class="px-4 bg-fill rounded-top border-bottom">
                @include('comons.header-setting')
              </div>
              <div>
                @include('comons.menu-side-seeting')
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center pb-4 pb-lg-3 mb-lg-3">
              <h3 class="m-0 p-0" style="font-size: 25px ; color: #144194;">Favorites</h3>
            </div>
            <div class="row">
              @foreach ($favorites as $item)
                <div class="col-lg-3">
                  <div class="single-ponno-product 13333010513987">
                    <!-- Product Image Start -->
                    <div class="pro-img">
                      <a href="{{ route('product-detail', $item->product_id) }}">
                        <img class="primary-img popup_cart_image" src="{{ asset('uploads/products/' .  $item->image) }}" alt="{{$item->name}}">
                        <img class="secondary-img popup_cart_image" src="{{ asset('uploads/products/' .  $item->image) }}" alt="{{$item->name}}">
                      </a>
                      <div class="pro-actions-link">
                        <a href="#" class="compare added" data-toggle="tooltip" title="" data-pid="dummy-product-title" data-original-title="Compare" data-placement="left">
                          <i class="icon icon-MusicMixer"></i>
                        </a>
                        <a href="javascript:void(0);" class="action-btn quick-view" onclick="quiqview('dummy-product-title')" data-toggle="modal" data-target="#quickViewModal" title="" data-original-title="Quick View">
                          <span class="icon icon-Eye"></span>
                        </a>
                      </div>
                    </div>
                    <!-- Product Image End -->
                    <!-- Product Content Start -->
                    <div class="pro-content">
                      <div class="pro-info">
                        <h4 class="popup_cart_title">
                          <a href="{{ route('product-detail', $item->product_id) }}">{{$item->name}}</a>
                        </h4>
                        <p>
                          <span class="special-price">
                            <span class="money" data-currency-usd="$1329.00">${{number_format($item->price)}}</span>
                          </span>
                          <span class="special-price-old">
                            <span class="money" data-currency-usd="$150.00">$150.00</span>
                          </span>
                        </p>
                        <div class="product-rating">
                          <span class="shopify-product-reviews-badge" data-id="1488429809731"></span>
                        </div>
                      </div>
                      <div class="pro-add-cart">
                        <form action="{{route('remove-from-favorite', $item->id)}}" method="POST" onsubmit="return confirmationform(event)">
                          @csrf
                          @method('DELETE')
                          <button type="submit"data-original-title="remove fav." title="remove fav." class=" btn action-btn d-flex justify-content-center align-items-center">
                            <span class="addto">Remove Or Fav.</span>
                          </button>
                      </form>
                      </div>
                    </div>
                    <!-- Product Content End -->
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
    </div>
@endsection