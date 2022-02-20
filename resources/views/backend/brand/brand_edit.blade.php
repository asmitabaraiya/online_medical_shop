@extends('admin.admin_master')
@section('admin')



<section class="content">
    <div class="row">
              
        <div class="col-6">
            <div class="box">
            <div class="box-header with-border margin-top-10">
                <h3 class="box-title">Edit Brand </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                    <form method="POST" action="{{route('brand.update')}}" enctype="multipart/form-data" >
                                @csrf

                               

                                <input type= "hidden"  name="id" class="form-control" value="{{$brand->id}}">
                                <input type= "hidden"  name="old_image" class="form-control" required="" value="{{$brand->brand_image}}">

                                <div class="row">
                                    <div class="col-12">                                   
                                                <!-- name=========================================================-->
                                                <div class="form-group">
                                                    <h5> Brand Name English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="brand_name_en" class="form-control" value="{{$brand->brand_name_en}}">
                                                        @error('brand_name_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5> Brand Name Hindi <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="brand_name_hin" class="form-control"  value="{{$brand->brand_name_hin}}" >
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
                                        <input type="submit" class="btn btn-success mb-5  " value="Update Brand" >
                                       
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