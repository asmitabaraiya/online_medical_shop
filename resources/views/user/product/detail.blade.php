@extends('user.main_master')



@section('content')

@section('title')
@if(session()->get('language') == 'hindi')  {{ $product->product_name_hin }}  @else {{ $product->product_name_en }} @endif     
@endsection

  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href=" {{url('/new')}} ">@if(session()->get('language') == 'hindi')  घर  @else Home @endif </a> <span class="mx-2 mb-0">/</span> <a
            href="shop.html">@if(session()->get('language') == 'hindi')  दुकान  @else Store @endif</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">@if(session()->get('language') == 'hindi')  {{ $product->product_name_hin }}  @else {{ $product->product_name_en }} @endif </strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row">
       

        <div class="col-lg-6 col-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Place somewhere in the <body> of your page -->
              <div class="flexslider2">
                <ul class="slides">
                  <li data-thumb="{{asset( $product->product_thumbnail )}}" >
                    <img
                      src="{{asset( $product->product_thumbnail )}}"
                      alt="slide"
                    />
                  </li>

                  @foreach ($multiImg as $img )

                  <li data-thumb="{{asset($img->photo_name)}}">
                    <img
                      src="{{asset($img->photo_name)}}"
                      alt="slide" 
                    />
                  </li> 
                    
                  @endforeach
                </ul>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

        







        <div class="col-md-6 my-3">
          <h2 class="text-black">@if(session()->get('language') == 'hindi')  {{ $product->product_name_hin }}  @else {{ $product->product_name_en }} @endif </h2>
          <p> @if(session()->get('language') == 'hindi')  {!! $product->long_descp_hin !!}  @else {!! $product->long_descp_en !!} @endif  </p>
          

          <p>
            @if( $product->discount_price != NULL )
                <del>₹{{$product->selling_price}}.00 </del> &nbsp; <strong class="text-primary h4">₹{{$product->discount_price}}.00 </strong>
            @else
                <strong class="text-primary h4">₹{{$product->selling_price}}.00</strong>
            @endif
          </p>

          
          
          <div class="mb-5">
            <div class="input-group mb-3" style="max-width: 220px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
              </div>
              <input type="text" class="form-control text-center" value="1" placeholder=""
                aria-label="Example text with button addon" aria-describedby="button-addon1">
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
              </div>
            </div>
  
          </div>
          <p><a href="cart.html" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary"> @if(session()->get('language') == 'hindi')  कार्ट में डालें  @else Add To Cart @endif   </a></p>

        

  
        </div>
      </div>
    </div>
  </div>




  

@endsection