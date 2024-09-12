<!doctype html>
<html class="no-js supports-no-cookies" lang="en"> <!--<![endif]-->
<head>
  <!-- Basic and Helper page needs -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="theme-color" content="#0438a1">
  <link rel="canonical" href="https://ponno-demo.myshopify.com/">
  <link rel="shortcut icon" href="../../assets-web/images/favicon_32x32.png" type="image/png" />
  <title>Davit - Phone Shop | @yield('title')</title>
  <meta property="og:type" content="website">
  <meta property="og:title" content="Ponno - eCommerce Shopify Theme">
  <meta property="og:description" content="">
  <meta property="og:url" content="https://ponno-demo.myshopify.com/">
  <meta property="og:site_name" content="Ponno - eCommerce Shopify Theme">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="Ponno - eCommerce Shopify Theme">
  <meta name="twitter:description" content="">
  <!-- CSS -->
  <link href="/assets-web/assets/timber.scss.css" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="/assets-web/assets/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/assets-web/assets/animate.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/assets-web/assets/themify-icons.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/assets-web/assets/stroke-gap.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/assets-web/assets/material-design-iconic-font.min.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/assets-web/assets/jquery.fancybox.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/assets-web/assets/meanmenu.min.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/assets-web/assets/owl.carousel.min.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/assets-web/assets/slick.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/assets-web/assets/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/assets-web/assets/default.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/assets-web/assets/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/assets-web/assets/responsive.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/assets-web/assets/theme-default.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/assets-web/assets/custom.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/assets-web/assets/theme-responsive.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/assets-web/assets/skin-theme.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/assets-web/assets/theme-color.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/assets-web/assets/custom-style.css" rel="stylesheet" type="text/css" media="all" />
  <!-- sweet alert  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Header hook for plugins -->
 <!-- boxicon -->
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script>window.performance && window.performance.mark && window.performance.mark('shopify.content_for_header.start');</script>
  <meta id="shopify-digital-wallet" name="shopify-digital-wallet" content="/3726803011/digital_wallets/dialog">
  <script id="shopify-features" type="application/json">{"accessToken":"68e312ab07f0c82f7a872180a0dc8541","betas":["rich-media-storefront-analytics"],"domain":"ponno-demo.myshopify.com","predictiveSearch":true,"shopId":3726803011,"smart_payment_buttons_url":"https:\/\/ponno-demo.myshopify.com\/cdn\/shopifycloud\/payment-sheet\/assets\/latest\/spb.en.js","dynamic_checkout_cart_url":"https:\/\/ponno-demo.myshopify.com\/cdn\/shopifycloud\/payment-sheet\/assets\/latest\/dynamic-checkout-cart.en.js","dynamic_checkout_cart_button_sizes":{"maxWidth":500,"minWidth":140},"locale":"en","flg4ff40b22":false}</script>
  <script type="module">!function(o){(o.Shopify=o.Shopify||{}).modules=!0}(window);</script>
  <script>!function(o){function n(){var o=[];function n(){o.push(Array.prototype.slice.apply(arguments))}return n.q=o,n}var t=o.Shopify=o.Shopify||{};t.loadFeatures=n(),t.autoloadFeatures=n()}(window);</script>
  </script>
  <script id="__st">var __st={"a":3726803011,"offset":-14400,"reqid":"76fb9827-e024-43a4-8e59-1db598d9dd9e-1710999226","pageurl":"ponno-demo.myshopify.com\/","u":"7288e2714722","p":"home"};</script>
  <script>window.ShopifyPaypalV4VisibilityTracking = true;</script>
  <script>!function(o){o.addEventListener("DOMContentLoaded",function(){window.Shopify=window.Shopify||{},window.Shopify.recaptchaV3=window.Shopify.recaptchaV3||{siteKey:"6LeHG2ApAAAAAO4rPaDW-qVpPKPOBfjbCpzJB9ey"};var t=['form[action*="/contact"] input[name="form_type"][value="contact"]','form[action*="/comments"] input[name="form_type"][value="new_comment"]','form[action*="/account"] input[name="form_type"][value="customer_login"]','form[action*="/account"] input[name="form_type"][value="recover_customer_password"]','form[action*="/account"] input[name="form_type"][value="create_customer"]','form[action*="/contact"] input[name="form_type"][value="customer"]'].join(",");function n(e){e=e.target;null==e||null!=(e=function e(t,n){if(null==t.parentElement)return null;if("FORM"!=t.parentElement.tagName)return e(t.parentElement,n);for(var o=t.parentElement.action,r=0;r<n.length;r++)if(-1!==o.indexOf(n[r]))return t.parentElement;return null}(e,["/contact","/comments","/account"]))&&null!=e.querySelector(t)&&((e=o.createElement("script")).setAttribute("src","https://cdn.shopify.com/shopifycloud/storefront-recaptcha-v3/v0.6/index.js"),o.body.appendChild(e),o.removeEventListener("focus",n,!0),o.removeEventListener("change",n,!0),o.removeEventListener("click",n,!0))}o.addEventListener("click",n,!0),o.addEventListener("change",n,!0),o.addEventListener("focus",n,!0)})}(document);</script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const previewBarInjector = new Shopify.PreviewBarInjector({
        targetNode: document.body,
        iframeRoot: 'https://ponno-demo.myshopify.com',
        iframeSrc: 'https://ponno-demo.myshopify.com/preview_bar',
        previewToken: 'b4bvjw06osm0e9bz',
        themeStoreId: '',
        permanentDomain: 'ponno-demo.myshopify.com',
      });
      previewBarInjector.init();
    });
  </script>
  <script integrity="sha256-n5Uet9jVOXPHGd4hH4B9Y6+BxkTluaaucmYaxAjUcvY=" data-source-attribution="shopify.loadfeatures" defer="defer" src="//ponno-demo.myshopify.com/cdn/shopifycloud/shopify/assets/storefront/load_feature-9f951eb7d8d53973c719de211f807d63af81c644e5b9a6ae72661ac408d472f6.js" crossorigin="anonymous"></script>
  <script data-source-attribution="shopify.dynamic_checkout.dynamic.init">var Shopify=Shopify||{};Shopify.PaymentButton=Shopify.PaymentButton||{isStorefrontPortableWallets:!0,init:function(){window.Shopify.PaymentButton.init=function(){};var t=document.createElement("script");t.src="https://ponno-demo.myshopify.com/cdn/shopifycloud/portable-wallets/latest/portable-wallets.en.js",t.type="module",document.head.appendChild(t)}};
  </script>
  <script integrity="sha256-HAs5a9TQVLlKuuHrahvWuke+s1UlxXohfHeoYv8G2D8=" data-source-attribution="shopify.dynamic-checkout" defer="defer" src="//ponno-demo.myshopify.com/cdn/shopifycloud/shopify/assets/storefront/features-1c0b396bd4d054b94abae1eb6a1bd6ba47beb35525c57a217c77a862ff06d83f.js" crossorigin="anonymous"></script>
  <script integrity="sha256-o0rXHoHYF8JV/pI5sd/RPjI3ywH41Ezq5yxQ3ds5iuM=" defer="defer" src="//ponno-demo.myshopify.com/cdn/shopifycloud/shopify/assets/storefront/bars/preview_bar_injector-a34ad71e81d817c255fe9239b1dfd13e3237cb01f8d44ceae72c50dddb398ae3.js" crossorigin="anonymous"></script>
  <script>window.performance && window.performance.mark && window.performance.mark('shopify.content_for_header.end');</script>
  <script src="/assets-web/assets/modernizr-3.5.0.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="/assets-web/assets/jquery-3.3.1.min.js"></script>
  <script src="/assets-web/assets/jquery-migrate-v1.4.1.js"></script>
  <script src="/assets-web/assets/jquery.meanmenu.min.js"></script>
  <script src="/assets-web/assets/jquery.scrollUp.js"></script>
  <script src="/assets-web/assets/jquery.fancybox.min.js"></script>
  <script src="/assets-web/assets/jquery.countdown.min.js"></script>
  <script src="/assets-web/assets/owl.carousel.min.js"></script>
  <script src="/assets-web/assets/slick.min.js"></script>
  <script src="/assets-web/assets/popper.min.js"></script>
  <script src="/assets-web/assets/bootstrap.min.js"></script>
  <script src="/assets-web/assets/plugins.js"></script>
  <!-- Ajax Cart js -->
  <script src="/assets-web/assets/theme.js"></script>
