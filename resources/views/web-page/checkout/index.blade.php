@extends('layout.web-app.app')   
@section('title') {{'Checkout'}} @endsection
@section('content-web')
    <!-- BREADCRUMBS SETCTION START -->
    <div class="breadcrumbs-section">
        <div class="breadcrumbs overlay-bg">
        <div class="container">
            <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-inner text-left">
                <nav class="" role="navigation" aria-label="breadcrumbs">
                    <ul class="breadcrumb-list">
                    <li>
                        <a href="/" title="Back to the home page">Home</a>
                    </li>
                    <li>
                        <span>Checkout</span>
                    </li>
                    </ul>
                </nav>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- BREADCRUMBS SETCTION END -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 checkout-form">
                <div class="main-checkout">
                    <form method="post" action="{{route('place-order')}}" id="checkout" accept-charset="UTF-8" data-login-with-shop-sign-in="true">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact <span class="required">*</span></label>
                            <input type="text" class="form-control" id="contact" name="contact" placeholder="Email or mobile phone number">
                            @if($errors->has('contact'))
                              <span class="text-danger">{{ $errors->first('contact') }}</span>
                            @endif
                        </div>
                       
                        <div class="mb-3">
                            <label class="form-label" for="country">Delivery <span class="required">*</span></label>
                            <select class="form-select form-control" aria-label=".form-select-lg example" name="country" id="country">
                                <option selected>Country/Region</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="China">China</option>
                            </select>
                            @if($errors->has('country'))
                              <span class="text-danger">{{ $errors->first('country') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 d-flex justify-content-between">
                            <div class="w-49">
                                <input type="text" class="form-control mr-2" id="fname" name="fname" placeholder="First name (optional)">
                                @if($errors->has('fname'))
                                  <span class="text-danger">{{ $errors->first('fname') }}</span>
                                @endif
                            </div>
                            <div class="w-49">
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name">
                                @if($errors->has('lname'))
                                  <span class="text-danger">{{ $errors->first('lname') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                            @if($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="apartment" name="apartment" placeholder="Apartment, suite, etc. (optional)">
                        </div>
                        <div class="mb-3 d-flex justify-content-between">
                            <div class="w-49">
                                <input type="text" class="form-control mr-2" id="city" name="city" placeholder="City">
                                @if($errors->has('city'))
                                    <span class="text-danger">{{ $errors->first('city') }}</span>
                                @endif
                            </div>
                            <div class="w-49">
                                <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Postal code">
                                @if($errors->has('postal_code'))
                                    <span class="text-danger">{{ $errors->first('postal_code') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="contact" class="form-label">Shipping method <span class="required">*</span></label>
                            <input type="text" class="form-control" id="shipping" name="shipping" placeholder="International shipping" value="2.00">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="payment" class="form-label">Payment <span class="required">*</span></label> <br/>
                            <label class="form-sub-label">All transactions are secure and encrypted.</label>
                            <input type="text" class="form-control" id="payment" name="payment" placeholder="Cash or Delivery(COD)">
                            @if($errors->has('payment'))
                                <span class="text-danger">{{ $errors->first('payment') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Complete order</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 checkout-item">
                <div class="mb-6 main-cart-detail">
                    @if($carts)
                        @php $total = 0 @endphp
                        @foreach($carts as $item)
                        @php $total += $item->price* $item->quantity @endphp
                            <div class="mb-3 item-cart d-flex item justify-content-between align-items-center">
                                <div class="img-info d-flex align-items-center">
                                    <img class="border-img mr-2" src="{{asset('uploads/products/' . $item->image) }}" alt="{{$item->name}}">
                                    <div class="feature-info">
                                        <span>{{$item->name}}</span>
                                        <span class="{{isset($item->ram) && $item->ram ? 'd-block' : 'd-none'}}">Ram : {{$item->ram}}</span>
                                        <span class="{{isset($item->storage) && $item->storage ? 'd-block' : 'd-none'}}">Storage : {{$item->storage}}</span>
                                        <span class="{{isset($item->color) && $item->color ? 'd-block' : 'd-none'}}">Color : {{$item->color}}</span>
                                    </div>
                                </div>
                                <span>${{$item->price}}</span>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="total">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-title">Subtotal</span>
                        <span>${{number_format($total, 2)}}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-title">Shipping</span>
                        <span>${{number_format(2, 2)}}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="text-title-total">Total</span>
                        <span class="text-title-total">${{number_format($total, 2)}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection