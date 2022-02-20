@extends('admin.admin_master')
@section('admin')


<section class="content">
    <div class="row">
        <div class="col-8">
            <div class="box">
                <div class="box-header with-border margin-top-10">
                    <h3 class="box-title">Blog Category List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-white">                                    
                                    <th>Blog Category En</th>
                                    <th>Blog Category Hin</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $item)
                                <tr class="text-white">                                   
                                    <td>{{$item->blog_category_name_en}}</td>
                                    <td>{{$item->blog_category_name_hin}}</td>
                                    <td width="30%">
                                        <a href="{{route('blog.category.edit' , $item->id)}}"   class="waves-effect waves-light btn  btn-circle mx-5  btn-info" ><i class="fa fa-pencil" title="Edit"></i></a>
                                        <a href="{{route('blog.category.delete' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" ><i class="fa fa-trash" title="delete"></i></a>                                                                                                                 
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
                <h3 class="box-title">Add Blog Category  </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                    <form method="post" action="{{route('blog.category.store')}}"  >
                                @csrf
                                <div class="row">
                                    <div class="col-12">                                   
                                                <!-- name=========================================================-->
                                                <div class="form-group">
                                                    <h5>Blog Category Name English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="blog_category_name_en" class="form-control" >
                                                        @error('blog_category_name_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Blog Category Name Hindi <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="blog_category_name_hin" class="form-control"  >
                                                        @error('blog_category_name_hin')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                
                                                                                                                                
                                        <div class="text-xs-right">
                                        <input type="submit" class="btn btn-success  mb-5" value="Add Blog Category" >
                                       
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

