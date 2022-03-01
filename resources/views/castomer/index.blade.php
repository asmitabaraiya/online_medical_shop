@include('castomer.comman.product_modal')

@extends('castomer.main_master')

@section('title')
  Pharmative   
@endsection

@section('body')



<main class="site-main">
    
    <!--================ Hero banner start =================-->    
    
          <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">

                  @php
                      $i = 1;
                  @endphp   
                    
                  @foreach ($slider as $slid)
                          <div class=" {{($i==1) ? 'carousel-item active' : 'carousel-item '}} ">
                              <img src="{{ asset($slid->slider_img) }}" height= "650" class="d-block w-100 ">
                          </div>
                      @php
                          $i++;
                      @endphp 
                            
                  @endforeach    
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    
       
  
    <!--================ Hero banner start =================-->
    {{-- class="img-fluid"             --}}
    <!--================ Hero Carousel start =================-->
    <section class="section-margin mt-0">
      <div class="owl-carousel owl-theme hero-carousel">
        <div class="hero-carousel__slide">
          <img src="{{asset('castomer/img/img6.jpeg')}}" height="500" alt="" >
          <a href="{{url('/product/categorywise/12/all-medicines')}}" class="hero-carousel__slideOverlay">
            <h3>Order Medicine</h3>
            <p>Save upto 60% off</p>
          </a>
        </div>
        <div class="hero-carousel__slide">
          <img src="{{asset('castomer/img/img4.jpeg')}}" height="500" alt="" >
          <a href="{{url('/product/categorywise/13/all-healthCare-product')}}" class="hero-carousel__slideOverlay">
            <h3>Wellness</h3>
            <p>Our best HealthCare products</p>
          </a>
        </div>
        <div class="hero-carousel__slide">
          <img src="{{asset('castomer/img/img7.jpeg')}}" height="500" alt="" >
          <a href="#" class="hero-carousel__slideOverlay">
            <h3>Lab test  </h3>
            <p> We care for your health!</p>
          </a>
        </div>
      </div>
    </section>
    <!--================ Hero Carousel end =================-->

    <!-- ================ trending product section start ================= -->  
    <section class="section-margin calc-60px">
      <div class="container">
        <div class="section-intro pb-60px">
          <p>Special Deals</p>
          <h2>Trending <span class="section-intro__style">Product</span></h2> 
        </div>
        <div class="row">
          @foreach ($products as $product )
            <div class="col-md-6 col-lg-4 col-xl-3">
              <div class="card text-center card-product">
                <div class="card-product__img">
                  <img class="card-img" src="{{asset($product->product_thumbnail)}}" alt="">
                  <ul class="card-product__imgOverlay">
                    <li><button ><i class="ti-pencil"></i></button></li>
                    <li><button   data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{$product->id}}" onclick="productView(this.id)"  ><i class="ti-shopping-cart"></i></button></li>
                    <li><button  id="{{$product->id}}" onclick="addToWishList(this.id)"><i class="ti-heart"  ></i></button></li>
                  </ul>
                </div>
                <div class="card-body">
                 
                  <h4 class="card-product__title"><a href="{{ url('product/detail/'.$product->id.'/'.$product->product_slug_en  )}}">  {{$product->product_name_en}} </a></h4>
                  <p class="card-product__price"> ₹{{ $product->selling_price }}</p>
                </div>
              </div>
            </div>
          @endforeach          
                    
         
        </div>
      </div>
    </section>
    <!-- ================ trending product section end ================= -->  

  

   

    <!-- ================ Best Selling item  carousel ================= --> 
    <section class="section-margin calc-60px">
      <div class="container">
        <div class="section-intro pb-60px">
          {{-- <p>Popular Item in the market</p> --}}
          <h2> <span class="section-intro__style">  Medicines  </span></h2>
          
        </div>
        <div class="owl-carousel owl-theme carouselme" >


  @foreach ( $medicines as $product )
  
          <div class="card text-center card-product">
            <div class="card-product__img">
              <img class="img-fluid" src="{{asset($product->product_thumbnail)}}" alt="">
              <ul class="card-product__imgOverlay">
                <li><button><i class="ti-search"></i></button></li>
                <li><button  data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{$product->id}}" onclick="productView(this.id)"><i class="ti-shopping-cart"></i></button></li>                
                <li><button  id="{{$product->id}}" onclick="addToWishList(this.id)"><i class="ti-heart"  ></i></button></li>
              </ul>
            </div>
            <div class="card-body">
              <h4 class="card-product__title"><a href="{{ url('product/detail/'.$product->id.'/'.$product->product_slug_en  )}}">  {{$product->product_name_en}}</a></h4>
              <p class="card-product__price">₹{{ $product->selling_price }}</p>
            </div>
          </div>
  @endforeach           
        </div>
        <a href="{{url('/product/categorywise/12/all-medicines')}}" style="float: right;"> View All Medicines </a> 

      </div>
