@extends('castomer.main_master')

@section('title')

 {{ $brand->brand_name_en }}      
@endsection
@section('body')
<!-- ================ start banner area ================= -->	
<div class="main_menu ">

    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ $brand->brand_name_en }}      
    </li>
    </ol>      
</div>
<!-- ================ end banner area ================= -->

@foreach ($categorys as $category )
@php
  $product_no = App\Models\Product::where('category_id' , $category->id)->where('brand_id' , $id )->get();
  $count = count($product_no);
  
@endphp
@if ($count >= 1)
  

      <section class="section-margin calc-60px">
        <div class="container">
          <div class="section-intro pb-60px">
            <h2> <span class="section-intro__style">{{$category->category_name_en}}</span></h2>
          </div>
          <div class="owl-carousel owl-theme  carouselme" >
            @foreach ($products as $product )
              @if ($category->id == $product->category_id)
                    <div class="card text-center card-product">
                      <div class="card-product__img">
                        <img class="img-fluid" src="{{asset($product->product_thumbnail)}}" alt="">
                        <ul class="card-product__imgOverlay">
                          <li><button><i class="ti-search"></i></button></li>
                          <li><button><i class="ti-shopping-cart"></i></button></li>
                          <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                      </div>
                      <div class="card-body">
                        <h4 class="card-product__title"><a href="{{ url('product/detail/'.$product->id.'/'.$product->product_slug_en  )}}">   {{$product->product_name_en}} </a></h4>
                        <p class="card-product__price">₹{{ $product->selling_price }}</p>
                      </div>
                    </div>
                @endif
              @endforeach
          </div>          
          <a href="{{url('/product/categorywise/'.$category->id.'/'.$category->category_slug_en)}}" style="float: right;"> View All {{$category->category_name_en}} </a> 
        
        </div>        
      </section>
@endif

@endforeach



   
     
      
    
     








@endsection