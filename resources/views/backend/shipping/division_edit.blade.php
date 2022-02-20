@extends('admin.admin_master')
@section('admin')

<section class="content">
    <div class="row">
              
        <div class="col-6">
            <div class="box">
            <div class="box-header with-border margin-top-10">
                <h3 class="box-title">Edit Division </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                    <form method="POST" action="{{route('division.update')}}" enctype="multipart/form-data" >
                                @csrf
                               
                                <input type= "hidden"  name="id" class="form-control"  value="{{$division->id}}">
                               
                                <div class="row">
                                    <div class="col-12">                                    
                                                <!-- name=========================================================-->
                                                <div class="form-group">
                                                    <h5> Division Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="division_name" class="form-control"    value="{{$division->division_name}}">
                                                        @error('division_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                                                             
                                                                                                                                
                                        <div class="text-xs-right">
                                        <input type="submit" class="btn btn-success mb-5 " value="Update Division" >
                                       
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