</section>
<!-- ================ Best Selling item  carousel end ================= --> 


     {{-- end section of desplaing medicines --}}



  <!-- ================ Brand  carousel ================= --> 
  <section class="section-margin calc-60px">
    <div class="container">
      <div class="section-intro pb-60px">
        <h2>Our <span class="section-intro__style">Brands</span></h2>
      </div>
      <div class="owl-carousel owl-theme" id="bestSellerCarousel1">
        @foreach ($brands as $brand )
            <div class="card text-center card-product">
              <div class="card-product__img">
              <a href="{{url('brands/all/'.$brand->id.'/'.$brand->brand_slug_en)}}">  <img class="img-fluid"  src="{{asset($brand->brand_image)}}" style="height: 50%; width: 50%" alt=""> </a>
              </div>
              {{-- <div class="card-body">
                <h4 class="card-product__title"><a href="single-product.html"> @if(session()->get('language') == 'hindi')  {{$brand->brand_name_hin}}  @else  {{$brand->brand_name_en}} @endif </a> </h4>
              </div> --}}
            </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- ================ Brand end ================= --> 


    <!-- ================ Blog section start ================= -->  
<br><br>    
    <section class="blog">
      <div class="container">
        <div class="section-intro pb-60px">
          <p>Popular Item in the market</p>
          <h2>Latest <span class="section-intro__style">News</span></h2>
        </div>

        <div class="row">
        
          @foreach ($blogs as $blogPost )
            
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
              <div class="card card-blog">
                <div class="card-blog__img">
                  <img class="card-img rounded-0" src="{{asset($blogPost->post_image)}}" style="width: 350px; height:243.05px;" alt="">
                </div>
                <div class="card-body">
                  <ul class="card-blog__info">
                    <li><a href="#">By Admin</a></li>
                    <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                  </ul>
                  <h4 class="card-blog__title"><a href="{{route('blogPage.detail.view' , $blogPost->id)}}">{{$blogPost->poast_title_en}}</a></h4>
                  <p>{!! Str::limit($blogPost->poast_details_en , 100) !!}</p>
                  <a class="card-blog__link" href="{{route('blogPage.detail.view' , $blogPost->id)}}">Read More <i class="ti-arrow-right"></i></a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- ================ Blog section end ================= -->  

    <!-- ================ Subscribe section start ================= --> 
    <section class="subscribe-position">
      <div class="container">
        <div class="subscribe text-center">
          <h3 class="subscribe__title">Get Update From Anywhere</h3>
          <p>Bearing Void gathering light light his eavening unto dont afraid</p>
          <div id="mc_embed_signup">
            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe-form form-inline mt-5 pt-1">
              <div class="form-group ml-sm-auto">
                <input class="form-control mb-1" type="email" name="EMAIL" placeholder="Enter your email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" >
                <div class="info"></div>
              </div>
              <button class="button button-subscribe mr-auto mb-1" type="submit">Subscribe Now</button>
              <div style="position: absolute; left: -5000px;">
                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
              </div>

            </form>
          </div>
          
        </div>
      </div>
    </section>
    <!-- ================ Subscribe section end ================= --> 

    

  </main>
 

@endsection