</head>
<body id="ponno-ecommerce-shopify-theme" class="template-index" >
  {{-- <form method="post" action="/contact#Contact_" id="Contact_" accept-charset="UTF-8" class="contact-form">
    <input type="hidden" name="form_type" value="customer">
    <input type="hidden" name="utf8" value="✓">
    <div id="one-time-newsletter" class="popup_wrapper" style="opacity: 1; visibility: visible; transition: all 0.5s ease 0s;">
      <div class="newsletter_popup_inner">
          <span class="popup_off"><i class="fa fa-times"></i></span>
          <div class="subscribe_area">
            <h2 class="">Newsletter</h2>
            <p class="">Join over 1,000 people who get free and fresh content delivered automatically each time we publish</p>
            <div class="form-group subscribe-form-group"><div class="">
                <input type="hidden" name="contact[tags]" value="newsletter">
                <input class="form-control subscribe-form-input" type="email" name="contact[email]" id="Email" value="" placeholder="email@example.com" aria-label="email@example.com" autocorrect="off" autocapitalize="off">
                <button type="submit" class="newsletter-btn" name="commit" id="Subscribe">Subscribe</button><p><input id="forgetMe" type="checkbox" name="forgetMe">Don't show this again</p></div>
            </div>
          </div>
      </div>			
    </div>
  </form> --}}
  @include('layout.web-app.header')
  @yield('content-web')
  @include('layout.web-app.footer')
  
