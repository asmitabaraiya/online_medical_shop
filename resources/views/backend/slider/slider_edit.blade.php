@extends('admin.admin_master')
@section('admin')



<section class="content">
    <div class="row">
              
        <div class="col-6">
            <div class="box">
            <div class="box-header with-border margin-top-10">
                <h3 class="box-title">Edit Slider </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                    <form method="POST" action="{{route('slider.update')}}" enctype="multipart/form-data" >
                                @csrf
                               
                                <input type= "hidden"  name="id" class="form-control" required="" value="{{$slider->id}}">
                                <input type= "hidden"  name="old_image" class="form-control" required="" value="{{$slider->slider_img}}">

                                <div class="row">
                                    <div class="col-12">                                   
                                                <!-- name=========================================================-->
                                                <div class="form-group">
                                                    <h5> Slider Title <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="title" class="form-control" required="" value="{{$slider->title}}">
                                                        @error('title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5> Slider Description  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="description" class="form-control" required="" value="{{$slider->description}}" >
                                                        @error('description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5> Slider Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file"  name="slider_img" class="form-control"   >
                                                        @error('slider_img')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                                                                                                
                                        <div class="text-xs-right">
                                        <input type="submit" class="btn btn-primary mb-5 " value="Update" >
                                       
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