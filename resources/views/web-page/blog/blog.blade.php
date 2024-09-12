@extends('layout.web-app.app')   
@section('title') {{'Blog'}} @endsection
@section('content-web')

<main role="main">
  <div id="shopify-section-template--15048697413830__main" class="shopify-section">
    <div class="blog-area" id="section-template--15048697413830__main">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb custom-bread">
            <li class="breadcrumb-item"><a href="{{route('home-page')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('product-shop')}}">Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
          </ol>
        </nav>
        <div class="row ">
          <div class="col-lg-12">
            <div class="section-title text-center mb-50">
              <h2>Latest Blog Posts</h2>
            </div>
            <div class="row">
              @foreach($blogs as $key => $blog)
              <div class="col-lg-4 col-md-4 col-12">
                <!-- Single Blog Start -->
                <div class="single-elomus-blog">
                  <div class="blog-img">
                    <a href="{{route('blog-detail', $blog->id)}}">
                      <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="{{$blog->title}}">
                    </a>
                    <div class="entry-meta">
                      <div class="date">
                        <p>{{$key + 1}}</p>
                        <span>Sep</span>
                      </div>
                    </div>
                  </div>
                  <div class="blog-content">
                    <h4>
                      <a href="{{route('blog-detail', $blog->id)}}">{{$blog->title}}</a>
                    </h4>
                    <ul class="meta-box">
                      <li class="meta-date">
                        <span>
                          <i class="fa fa-calendar" aria-hidden="true"></i>{{$blog->date}}</span>
                      </li>
                      <li>
                        <i class="fa fa-user" aria-hidden="true"></i> By {{$blog->user_name}}
                      </li>
                    </ul>
                    <p>
                      <!-- Decs -->
                    <p>{{$blog->description}}</p>
                    <div class="small-btn">
                      <a href="{{route('blog-detail', $blog->id)}}">Read More</a>
                    </div>
                  </div>
                </div>
                <!-- Single Blog End -->
              </div>
              @endforeach
            </div>
            <!-- Shop Breadcrumb Area Start -->
            <div class="shop-breadcrumb-area border-default {{count($blogs) >= 4 ? 'd-none' : ''}}">
              <div class="row">
                <div class="col-12">
                  <div class="theme-default-pagination">
                    <nav class="pagination">
                      {{$blogs->onEachSide(1)->links()}}
                    </nav>
                  </div>
                  <script>
                    $(".theme-default-pagination .disabled a").removeAttr("href");
                    $(".theme-default-pagination li.active a").removeAttr("href");
                  </script>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection