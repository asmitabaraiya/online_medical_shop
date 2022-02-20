@extends('admin.admin_master')
@section('admin')



<section class="content">
    <div class="row">
              
        <div class="col-6">
            <div class="box">
            <div class="box-header with-border margin-top-10">
                <h3 class="box-title">Edit Blog Category </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                            <form method="post" action="{{route('blog.category.update')}}"  >
                                @csrf
                                <input type="hidden"  name="id" class="form-control"  value="{{$blogcategory->id}}">

                                <div class="row">
                                    <div class="col-12">                                   
                                                <!-- name=========================================================-->
                                                <div class="form-group">
                                                    <h5> Blog Category Name English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="blog_category_name_en" class="form-control"  value="{{$blogcategory->blog_category_name_en}}">
                                                        @error('blog_category_name_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Blog Category Name Hindi <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="blog_category_name_hin" class="form-control" value="{{$blogcategory->blog_category_name_hin}}" >
                                                        @error('blog_category_name_hin')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                               
                                                                                                                                
                                        <div class="text-xs-right">
                                        <input type="submit" class="btn btn-success  mb-5" value="Update Blog Category" >
                                       
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