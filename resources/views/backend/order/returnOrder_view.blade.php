@extends('admin.admin_master')
@section('admin')

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border margin-top-10">
                    <h3 class="box-title">Order List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-white">
                                    <th>Date</th>
                                    <th>Invoice</th>
                                    <th>Amount</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr class="text-white">
                                    <td >
                                        {{ Carbon\Carbon::parse($order->order_date)->format('D , d M Y')}}
                                    </td>
                                    <td >{{$order->invoice_no}}</td>
                                    <td>Rs. {{$order->amount}}</td>
                                    <td >{{$order->payment_method}}</td>
                                    <td>
                                       
                                            @if ($order->return_order == 1)
                                                <span class="badge badge-pill badge-danger">Panding </span>
                                            @elseif ($order->return_order == 2)
                                                <span class="badge badge-pill badge-success">Success </span>
                                            @endif
                                       
                                    </td>                                   
                                    
                                    <td >
                                        <a href="{{route('order.return.approve' , $order->id)}}" class="waves-effect waves-light btn    btn-success" >Aprove</a>                                       
                                    </td>
                                </tr>
                                @endforeach()

                            </tbody>

                        </table>
                    </div>
                </div>                
                <!-- /.box-body -->
            </div>
            <a href="{{route('order.aprove.view')}}" style="float: right;"> View All Aproved Orders </a>
        </div>

      
    </div>

    <!-- <button class="tst1 btn btn-info btn-block mb-15">Info Message</button> -->
</section>

@endsection