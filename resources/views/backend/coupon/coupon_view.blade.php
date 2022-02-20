@extends('admin.admin_master')
@section('admin')

<section class="content">
    <div class="row">
        <div class="col-8">
            <div class="box">
                <div class="box-header with-border margin-top-10">
                    <h3 class="box-title">Coupons List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-white">
                                    <th>Coupon Name</th>
                                    <th>Coupon Discount</th>
                                    <th>Validity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($coupons as $item)
                                <tr class="text-white">
                                    <td >
                                        {{$item->coupon_name}}
                                    </td>
                                    <td width="10%">{{$item->coupon_discount}}%</td>
                                    <td >{{ Carbon\Carbon::parse($item->coipon_validity)->format('D , d M Y')}}</td>
                                    <td>
                                        @if($item->status == 1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">InActive</span>
                                        @endif
                                        
                                    </td>                                   
                                    
                                    <td width="30%">
                                        <a href="{{route('coupon.edit' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" ><i class="fa fa-pencil" title="Edit"></i></a>
                                        <a href="{{route('coupon.delete' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info"  id="delete"><i class="fa fa-trash" title="delete"></i></a>
                                        @if($item->status == 1)
                                            <a href="{{route('coupon.inactive' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" title="Inactive Now"><i class="fa fa-arrow-down"></i></a>
                                        @else
                                            <a href="{{route('coupon.active' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" title="Active Now"><i class="fa fa-arrow-up"></i></a>
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
  
<!-- =========================  Add Brands======================================================================     -->

        
        <div class="col-4">
            <div class="box">
            <div class="box-header with-border margin-top-10">
                <h3 class="box-title">Add Coupon </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                    <form method="post" action="{{route('coupon.store')}}"  >
                                @csrf
                                <div class="row">
                                    <div class="col-12">                                   
                                                <!-- name=========================================================-->
                                                <div class="form-group">
                                                    <h5> Coupon name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="coupon_name" class="form-control"  >
                                                        @error('coupon_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5> Coupon Discount(%) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="coupon_discount" class="form-control"  >
                                                        @error('coupon_discount')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5> Coupon Validity Date <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date"  name="coipon_validity" class="form-control"  >
                                                        @error('coipon_validity')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                                                                                                
                                        <div class="text-xs-right">
                                        <input type="submit" class="btn btn-success mb-5 " value="Add Coupon" >
                                       
                                        </div>
                                    </div>
                                </div>
                    </form>
               
            </div>
            <!-- /.box-body -->
            </div>
        </div>
    </div>

    <!-- <button class="tst1 btn btn-info btn-block mb-15">Info Message</button> -->
</section>

@endsection