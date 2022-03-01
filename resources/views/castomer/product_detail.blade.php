@extends('castomer.main_master')

@section('title')
 {{ $product->product_name_en }}     
@endsection

@section('body')



<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="owl-carousel owl-theme s_Product_carousel">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{asset($product->product_thumbnail)}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3 id="pname"> {{ $product->product_name_en }} </h3>
                    <p>
                        @if( $product->discount_price != NULL )
                            <del>₹{{$product->selling_price}}.00 </del> &nbsp; <strong class="h4">₹{{$product->discount_price}}.00 </strong>
                        @else
                            <strong class=" h4">₹{{$product->selling_price}}.00</strong>
                        @endif
                    </p>
                    
                   
                    <ul class="list">
                        @if ($product->product_qty != NULL)
                            <li><a href="#"><span> Availibility </span> <span> : In Stock  </span> </a></li>
                        @else
                            <li><a href="#"><span> Availibility  </span><span> : Out of Stock  </span> </a></li>                            
                        @endif
                    </ul>
                    <p>
                         {!! $product->short_descp_en !!}  
                    </p>
                    <input type="hidden" id="product_id" value="{{$product->id}}">
                    <div  id="colorArea">
                        <select class="form-select" aria-label="Default select example" id="color" name="color" >
                            @foreach ($product_color_en as $color )
                                <option value=" {{$color}}"> {{$color}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class = "form-group my-4">
                        <input class="form-control form-control-sm" id="qty" value="1"  type="number" placeholder="Quantity" aria-label="Quantity" min="1">
                    </div>
                    <div class="product_count my-4">
                        <a class="button primary-btn" onclick="addToCart()" href=""  >   Add To Cart </a>               
                    </div>
                    
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox_8ojg"></div>
            
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                 aria-selected="false">Specification</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link " id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                 aria-selected="false">Reviews</a>
            </li>
        </ul>   
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>
                   {!! $product->long_descp_en !!} 
                </p>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h5>Width</h5>
                                </td>
                                <td>
                                    <h5>128mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Height</h5>
                                </td>
                                <td>
                                    <h5>508mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Depth</h5>
                                </td>
                                <td>
                                    <h5>85mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Weight</h5>
                                </td>
                                <td>
                                    <h5>52gm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Quality checking</h5>
                                </td>
                                <td>
                                    <h5>yes</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Freshness Duration</h5>
                                </td>
                                <td>
                                    <h5>03days</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>When packeting</h5>
                                </td>
                                <td>
                                    <h5>Without touch of hand</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Each Box contains</h5>
                                </td>
                                <td>
                                    <h5>60pcs</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


         
            <div class="tab-pane fade " id="review" role="tabpanel" aria-labelledby="review-tab">
					<div class="row">
						<div class="col-lg-6">							
							<div class="review_list">

                                @foreach ($reviews as $review)                                                                    
                                    <div class="review_item">
                                        <div class="media">
                                            <div class="d-flex">
                                                @if ($review->users->profile_photo_path)
                                                        <img class="author_img rounded-circle" style="border-radius: 60%" src="{{asset('upload/user_images/'.$review->users->profile_photo_path)}}" style="height: 60px; width:60px;" alt="">       
                                                @else
                                                        <img class="author_img rounded-circle" style="border-radius: 60%" src="{{asset('upload/no_image.jpg')}}" style="height: 60px; width:60px;" alt="">                                                                                
                                                @endif
                                            </div>
                                            <div class="media-body">
                                                <h4>{{$review->users->name}}</h4>
                                            <p >{{Carbon\Carbon::parse($review->created_at)->diffForHumans()}}  </p>

                                            </div>
                                        </div>
                                        <p>{{$review->subject}}</p>
                                        <p>{{$review->message}}</p>
                                    </div>
                                    <br>
                                @endforeach    
								
							</div>
						</div>
						<div class="col-lg-6">
							<div class="review_box">
                                @guest
                                    <h6>To Add a Review</h6><a href="{{route('login')}}">Login Here</a>	
                                @else                                                                    
                                    <h4>Add a Review</h4>								
                                    <form action="{{route('review.store')}}" method="POST" class="form-contact form-review mt-3">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <div class="form-group">
                                            <input class="form-control" name="subject" type="text" placeholder="Enter Subject">
                                            @error('subject')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control different-control w-100" name="message" id="textarea" cols="30" rows="5" placeholder="Enter Message"></textarea>
                                            @error('message')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                        <div class="form-group text-center text-md-right mt-3">
                                            <button type="submit" class="button button--active button-review">Submit Now</button>
                                        </div>
                                    </form>
                                @endguest
							</div>
						</div>
					</div>
				</div>

           
        </div>
    </div>
</section>
<!--================End Product Description Area =================-->

<!--================ Start related Product area =================-->  


<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6215c03ec5709e90"></script>

@endsection