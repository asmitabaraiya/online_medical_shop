@extends('castomer.main_master')

@section('title')

Pharmative - My Return Order  
@endsection
@section('body')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="main_menu ">

    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
      <li class="breadcrumb-item active" aria-current="page"> My Return Order       
    </li>
    </ol>      
</div>

<section  class="section-margin calc-60px">
  
    <div class="container">
        <div class="row">
          
            @include('castomer.comman.profile_banner')
          
          <div class="col-lg-8 ">
            <div class="blog_left_sidebar">

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Invoice</th>
                        <th scope="col">Order Number</th>
                        <th scope="col">Order Status</th>
                        
                      </tr>
                      
                    </thead>
                    <tbody>
                     
                        @foreach($orders as $order)

                            <tr>
                                <td scope="row">{{ Carbon\Carbon::parse($order->order_date)->format('D , d M Y')}}</td>
                                <td>₹{{$order->amount}}</td>
                                <td>{{$order->payment_method}}</td>
                                <td>{{$order->invoice_no}}</td>
                                <td>{{$order->order_number}}</td>
                                <td width="15%">
                                  @if ($order->return_order == 0 ) 
                                    No return Request
                                  @elseif($order->return_order == 1)
                                    Pandding  Request
                                  @elseif($order->return_order == 2)
                                    Success  
                                  @endif
                                </td>
                                
                            </tr>

                        @endforeach    

                    </tbody>
                  </table>
                  
                 
            </div>

          </div>
        </div>
    </div>
</section>




@endsection