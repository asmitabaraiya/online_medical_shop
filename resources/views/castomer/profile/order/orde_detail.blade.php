@extends('castomer.main_master')

@section('title')

@if(session()->get('language') == 'hindi') Pharmative - प्रोफ़ाइल अपडेट    @else Pharmative - Profile Update  @endif     
@endsection
@section('body')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="main_menu ">

    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">@if(session()->get('language') == 'hindi')  घर @else Home @endif</a></li>
      <li class="breadcrumb-item active" aria-current="page">@if(session()->get('language') == 'hindi') प्रोफ़ाइल अपडेट   @else My Order  @endif     
    </li>
    </ol>      
</div>


<!--================Order Details Area =================-->

<section class="order_details section-margin--small">
  

    <div class="container">
      <p class="text-center billing-alert">
        @if ($order->return_reason == NULL)
          Thank you. Your order has been received.
        @else
          Your return Order
        @endif
      </p>
      <div class="row mb-5">
        <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
          <div class="confirmation-card">
            <h3 class="billing-title">Order Info</h3>
            <table class="order-rable">
              <tr>
                <td>Order number</td>
                <td>: {{$order->invoice_no}}</td>
              </tr>
              <tr>
                <td>Date</td>
                <td>: {{$order->order_date}}</td>
              </tr>
              <tr>
                <td>Total</td>
                <td>: {{$order->amount}}</td>
              </tr>
              <tr>
                <td>Payment method</td>
                <td>: {{$order->payment_type}}</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
          <div class="confirmation-card">
            <h3 class="billing-title">Billing Address</h3>
            <table class="order-rable">
              <tr>
                <td>Street</td>
                <td>: 56/8 panthapath</td>
              </tr>
              <tr>
                <td>City</td>
                <td>: Dhaka</td>
              </tr>
              <tr>
                <td>Country</td>
                <td>: Bangladesh</td>
              </tr>
              <tr>
                <td>Postcode</td>
                <td>: 1205</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
          <div class="confirmation-card">
            <h3 class="billing-title">Shipping Address</h3>
            <table class="order-rable">
              <tr>
                <td>Street</td>
                <td>: {{$order->address}}</td>
              </tr>
              <tr>
                <td>City</td>
                <td>: {{$order->district->district_name}}</td>
              </tr>
              <tr>
                <td>State</td>
                <td>: {{$order->division->division_name}}</td>
              </tr>
              <tr>
                <td>Postcode</td>
                <td>: {{$order->post_code}}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="order_details_table">
        <h2>Order Details</h2>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th></th>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
              
            </thead>
           
            <tbody >
              
            @foreach ($orderItem as $item)
              
             
              <tr >
                <td> <div class="d-flex"> <img src="{{asset($item->product->product_thumbnail)}}" alt="" width="90px" hieght="90px"></div> </td>                
                <td>
                  <p>{{$item->product->product_name_en}}</p>
                </td>
                <td>
                  <h5>x {{$item->qty}}</h5>
                </td>
                <td>
                  <p>₹{{($item->qty * $item->price)}}.00</p>
                </td>
              </tr>

            @endforeach   
              

              <tr>  
                <td></td>                              
                <td>                  
                </td>
                <td>
                  <h4>Total</h4>
                </td>
                <td>
                  <h4>₹{{$order->amount}}.00</h4>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      @if($order->status == "delivered")

        @if ($order->return_reason == NULL)
            <br><br><br>
            <h4>Are You Want to Return Order ?</h4>
            <hr>
            <form method="post" action="{{route('order.return' , $order->id)}}" class="form-contact contact_form "   id="contactForm" novalidate="novalidate" >
              @csrf
                <div class="form-group">
                  <textarea class="form-control different-control w-100" name="return_reason" id="message" cols="30" rows="5" placeholder="Enter Your Reason"></textarea>
                </div>

                <div class="col-md-12 form-group">
                  <button type="submit" value="submit" class="button button-register ">Return</button>
                </div>
            </form>
        @else
            <br><br>
          <h6>Your Return Request has been Submited . We are inform you with in a few day . </h6>
        @endif
       
      @else

      @endif

    </div>

    

  </section>


  <!--================End Order Details Area =================-->




@endsection