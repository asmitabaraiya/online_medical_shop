
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
     
      <h4 class="card-product__title"><a href="{{ url('product/detail/'.$product->id.'/'.$product->product_slug_en  )}}" >{{$product->product_name_en}}   </a></h4>
     
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
