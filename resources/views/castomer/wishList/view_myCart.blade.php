@extends('castomer.main_master')

@section('title')

 My Cart Page      
@endsection
@section('body')
<div class="main_menu ">

    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
      <li class="breadcrumb-item active" aria-current="page"> My Cart       
    </li>
    </ol>      
</div>
 <!--================Cart Area =================-->
 <section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                   
                    <tbody id="CartPage">                                                                          
                        



                      
                    </tbody>
                </table>
           
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12 estimate-ship-tax">
                </div>
                <div class="col-md-4 col-sm-12 estimate-ship-tax">
                @if (Session::has('coupon'))
                            
                @else

                
                    <table class="table" id="CouponApply">
                        <thead>
                            <tr>
                                <th >
                                   <h4> <span class="estimate-title">Discount Code</span></h4>
                                    <p>Enter your coupon code if you have one..</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control unicase-form-control text-input" name="coupon_name" id="coupon_name"  placeholder="Your Coupon..">
                                        </div>
                                        <div class="clearfix pull-right">
                                            <button type="submit" class="button button-paypal" onclick="applyCoupon()">APPLY COUPON</button>
                                        </div>
                                    </td>
                                </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                
                @endif
                </div>

                <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    
                        <div class="order_box" >
                            <h2>Your Order</h2>
                            <div id="couponCalField">

                            </div>                                                
                            <div class="text-center">
                              <a class="button button-paypal" type="submit" href="{{route('checkOut')}}">Proceed to Check Out</a>
                            </div>
                        </div>
                   
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->


@endsection