@extends('castomer.main_master')

@section('title')

@if(session()->get('language') == 'hindi') Pharmative - प्रोफ़ाइल अपडेट    @else Pharmative - My Order  @endif     
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
                        <th scope="col">Order</th>
                        <th scope="col">Action</th>
                      </tr>
                      
                    </thead>
                    <tbody>
                     
                        @foreach($orders as $order)

                            <tr>
                                <td scope="row">{{ Carbon\Carbon::parse($order->order_date)->format('D , d M Y')}}</td>
                                <td>₹{{$order->amount}}</td>
                                <td>{{$order->payment_method}}</td>
                                <td>{{$order->invoice_no}}</td>
                                <td>{{$order->status}}</td>
                                <td>
                                    <a href="{{url('user/profile/myOrder/view/'.$order->id)}}" class="btn btn-sm btn-primary "><i class="fa fa-eye"></i> </a>

                                    <a  href="{{url('user/profile/myOrder/download/'.$order->id)}}" class="btn btn-sm btn-danger" ><i class="fa fa-download" style="color: white;"></i>  </a>
                            
                                </td>
                            </tr>

                        @endforeach    

                    </tbody>
                  </table>

                  <a href="{{route('order.return.view')}}" class="my-3">View Return Order</a>
            </div>

          </div>
        </div>
    </div>
</section>




@endsection