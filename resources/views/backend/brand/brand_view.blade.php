@extends('admin.admin_master')
@section('admin')



<section class="content">
    <div class="row">
        <div class="col-8">
            <div class="box">
                <div class="box-header with-border margin-top-10">
                    <h3 class="box-title">Brand List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-white">
                                    <th>Brand En</th>
                                    <th>Brand Hin</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($brands as $item)
                                <tr class="text-white">
                                    <td>{{$item->brand_name_en}}</td>
                                    <td>{{$item->brand_name_hin}}</td>
                                    <td style="background-color:#e9dcdc;"> <img src="{{ asset($item->brand_image) }}" style="width: 70px; height: 40px">
                                    </td>
                                    <td>
                                        <a href="{{route('brand.edit' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" ><i class="fa fa-pencil" title="Edit"></i></a>
                                        <a href="{{route('brand.delete' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" data-toggle="modal" data-target="#modal-center" type="button"  id="delete"><i class="fa fa-trash" title="delete"></i></a>
                                          
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
                <h3 class="box-title">Add Brand </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                    <form method="post" action="{{route('brand.store')}}" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">
                                    <div class="col-12">                                   
                                                <!-- name=========================================================-->
                                                <div class="form-group">
                                                    <h5> Brand Name English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="brand_name_en" class="form-control"  >
                                                        @error('brand_name_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5> Brand Name Hindi <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="brand_name_hin" class="form-control" >
                                                        @error('brand_name_hin')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5> Brand Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" accept="image/*"  name="brand_image" class="form-control"  >
                                                        @error('brand_image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                                                                                                
                                        <div class="text-xs-right">
                                        <input type="submit" class="btn btn-success mb-5 " value="Add Brand" >
                                       
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