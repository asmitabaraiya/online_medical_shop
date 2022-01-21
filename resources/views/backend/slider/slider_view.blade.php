@extends('admin.admin_master')
@section('admin')


<section class="content">
    <div class="row">
        <div class="col-8">
            <div class="box">
                <div class="box-header with-border margin-top-10">
                    <h3 class="box-title">Slider List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-white">
                                    <th>Slider Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($slider as $item)
                                <tr class="text-white">
                                    <td>
                                        <img src="{{asset($item->slider_img)}}" style="width: 70px; height: 40px">
                                    </td>
                                    <td>{{$item->title}}</td>
                                    <td >{{$item->description}}</td>
                                    <td>
                                        @if($item->status == 1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">InActive</span>
                                        @endif
                                        
                                    </td>                                   
                                    
                                    <td width="30%">
                                        <a href="{{route('slider.edit' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" ><i class="fa fa-pencil" title="Edit"></i></a>
                                        <a href="{{route('slider.delete' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info"  id="delete"><i class="fa fa-trash" title="delete"></i></a>
                                        @if($item->status == 1)
                                            <a href="{{route('slider.inactive' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" title="Inactive Now"><i class="fa fa-arrow-down"></i></a>
                                        @else
                                            <a href="{{route('slider.active' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" title="Active Now"><i class="fa fa-arrow-up"></i></a>
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
                <h3 class="box-title">Add Slider </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                    <form method="post" action="{{route('slider.store')}}" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">
                                    <div class="col-12">                                   
                                                <!-- name=========================================================-->
                                                <div class="form-group">
                                                    <h5> Slider Title <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="title" class="form-control" required="" >
                                                        @error('title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5> Slider Description <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="description" class="form-control" required="" >
                                                        @error('description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5> Slider Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file"  name="slider_img" class="form-control" required="" >
                                                        @error('slider_img')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                                                                                                
                                        <div class="text-xs-right">
                                        <input type="submit" class="btn btn-primary mb-5 " value="Add Slider" >
                                       
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