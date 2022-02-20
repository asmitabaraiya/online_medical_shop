@extends('castomer.main_master')
@section('title')

@if(session()->get('language') == 'hindi')  Stripe  @else Cash On delivery @endif     
@endsection

@section('body')


<section class="blog_area single-post-area py-80px section-margin--small">
    <div class="container">
            <div class="row">
                    <div class="col-lg-6 posts-list">
                            <div class="single-post row">
                                <div class="comments-area">
                                    <h4>Your Shopping Amount</h4>
                                    <hr>
                                    @if (Session::has('coupon'))
                                                <div class="comment-list">
													<div class="single-comment justify-content-between d-flex">
															<div class="user justify-content-between d-flex">
																	
																	<div class="desc">
																			<h5>
																					<a >Coupon</a>
																			</h5>																			
																	</div>
															</div>
															<div class="reply-btn">
																	<span>{{ session()->get('coupon')['coupon_name'] }} &nbsp; {{ session()->get('coupon')['coupon_discount'] }}%</span>
															</div>
													</div>
											    </div>
                                                <div class="comment-list">
													<div class="single-comment justify-content-between d-flex">
															<div class="user justify-content-between d-flex">
																	
																	<div class="desc">
																			<h5>
																					<a >SubTotal</a>
																			</h5>																			
																	</div>
															</div>
															<div class="reply-btn">
																<span>{{ $cartTotal }}</span>	
															</div>
													</div>
											    </div>
                                                <div class="comment-list">
													<div class="single-comment justify-content-between d-flex">
															<div class="user justify-content-between d-flex">
																	
																	<div class="desc">
																			<h5>
																					<a > &nbsp;</a>
																			</h5>																			
																	</div>
															</div>
															<div class="reply-btn">
                                                                <span style="color: #0f35ed;"> -{{session()->get('coupon')['discount_amount'] }}</span>
															</div>
													</div>
											    </div>
                                                <div class="comment-list">
													<div class="single-comment justify-content-between d-flex">
															<div class="user justify-content-between d-flex">
																	
																	<div class="desc">
																			<h5>
																					<a >Total</a>
																			</h5>																			
																	</div>
															</div>
															<div class="reply-btn">
                                                               <span> {{ session()->get('coupon')['total_amount'] }}</span>
															</div>
													</div>
											    </div>
                                    @else

                                                <div class="comment-list">
                                                    <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                    
                                                                    <div class="desc">
                                                                            <h5>
                                                                                    <a >SubTotal</a>
                                                                            </h5>																			
                                                                    </div>
                                                            </div>
                                                            <div class="reply-btn">
                                                                <span>{{ $cartTotal }}</span>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="comment-list">
                                                    <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                    
                                                                    <div class="desc">
                                                                            <h5>
                                                                                    <a >Total</a>
                                                                            </h5>																			
                                                                    </div>
                                                            </div>
                                                            <div class="reply-btn">
                                                                <span>{{ $cartTotal }}</span>
                                                            </div>
                                                    </div>
                                                </div>

                                    @endif
                                                                                                                                                                                  
                                </div>
                            </div>
                    </div> 
                    <div class="col-lg-6 posts-list ">
                        <div class="single-post row">
                            <div class="comments-area mx-4">
                                <h4>Get Ready To Payment</h4>
                                    <hr>
                                <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">

                                        
                                            
                                        <form action="{{ route('cash.order')}}" method="post" id="payment-form">
                                            @csrf
                                            <div class="form-row">
                                                <label for="card-element">
                                                    <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                                    <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                                                    <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                                                    <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                                                    <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                                                    <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                                                    <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                                                    <input type="hidden" name="notes" value="{{ $data['notes'] }}"> 
                                                                                                   
                                                </label>
                                                <img src="{{asset('castomer/img/payments/cash.png')}}" alt="" srcset="">

                                            </div>
                                            <br>
                                            <button class="button button-paypal"  >Submit Payment</button>
                                        </form>

                                        



                                    </div>
                                </div>                                                    

                            </div>
                        </div>                            
                    </div>
            </div>
    </div>
    
</section>                                        




@endsection

