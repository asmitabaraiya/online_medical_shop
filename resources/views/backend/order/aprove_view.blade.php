@extends('admin.admin_master')
@section('admin')

<section class="content">
    <div class="row">

        @foreach ($orders as $order )
            
        
          <div class="col-md-6 col-12 ">
            <div class="box">
              <div class="box-body bg-gradient-secondary-dark">
               
                    <table class="table my-4">

                        <tr>
                            <th>  Date : </th>
                             <th> {{ $order->order_date }} </th>
                          </tr>

                        <tr>
                          <th>  Name : </th>
                           <th> {{ $order->name }} </th>
                        </tr>
                                     
            
                         <tr>
                          <th> Payment Type : </th>
                           <th> {{ $order->payment_method }} </th>
                        </tr>
                                                
                         <tr>
                          <th> Invoice  : </th>
                           <th class="text-danger"> {{ $order->invoice_no }} </th>
                        </tr>
            
                         <tr>
                          <th> Order Total : </th>
                           <th>Rs. {{ $order->amount }} </th>
                        </tr>
            
                                                            
                       </table>
                 
              </div>
            </div>
          </div>

          @endforeach
    </div>

    <!-- <button class="tst1 btn btn-info btn-block mb-15">Info Message</button> -->
</section>

@endsection