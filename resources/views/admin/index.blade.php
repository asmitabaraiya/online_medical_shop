@extends('admin.admin_master')
@section('admin')

@php
    $date = date('d F Y');
    $today = App\Models\Order::where('order_date' , $date)->sum('amount');

    $month = date('F');
    $monthData = App\Models\Order::where('order_month' , $month)->sum('amount');

    $year = date('Y');
    $yearData = App\Models\Order::where('order_year' , $year)->sum('amount');

    $PendingOrders = App\Models\Order::where('status' , 'pending')->orderBy('id' , 'DESC')->get();

    $users = App\Models\User::latest()->get();


    $chat = App\Models\Order::selectRaw('order_month as order_month, sum(amount) as amount')
            ->groupBy('order_month')          
            ->get();

            foreach ($chat as  $value) {
               // echo $value;
            }
    
@endphp

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xl-2 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-primary-light rounded w-60 h-60">
                            <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16"><a href="{{route('all.user')}}">Total Users</a></p>
                            <h3 class="text-white mb-0 font-weight-500">{{count($users)}} <small class="text-success"> <a  href="{{route('all.user')}}">users</a> </small></h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-danger-light rounded w-60 h-60">
                            <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16"> <a href="{{route('orders.pandingOrder')}}">Panding Orders</a> </p>
                            <h3 class="text-white mb-0 font-weight-500">{{count($PendingOrders)}} <small class="text-danger"> <a href="{{route('orders.pandingOrder')}}">Orders</a> </small></h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-primary-light rounded w-60 h-60">
                            <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16"><a href="{{route('dashbord-by-date' , $date)}}">Today's Sale</a></p>
                            <h3 class="text-white mb-0 font-weight-500">₹{{$today}} </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-warning-light rounded w-60 h-60">
                            <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16"><a href="{{route('dashbord-by-month' , $month )}}">Monthly Sale</a>  </p>
                            <h3 class="text-white mb-0 font-weight-500">₹{{$monthData}} </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-info-light rounded w-60 h-60">
                            <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16"><a href="{{route('dashbord-by-year' , $year)}}">Yearly Sale</a> </p>
                            <h3 class="text-white mb-0 font-weight-500">₹{{$yearData}} </h3>
                        </div>
                    </div>
                </div>
            </div>
 
           
            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title align-items-start flex-column">
                            Recent Orders                        
                        </h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-border">
                                <thead>
                                    <tr class="text-uppercase bg-lightest">
                                        <th style="min-width: 100px"><span class="text-white">Date</span></th>
                                        <th ><span class="text-fade">Invoice No</span></th>
                                        <th ><span class="text-fade">Amount</span></th>
                                        <th ><span class="text-fade">Status</span></th>                                      
                                        <th style="min-width: 120px"></th>
                                    </tr>
                                </thead>
                                <tbody>
@php
      $orders = App\Models\Order::where('status' , 'pending')->limit(7)->orderBy('id' , 'DESC')->get();
@endphp                                    
                                @foreach($orders as $order)                                                                      
                                    <tr>
                                        <td >
                                            <div class="d-flex align-items-center">                                                
                                                <div>                                                    
                                                    <span class="text-fade d-block">{{Carbon\Carbon::parse($order->created_at)->diffForHumans()}}</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td >
                                            <div class="d-flex align-items-center">                                                
                                                <div>                                                    
                                                    <span class="text-fade d-block">{{$order->invoice_no}}</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td >
                                            <div class="d-flex align-items-center">                                                
                                                <div>                                                    
                                                    <span class="text-fade d-block">₹{{$order->amount}}</span>
                                                </div>
                                            </div>
                                        </td>


                                        <td >
                                            <div class="d-flex align-items-center">                                                
                                                <div>                                                    
                                                    <span class="text-fade d-block badge-pill badge-info">{{$order->status}}</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td >
                                            <div class="d-flex align-items-center">                                                
                                                <div>                                                    
                                                    <a href="{{route('order.pending.detail' , $order->id)}}"
                                                        class="waves-effect waves-light btn btn-info btn-circle mx-5"><span
                                                            class="mdi mdi-arrow-right"></span></a>
                                                </div>
                                            </div>
                                        </td>
                                       
                                       
                                    </tr>
                                @endforeach     
                                </tbody>
                            </table>
                        </div> 
                <a style="float: right;" href="{{route('orders.pandingOrder')}}">View All Orders</a>

                    </div>                    
                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>



@endsection