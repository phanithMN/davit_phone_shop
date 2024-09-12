@extends('layout.web-app.app')   
@section('title') {{'Blog'}} @endsection
@section('content-web')

<main role="main">
  <div id="shopify-section-template--15048368914630__main" class="shopify-section">
    <div class="blog-details-area" id="section-template--15048368914630__main">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb custom-bread">
            <li class="breadcrumb-item"><a href="{{route('home-page')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('product-shop')}}">Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
          </ol>
        </nav>
        <div class="row flex-row-reverse">
          <div class="col-lg-8">
            <div class="blog-details">
              <div class="blog-hero-img mb-40">
                <img class="full-img" src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="{{$blog->title}}">
                <div class="entry-meta">
                  <div class="date">
                    <p>{{$blog->id}}</p>
                    <span>Sep</span>
                  </div>
                </div>
              </div>
              <div class="text-upper-portion">
                <h3 class="blog-dtl-header portfolio-header">{{$blog->title}}</h3>
                <ul class="meta-box meta-blog d-flex">
                  <li class="meta-date">
                    <span>
                      <i class="fa fa-calendar" aria-hidden="true"></i>{{$blog->date}}</span>
                  </li>
                  <li>
                    <i class="fa fa-user" aria-hidden="true"></i>By <a href="#">{{$blog->user_name}}</a>
                  </li>
                </ul>
                <p>{{$blog->description}}</p>
              </div>
              <div class="row align-items-center ptb-40">
                <div class="col-lg-6 col-md-6 col-sm-6 mb-xsm-30">
                  <img src="//cdn.shopify.com/s/files/1/0037/2680/3011/files/5_large.jpg?v=1536391571" alt="blog-img" />
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <img src="//cdn.shopify.com/s/files/1/0037/2680/3011/files/2_large.jpg?v=1536391635" alt="blog-img" />
                </div>
              </div>
              <div class="author mtb-40">
                <h3 class="sidebar-header">author</h3>
                <div class="single-comment">
                  <div class="comment-img">
                    <img src="//ponno-demo.myshopify.com/cdn/shop/t/9/assets/default-user-image_small.png?v=148888795198729825501631595378" alt="author" />
                  </div>
                  <div class="comment-desc">
                    <h6>
                      <a href="#">Stuart Smith</a>
                    </h6>
                    <p>But I must explain to you how all this mistaken idea of denouncing sure and ising pain borand I will give you a complete account</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="blog-sidebar right-sidebar">
              <div class="categorie recent-post category-sub-menu sidebar-widget mb-60">
                <h3 class="sidebar-header">Custom Menu</h3>
                <ul class="">
                  <li class="">
                    <a href="{{route('home-page')}}">Home</a>
                  </li>
                  <li class="has-sub ">
                    <a href="#">Brand</a>
                    <ul>
                      @foreach($brands as $brand)
                        <li>
                          <a href="{{ url('/product-shop') }}?brand_id={{ $brand->id }}">{{$brand->name}}</a>
                        </li>
                      @endforeach
                    </ul>
                  </li>
                  <li class="has-sub ">
                    <a href="/products/accusantium-doloremque">Products </a>
                    <ul>
                      @foreach($products_type as $product_type)
                        <li>
                          <a href="{{ url('/product-shop') }}?product_type_id={{ $product_type->id }}">{{$product_type->name}}</a>
                        </li>
                      @endforeach
                    </ul>
                  </li>
                  <li class="has-sub ">
                    <a href="/products/accusantium-doloremque">SecondHand</a>
                    <ul>
                      @foreach($products_type as $product_type)
                        <li>
                          <a href="{{ url('/product-shop') }}?product_type_id={{ $product_type->id }}">{{$product_type->name}}</a>
                        </li>
                      @endforeach
                    </ul>
                  </li>
                  <li class="has-sub ">
                    <a href="/products/accusantium-doloremque">Categories</a>
                    <ul>
                      @foreach($categories as $category)
                        <li>
                          <a href="{{ url('/product-shop') }}?category_id={{ $category->id }}">{{$category->name}}</a>
                        </li>
                      @endforeach
                    </ul>
                  </li>
                  <li class="">
                    <a href="{{route('blog-ad')}}">Blog</a>
                  </li>
                  <li class="">
                    <a href="{{route('contact')}}">Contact</a>
                  </li>
                </ul>
              </div>
              <!-- single sidebar end -->
               <!-- Recent Post Start -->
               <div class="recent-post mb-60 sidebar-widget">
                <h3 class="sidebar-header">Recent Post</h3>
                <div class="all-recent-post">
                  @foreach($posts as $post)
                  <div class="single-recent-post">
                    <div class="recent-img">
                      <a href="{{route('blog-detail', $post->id)}}">
                        <img src="{{ asset('uploads/blogs/' . $post->image) }}" alt="">
                      </a>
                    </div>
                    <div class="recent-desc">
                      <h6>
                        <a href="{{route('blog-detail', $post->id)}}">{{ $post->title }}</a>
                      </h6>
                      <span>{{ $post->created_at->format('M d, Y') }}</span>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
              <!-- Recent Post End -->
             
              <!-- Meta Post Start -->
              <div class="categorie recent-post sidebar-widget mb-60">
                <h3 class="sidebar-header">Tags</h3>
                <ul class="tag-list d-flex flex-wrap">
                  @foreach($products_type as $product_type)
                  <li>
                    <a href="{{ url('/product-shop') }}?product_type_id={{ $product_type->id }}" class="">{{$product_type->name}}</a>
                  </li>
                  @endforeach
                </ul>
              </div>
              <!-- Meta Post End -->
            </div>
            <script>
              $('.category-sub-menu li.has-sub > a').on('click', function() {
                $(this).removeAttr('href');
                var element = $(this).parent('li');
                if (element.hasClass('open')) {
                  element.removeClass('open');
                  element.find('li').removeClass('open');
                  element.find('ul').slideUp();
                } else {
                  element.addClass('open');
                  element.children('ul').slideDown();
                  element.siblings('li').children('ul').slideUp();
                  element.siblings('li').removeClass('open');
                  element.siblings('li').find('li').removeClass('open');
                  element.siblings('li').find('ul').slideUp();
                }
              });
            </script>
          </div>
        </div>
      </div>
    </div>
    <style data-shopify>
      #section-template--15048368914630__main {
        padding-top: 30px;
        padding-bottom: 30px;
      }

      @media (min-width: 768px) and (max-width: 991px) {
        #section-template--15048368914630__main {
          padding-top: 30px;
          padding-bottom: 30px;
        }
      }

      @media (max-width: 767px) {
        #section-template--15048368914630__main {
          padding-top: 30px;
          padding-bottom: 30px;
        }
      }
    </style>
    <style></style>
  </div>
</main>
  
@endsection