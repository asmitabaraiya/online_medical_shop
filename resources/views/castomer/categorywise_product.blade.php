@extends('castomer.main_master')

@section('title')

@if(session()->get('language') == 'hindi')  {{ $title->category_name_hin }}  @else {{ $title->category_name_en }} @endif     
@endsection
@section('body')

<script src="https://mdbootstrap.com/docs/b4/jquery/getting-started/cdn/"></script>

<!-- ================ start banner area ================= -->	
    <div class="main_menu container">

        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">@if(session()->get('language') == 'hindi')  {{ $title->category_name_hin }}  @else {{ $title->category_name_en }} @endif  </li>
          
        </ol>      
    </div>
<!-- ================ end banner area ================= -->



 <!-- ================ category section start ================= -->
 <section class="section-margin--small mb-5">
    <div class="container">
      <div class="row">
        @include('castomer.comman.tag')
        <div class="col-xl-9 col-lg-8 col-md-7">
          <!-- Start Filter Bar -->
          <div class="filter-bar d-flex flex-wrap align-items-center">
            <div class="sorting">
              <select>
                <option value="1">Default sorting</option>
                <option value="1">Default sorting</option>
                <option value="1">Default sorting</option>
              </select>
            </div>
            <div class="sorting mr-auto">
              <select>
                <option value="1">Show 12</option>
                <option value="1">Show 12</option>
                <option value="1">Show 12</option>
              </select>
            </div>
            <div>
              <div class="input-group filter-bar-search">
                <input type="text" placeholder="Search">
                <div class="input-group-append">
                  <button type="button"><i class="ti-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- End Filter Bar -->
          <!-- Start Best Seller -->
          <section class="lattest-product-area pb-40 category-list">
            <div class="row">
              

@foreach ($products as $product )
    

              <div class="col-md-6 col-lg-4">
                <div class="card text-center card-product">
                  <div class="card-product__img">
                    <img class="card-img" src="{{asset($product->product_thumbnail)}}" alt="">
                    <ul class="card-product__imgOverlay">
                      <li><button><i class="ti-search"></i></button></li>
                      <li><button><i class="ti-shopping-cart"></i></button></li>
                      <li><button><i class="ti-heart"></i></button></li>
                    </ul>
                  </div>
                  <div class="card-body">
                   
                    <h4 class="card-product__title"><a href="{{ url('product/detail/'.$product->id.'/'.$product->product_slug_en  )}}" >@if(session()->get('language') == 'hindi')  {{$product->product_name_hin}}  @else {{$product->product_name_en}} @endif  </a></h4>
                   
                    <p class="card-product__price">
                        @if( $product->discount_price != NULL )
                        <del>₹{{$product->selling_price}}.00 </del> &nbsp; <strong class="h4">₹{{$product->discount_price}}.00 </strong>
                        @else
                            <strong class="h4">₹{{$product->selling_price}}.00</strong>
                        @endif
                    </p>
                  </div>
                </div>
              </div>
@endforeach
{{ $products->links() }}
              
            </div>
          </section>
          <!-- End Best Seller -->
        </div>
      </div>
    </div>
  </section>
  <!-- ================ category section end ================= -->
  
  

@endsection