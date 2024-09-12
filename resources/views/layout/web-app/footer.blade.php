<div id="shopify-section-footer" class="shopify-section">
  <!-- Footer Area Start Here -->
  <footer class="footer-area" id="section-footer">
    <div class="container">
      <div class="footer-middle" id="footer-middle-footer">
        <div class="row">
          <!-- Single Footer Start -->
          <div class="col-lg-4 col-md-6 col-sm-6 mb-sm-40" id="block-1535955373006">
            <div class="single-footer">
              <h4 class="footer-title e-header">Recent Post</h4>
              <div class="footer-content all-recent-post">
                <ul class="footer-list recent-post">
                  @foreach ($posts as $item )
                    <li class="single-recent-post">
                      <div class="recent-img">
                        <a href="{{route('blog-detail', $item->id)}}">
                          <img src="{{ asset('uploads/blogs/' . $item->image) }}" alt="{{$item->title}}">
                        </a>
                      </div>
                      <div class="recent-desc">
                        <h6>
                          <a href="{{route('blog-detail', $item->id)}}">{{$item->title}}</a>
                        </h6>
                        <span>{{ $item->created_at->format('M d, Y') }}</span>
                      </div>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <!-- Single Footer End -->
          <!-- Single Footer Start -->
          <div class="col-lg-2 col-md-6 col-sm-6 mb-sm-40" id="block-1535955600496">
            <div class="single-footer">
              <h4 class="footer-title e-header">quick link</h4>
              <div class="footer-content">
                <ul class="footer-list quick-link">
                  <li>
                    <a href="{{route('cart')}}">cart</a>
                  </li>
                  <li>
                    <a href="{{route('checkout')}}">checkout</a>
                  </li>
                  <li>
                    <a href="{{route('product-shop')}}">shop</a>
                  </li>
                  <li>
                    <a href="{{route('contact')}}">contact</a>
                  </li>
                  <li>
                    <a href="{{route('blog')}}">blog</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Single Footer End -->
          <!-- Single Footer Start -->
          <div class="col-lg-3 col-md-6 col-sm-6 mb-sm-40" id="block-1535955604529">
            <div class="single-footer">
              <h4 class="footer-title e-header">contact info</h4>
              <div class="footer-content">
                <ul class="footer-list contact-info">
                  <li class="location">
                    <p>kompong spue province, somrong tong , thomtaor, Street 04</p>
                  </li>
                  <li class="mail">
                    <p>davitphoneshop@mail.com <br> davitouen@mail.com </p>
                  </li>
                  <li class="phone">
                    <p>086 608 237<br>088 722 883 3 </p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Single Footer End -->
          <!-- Single Footer Start -->
          <div class="col-lg-3 col-md-6 col-sm-6" id="block-1535955607528">
            <div class="single-footer">
              <h4 class="footer-title e-header">Follow Us</h4>
              <div class="footer-content">
                <ul class="footer-list newsletter-text">
                  <li>
                    <a href="https://www.facebook.com/profile.php?id=100013282053134" target='blank'>
                      <i class='bx bxl-facebook-circle'></i>
                      <span class="title-shop">Davit Phone Shop</span>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.facebook.com/profile.php?id=100013282053134" target='blank'>
                      <i class='bx bxl-telegram' ></i>
                      <span class="title-shop">Davit Phone Shop</span>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.facebook.com/profile.php?id=100013282053134" target='blank'>
                      <i class='bx bxl-instagram' ></i>
                      <span class="title-shop">Davit Phone Shop</span>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.facebook.com/profile.php?id=100013282053134" target='blank'>
                      <i class='bx bxl-twitter' ></i>
                      <span class="title-shop">Davit Phone Shop</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Single Footer End -->
        </div>
      </div>
    </div>
    <div class="footer-bottom text-center off-black-bg">
      <p>Copyright © {{date('Y')}} <a title="#" href="#">Devit Phone Shop</a> | Built with <a href="https://web.facebook.com/mnphanith/" target="blank" title="#">MN PHANITH</a></p>
    </div>
  </footer>
  <!-- Footer Area End Here -->
</div>

{{-- modal view  --}}
<div id="shopify-section-recommended" class="shopify-section"></div>
<!-- Necessary JS -->

<!-- modalAddToCart -->
<div class="modal fade ajax-popup" id="modalAddToCart" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog white-modal modal-md">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-content-text">
          <div class="popup-image">
            <img class="popupimage" src="">
          </div>
          <div class="popup-content">
            <h6 class="productmsg"></h6>
            <p class="success-message">
              <i class="fa fa-check-circle"></i>Added to cart successfully!
            </p>
            <div class="modal-button">
              <a href="/cart" class="theme-default-button">View Cart</a>
              <a href="/checkout" class="theme-default-button">Checkout</a>
            </div>
          </div>
        </div>
        <div class="modal-close">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <i class="fa fa-times-circle"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- modalAddToCart -->

<!-- modalAddToCart Error -->
<div class="modal fade ajax-popup error-ajax-popup" id="modalAddToCartError" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog white-modal modal-md">
    <div class="modal-content ">
      <div class="modal-body">
        <div class="modal-content-text">
          <p class="error_message"></p>
        </div>
        <div class="modal-close">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <i class="fa fa-times-circle"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade productModal" id="quickViewModal" tabindex="-1" role="dialog" aria-hidden="true">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span class="close-icon" aria-hidden="true">
      <i class="ti-close"></i>
    </span>
  </button>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-12">
            <div class="qwick-view-left">
              <div class="quick-view-learg-img">
                <div class="quick-view-tab-content tab-content">
                  <div class="product-main-image__item">
                    <div class="img_box_1">
                      <img class="full-width" alt="" src="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-12">
            <div class="qwick-view-right">
              <div class="qwick-view-content">
                <h1 id="product_title" class="product_title">Test</h1>
                <div class="product-price product-info__price price-part">
                  <span class="main">
                    <span class="money" data-currency-bdt="" data-currency="US">$</span>
                  </span>
                  <span class="price-box__new" style="display: none;">jsprice</span>
                </div>
                <div class="product-rating spr-badge-caption-none">
                  <div class="quick-view-rating rating">
                    <span class="shopify-product-reviews-badge" data-id="1488431415363"></span>
                  </div>
                </div>
                <div class="short-description product-des">
                  <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                </div>
                <form id="add-item-qv" action="/cart/add" method="post">
                  <div class="quick-view-select variants select-option-part">
                    <div class="variants_selects ">
                      <div class="selector-wrapper">
                        <label for="product-select-qv-option-0">Size:</label>
                        <select class="single-option-selector select--wd" data-option="option1" id="product-select-qv-option-0">
                          <option value="xl">xl</option>
                          <option value="ml">ml</option>
                          <option value="xs">xs</option>
                        </select>
                      </div>
                      <div class="selector-wrapper">
                        <label for="product-select-qv-option-1">Color:</label>
                        <select class="single-option-selector select--wd" data-option="option2" id="product-select-qv-option-1">
                          <option value="gray">gray</option>
                          <option value="magenta">magenta</option>
                          <option value="orange">orange</option>
                          <option value="purple">purple</option>
                          <option value="pink">pink</option>
                          <option value="violet">violet</option>
                        </select>
                      </div>
                    </div>
                    <div class="divider divider--sm"></div>
                  </div>
                  <div class="quickview-plus-minus">
                    <div class="cart-plus-minus">
                      <input type="text" value="01" name="quantity" class="cart-plus-minus-box">
                    </div>
                    <div class="quickview-btn-cart">
                      <button type="submit" class="addtocartqv theme-default-button" id="1488431185987">Add to Cart</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="quickViewModal_info" style="display: none;">
  <div class="button">Add to cart</div>
  <div class="button_added">Added</div>
  <div class="button_error">Limit Products</div>
  <div class="button_wait">Wait..</div>
</div>

<!-- END QUICKVIEW PRODUCT -->
<div class="ajax-success-compare-modal compare_modal" id="moda-compare" tabindex="-1" role="dialog" style="display:none">
  <div class="overlay"></div>
  <div class="modal-dialog modal-lg">
    <div class="modal-content content" id="compare-modal">
      <div class="modal-header">
        <div class="modal-close">
          <span class="compare-modal-close">x</span>
        </div>
        <h4 class="modal-title">Compare Product</h4>
      </div>
      <div class="modal-body">
        <div class="table-wrapper">
          <table class="table table-hover table-responsive">
            <thead>
              <tr class="th-compare">
                <td>Action</td>
                <th class=" fhasellus-viverra-urna">
                  <button type="button" class="close remove-compare center-block" aria-label="Close" data-handle="fhasellus-viverra-urna">
                    <i class="fa fa-times"></i>
                  </button>
                </th>
              </tr>
            </thead>
            <tbody id="table-compare">
              <tr>
                <th width="15%" class="product-name"> Product name </th>
                <td width="90%" class="fhasellus-viverra-urna"> fhasellus viverra urna </td>
              </tr>
              <tr>
                <th width="15%" class="product-name"> Product image </th>
                <td width="90%" class="item-row fhasellus-viverra-urna" id="product-13333044658243">
                  <img src="//cdn.shopify.com/s/files/1/0037/2680/3011/products/9_dc5704b1-cf6a-4c17-8df7-3787956fbcc8.png?v=1536039129" width="150">
                  <div class="product-price">
                    <span class="price-sale">
                      <span class="money" data-currency-bdt="Tk 3,527.28">Tk 3,527.28</span>
                    </span>
                  </div>
                  <a href="javascript:void(0);" onclick="location.href='/products/fhasellus-viverra-urna'">view Product</a>
                </td>
              </tr>
              <tr>
                <th width="15%" class="product-name"> Product description </th>
                <td width="90%" class="fhasellus-viverra-urna ">
                  <p class="description-compare"> [new_products]300[/new_products] Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, [short_description] Contrary... </p>
                </td>
              </tr>
              <tr></tr>
              <tr>
                <th width="15%" class="product-name"> AVAILABILITY </th>
                <td width="90%" class="available-stock fhasellus-viverra-urna">
                  <p> Available In stock </p>
                </td>
              </tr>
              <tr></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>