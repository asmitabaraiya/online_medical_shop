@extends('admin.admin_master')
@section('admin')



<section class="content">
    <div class="row">
              
        <div class="col-6">
            <div class="box">
            <div class="box-header with-border margin-top-10">
                <h3 class="box-title">Edit Category </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                            <form method="post" action="{{route('category.update')}}"  >
                                @csrf
                                <input type="hidden"  name="id" class="form-control"  value="{{$category->id}}">

                                <div class="row">
                                    <div class="col-12">                                   
                                                <!-- name=========================================================-->
                                                <div class="form-group">
                                                    <h5> Category Name  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="category_name_en" class="form-control"  value="{{$category->category_name_en}}">
                                                        @error('category_name_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                               

                                                <div class="form-group">
                                                    <h5> Category Icon <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="category_icon" class="form-control"  value="{{$category->category_icon}}"  >
                                                        @error('category_icon')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                                                                                                
                                        <div class="text-xs-right">
                                        <input type="submit" class="btn btn-success  mb-5" value="Update Category" >
                                       
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