@extends('admin.admin_master')
@section('admin')



    <div class="col-12 my-4">
            <div class="box">
                <div class="box-header with-border margin-top-10">
                    <h3 class="box-title">Medicine List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-white">
                                    <th>Medicine Image</th>
                                    <th>Medicine En</th>
                                    <th>Medicine Hin</th>
                                    <th>Medicine Price</th>
                                    <th>Quantity</th>
                                    <th>Discount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($medicines as $item)
                                <tr class="text-white" >
                                    <td>
                                        <div class="flex-shrink-0 mr-20">
                                            <div class="bg-img h-50 w-50" style="background-image: url( {{asset($item->medicine_thumbnail)}} )">
                                            </div>
                                        </div>
                                    </td>
                                   
                                    <td >{{$item->medicine_name_en}}</td>
                                    <td >{{$item->medicine_name_hin}}</td>
                                    <td >₹{{$item->medicine_selling_price}} </td>
                                    <td >{{$item->medicine_qty}}Pic </td>
                                    <td> 
                                        @if($item->medicine_discount_price == NULL)
                                            <span class=" badge badge-danger-light badge-lg "> No Discount </span>
                                        @else
                                            @php 
                                                $amount = $item->medicine_selling_price - $item->medicine_discount_price;
                                                $discount = ($amount/$item->medicine_selling_price) * 100;
                                            @endphp

                                            @if ($discount >= 70 )
                                                <span class="badge badge-success-light badge-lg"> {{round($discount)}}% </span>
                                            @elseif ( ($discount >= 45) && ($discount < 70) )
                                                <span class="badge badge-primary-light badge-lg"> {{round($discount)}}% </span>
                                            @else
                                                <span class="badge badge-danger-light badge-lg"> {{round($discount)}}% </span>
                                            @endif
                                             
                                        @endif

                                    </td>
                                    <td>
                                        @if($item->status == 1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">InActive</span>
                                        @endif

                                         
                                    </td>
                                    <td width="30%">
                                        <a href="{{route('medicine.preview' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" ><i class="fa fa-eye" title="Preview"></i></a>
                                        <a href="{{route('medicine.edit' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" ><i class="fa fa-pencil" title="Edit"></i></a>
                                        <a href="{{route('medicine.delete' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" ><i class="fa fa-trash" title="delete"></i></a>

                                        @if($item->status == 1)
                                            <a href="{{route('medicine.inactive' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" title="Inactive Now"><i class="fa fa-arrow-down"></i></a>
                                        @else
                                            <a href="{{route('medicine.active' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" title="Active Now"><i class="fa fa-arrow-up"></i></a>
                                        @endif
                                          
                                    </td>
                                </tr>
                                @endforeach()

                            </tbody>

                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
    </div>
  


@endsection()