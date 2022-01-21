@extends('user.main_master')
@section('content')

@section('title')
    Pharmative 
@endsection

 <!-- Carousel Slider Only Slide -->
 <div class="box">
   
    <section class="blog-banner-area" id="blog">
        <div id="carousel-example-generic-captions" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
                                 
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">

        @php
            $i = 1;
        @endphp   
        
        

        @foreach ($slider as $slid)
           
                <div class=" {{($i==1) ? 'carousel-item active' : 'carousel-item '}} ">
                    <img src="{{ asset($slid->slider_img) }}" height="550" width="1200"  alt="slide-1">
                    <div class="carousel-caption">
                    <h1 >{{$slid->title}}</h1>
                    <p >  {{$slid->description}} </p>
                    </div>
                </div>
            @php
                $i++;
            @endphp 
                  
        @endforeach    
                          
          </div>
          <!-- Controls -->
          <a class="carousel-control-prev" href="#carousel-example-generic-captions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-example-generic-captions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>               
    </section>
</div>
  <!-- /.box -->



<div class="site-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="feature">
                    <span class="wrap-icon flaticon-24-hours-drugs-delivery"></span>
                    <h3><a href="#">Free Delivery</a></h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa laborum voluptates
                        excepturi neque labore .</p>
                    <p><a href="#" class="d-flex align-items-center"><span class="mr-2">Learn more</span> <span
                                class="icon-keyboard_arrow_right"></span></a></p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="feature">
                    <span class="wrap-icon flaticon-medicine"></span>
                    <h3><a href="#">New Medicine Everyday</a></h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa laborum voluptates
                        excepturi neque labore .</p>
                    <p><a href="#" class="d-flex align-items-center"><span class="mr-2">Learn more</span> <span
                                class="icon-keyboard_arrow_right"></span></a></p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="feature">
                    <span class="wrap-icon flaticon-test-tubes"></span>
                    <h3><a href="#">Medicines Guaranteed</a></h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa laborum voluptates
                        excepturi neque labore .</p>
                    <p><a href="#" class="d-flex align-items-center"><span class="mr-2">Learn more</span> <span
                                class="icon-keyboard_arrow_right"></span></a></p>
                </div>
            </div>
        </div>
    </div>
</div>






<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>

               
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">@if(session()->get('language') == 'hindi')  सब  @else  All @endif  </li>
                       @foreach ( $categorys as $category )
                            <li data-filter=".{{$category->category_slug_en}}">@if(session()->get('language') == 'hindi')  {{$category->category_name_hin}}  @else {{$category->category_name_en}} @endif  </li>
                       @endforeach                                                                      
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach (  $categorys as $category )

        @php 
            $catWiseProduct = App\Models\Product::where( 'category_id' , $category->id)->where('status' , 1)->orderBy('id' , 'DESC')->get();
        @endphp



                @foreach ($catWiseProduct as $product)

                @if ($product->category_id == $category->id)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix {{$category->category_slug_en}} ">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg"
                                data-setbg="{{asset($product->product_thumbnail)}}" height="50" width="50">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="{{ url('product/detail/'.$product->id.'/'.$product->product_slug_en  ) }}">@if(session()->get('language') == 'hindi')  {{$product->product_name_hin}}  @else  {{$product->product_name_en}} @endif </a></h6>
                                <h5> ₹{{ $product->selling_price }}</h5>
                            </div>
                        </div>
                    </div>  
                    
                @endif

               
                    
                @endforeach
                
            @endforeach
            

        </div>
    </div>
</section>
<!-- Featured Section End -->



<div class="site-section bg-image overlay" style="background-image: url('images/hero_bg_2.jpg');">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-7">
                <h3 class="text-white">Sign up for discount up to 55% OFF</h3>
                <p class="text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis
                    voluptatem consectetur quam.</p>
                <p class="mb-0"><a href="#" class="btn btn-outline-white">Sign up</a></p>
            </div>
        </div>
    </div>
</div>



<!-- Latest Product Section Begin -->
<section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('frontend/assets_new')}}/img//latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('frontend/assets_new')}}/img//latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('frontend/assets_new')}}/img//latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('frontend/assets_new')}}/img//latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('frontend/assets_new')}}/img//latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('frontend/assets_new')}}/img//latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('frontend/assets_new')}}/img//latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('frontend/assets_new')}}/img//latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('frontend/assets_new')}}/img//latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('frontend/assets_new')}}/img//latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('frontend/assets_new')}}/img//latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('frontend/assets_new')}}/img//latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('frontend/assets_new')}}/img//latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('frontend/assets_new')}}/img//latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('frontend/assets_new')}}/img//latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('frontend/assets_new')}}/img//latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('frontend/assets_new')}}/img//latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('frontend/assets_new')}}/img//latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
    <!-- Latest Product Section End -->

  

    <div class="site-section">
        <div class="container">
          
          <div class="row justify-content-between">
            <div class="col-lg-6">
              <div class="title-section">
                <h2>Happy <strong class="text-primary">Customers</strong></h2>
              </div>
              <div class="block-3 products-wrap">
              <div class="owl-single no-direction owl-carousel">
          
                <div class="testimony">
                  <blockquote>
                    <img src="images/person_1.jpg" alt="Image" class="img-fluid">
                    <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat unde.&rdquo;</p>
                  </blockquote>
  
                  <p class="author">&mdash; Kelly Holmes</p>
                </div>
          
                <div class="testimony">
                  <blockquote>
                    <img src="images/person_2.jpg" alt="Image" class="img-fluid">
                    <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                      obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                      unde.&rdquo;</p>
                  </blockquote>
                
                  <p class="author">&mdash; Rebecca Morando</p>
                </div>
          
                <div class="testimony">
                  <blockquote>
                    <img src="images/person_3.jpg" alt="Image" class="img-fluid">
                    <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                      obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                      unde.&rdquo;</p>
                  </blockquote>
                
                  <p class="author">&mdash; Lucas Gallone</p>
                </div>
          
                <div class="testimony">
                  <blockquote>
                    <img src="images/person_4.jpg" alt="Image" class="img-fluid">
                    <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                      obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                      unde.&rdquo;</p>
                  </blockquote>
                
                  <p class="author">&mdash; Andrew Neel</p>
                </div>
          
              </div>
            </div>
            </div>
            <div class="col-lg-5">
              <div class="title-section">
                <h2 class="mb-5">Why <strong class="text-primary">Us</strong></h2>
                <div class="step-number d-flex mb-4">
                  <span>1</span>
                  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore</p>
                </div>
  
                <div class="step-number d-flex mb-4">
                  <span>2</span>
                  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore</p>
                </div>
  
                <div class="step-number d-flex mb-4">
                  <span>3</span>
                  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection