@extends('castomer.main_master')
@section('title')

@if(session()->get('language') == 'hindi')  My Cart Page  @else My Cart Page @endif     
@endsection

@section('body')



<section class="checkout_area section-margin--small">
    
    <div class="container">        
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Shipping Address</h3>
                    <form class="row  contact_form" method="POST" action="{{route('checkOute.store')}}" id="register_form" >
                        @csrf
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="name" value="{{ old('shipping_name') }}" name="shipping_name" placeholder="Shipping Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Shipping Name'">
                            @error('shipping_name')
                            <span class="text-danger">{{ $message }}</span>
                             @enderror
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="email" value="{{Auth::user()->email}}" name="shipping_email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
                            @error('shipping_email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>

                        

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control"  name="shipping_phone" value="{{ old('shipping_phone') }}" placeholder="Phone No" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone No'">
                                @error('shipping_phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control"  name="post_code" value="{{ old('post_code') }}" placeholder="Post Code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Post Code'">
                                @error('post_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                        </div>

                        <div class="col-md-12 form-group  contact_form">
                            <select name="division_id"  class="country_select"  >
                                <option value="" selected="" disable="">Select Division</option>
                                @foreach($divisions as $item)
                                    <option value="{{ $item->id }}">{{ $item->division_name }}</option>
                                @endforeach()
                            </select>
                            @error('division_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group   contact_form">
                                <select name="district_id"  class="country_select"  >
                                    <option value="" selected="" disable="" >Select District</option> 
                                                                     
                                </select>
                                @error('district_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                              
                            </div>

                            <div class="col-md-6 form-group  contact_form">
                                <select name="state_id"  class="country_select"  >
                                    <option value="" selected="" disable="" >Select State</option>     
                                       
                                </select>
                                @error('state_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                        </div>

                        <div class="col-md-12 form-group">
                            <textarea class="form-control" value="{{ old('notes') }}" name="notes" id="message" rows="3" placeholder="Order Notes"></textarea>
                        </div>

                        
                 
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2 class="my-3">Your CheckOut Progress</h2>
                        <ul class="list">
                           

                            @foreach ($carts as $item )
                            <li>
                                <div class="row">
                                    <div class="col">
                                        <img src="{{asset($item->options->image)}}" class="rounded" style="height: 50px; width: 50px;">
                                    </div>
                                    <div class="col-6">
                                        {{$item->name}}
                                    </div>
                                    <div class="col">
                                        x {{$item->qty}}
                                    </div>
                                  </div>
                            </li>
                            <hr>
                            @endforeach
                            
                        </ul>

                        @if (Session::has('coupon'))

                        <ul class="list list_2">
                            <li><a >Coupon  <span>{{ session()->get('coupon')['coupon_name'] }} &nbsp; {{ session()->get('coupon')['coupon_discount'] }}%</span></a></li>
                            <li><a >SubTotal <span>{{ $cartTotal }}</span></a></li>
                            <li ><a > &nbsp; <span style="color: #0f35ed;"> -{{session()->get('coupon')['discount_amount'] }}</span></a></li>                         
                            <li><a >Total <span>₹{{ session()->get('coupon')['total_amount'] }}.00</span></a></li>
                        </ul>

                        @else
                       
                        <ul class="list list_2">
                            <li><a >SubTotal <span>₹{{ $cartTotal }}.00</span></a></li>                         
                            <li><a >Total <span>₹{{ $cartTotal }}.00</span></a></li>
                        </ul>
                        @endif
                        <hr>
                        <div class="row my-4 mx-3">

                            <div class="col md-6 ">
                                <div class="payment_item ">
                           
                                    <input type="radio" id="f-option6" name="payment_method" value="stripe">
                                   
                                    <img src="{{asset('castomer/img/payments/1.png')}}" style="height: 40px; width: 70px;" alt="">
                                    <div class="check"></div>
                                                        
                            </div>
    
                            
    
                            <div class="payment_item my-2">
                               
                                    <input type="radio" id="f-option1" name="payment_method" value="cash">
                                    
                                    <img src="{{asset('castomer/img/payments/6.png')}}" style="height: 40px; width: 70px;" alt="">
                                    <div class="check"></div>
                                                           
                            </div>

                            </div>

                            <div class="col md-6 ">
                                <div class="payment_item ">
                           
                                    <input type="radio" id="f-option2" name="payment_method" value="card">
                                   
                                    <img src="{{asset('castomer/img/payments/3.png')}}" style="height: 40px; width: 70px;" alt="">
                                    <div class="check"></div>
                                                         
                            </div>
    
                            <div class="payment_item my-2">
                                
                                    <input type="radio" id="f-option3" name="payment_method" value="mestro">
                                   
                                    <img src="{{asset('castomer/img/payments/4.png')}}" style="height: 40px; width: 70px;" alt="">
                                    <div class="check"></div>
                                                         
                            </div>
                           

                            </div>
                            @error('payment_method')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                            
                        </div>

                        <div class="text-center">
                            <button type="submit"  class="button button-paypal">Payment</button>
                        </div>

                        
                       

                    </div>
                   
                </div>

            </form>
            </div>
        </div>
    </div>
    
  </section>


  
 
@endsection