</body>
<script src="/assets-web/assets/fastclick.min.js" type="text/javascript"></script>
<script src="/assets-web/assets/timber.js" type="text/javascript"></script>
<script src="/assets-web/assets/wishlist.js" defer="defer"></script>
<script src="/assets-web/assets/custom.js" type="text/javascript"></script>
<script src="/assets-web/assets/custom2.js" type="text/javascript"></script>
{{-- sweet alert  --}}
<!-- message success  -->
@if (Session::has('message'))
    <script>
        swal("Message", "{{ Session::get('message')}}", 'success', {
            buttons: true,
            buttons: "OK",
            timer: 2500,
            dangerMode: true,
        });
    </script>
@endif

<!-- wirning message  -->
<script type="text/javascript">
// with a href
  function confirmation(ev) {
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href');
      console.log(urlToRedirect);
      swal({
          title: "Are you soure to delete this?",
          text: "You won't be able to revert this delete" ,
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willCancel) => {
          if (willCancel) {
              window.location.href = urlToRedirect;
          }
      })
  }
// with buttons submit 
  function confirmationform(ev) {
    ev.preventDefault(); // Prevent the default form submission
    var form = ev.target; // Get the form element
    
    swal({
        title: "Are you sure you want to delete this?",
        text: "You won't be able to revert this delete",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            form.submit(); // Submit the form if confirmed
        }
    });
    return false; // Prevent default action for older browsers
  }
</script>

<div id="shopify-section-recommended" class="shopify-section"></div>

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
            <p class="success-message"><i class="fa fa-check-circle"></i>Added to cart successfully!</p> 
            <div class="modal-button">
              <a href="/cart" class="theme-default-button">View Cart</a>
              <a href="/checkout" class="theme-default-button">Checkout</a>
            </div>
          </div>
        </div>
        <div class="modal-close">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
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
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Some styles to get you started. -->

<div class="modal fade productModal" id="quickViewModal" tabindex="-1" role="dialog" aria-hidden="true">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span class="close-icon" aria-hidden="true"><i class="ti-close"></i></span>
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
                    <div class="img_box_1"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-12">
            <div class="qwick-view-right">
              <div class="qwick-view-content">
                <h1 class="product_title">FROM_JS</h1>
                <div class="product-price product-info__price price-part">
                  <span class="main">jsprice</span>
                  <span class="price-box__new">jsprice</span>
                </div>
                <div class="product-rating spr-badge-caption-none">
                  <div class="quick-view-rating rating">FROM_JS</div>
                </div>

                <div class="short-description product-des">FROM_JS</div>

                <form id="add-item-qv" action="/cart/add" method="post">
                  <div class="quick-view-select variants select-option-part"></div>
                  <div class="quickview-plus-minus">
                    <div class="cart-plus-minus">
                      <input type="text" value="01" name="quantity" class="cart-plus-minus-box">
                    </div>
                    <div class="quickview-btn-cart">
                      <button type="submit" class="addtocartqv theme-default-button">Add to cart</button>
                    </div>
                  </div>
                  <script>
                    jQuery('.addtocartqv').click(function(e) {
                      e.preventDefault();
                      Shopify.addItemFromFormStart('add-item-qv', jQuery(this).attr('id'));
                    });
                  </script> 
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</html>

