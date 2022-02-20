@extends('admin.admin_master')
@section('admin')



<section class="content">
    <div class="row">
        <div class="col-8">
            <div class="box">
                <div class="box-header with-border margin-top-10">
                    <h3 class="box-title">Blog Post List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-white">
                                    <th>Blog Category</th>
                                    <th>Blog Image </th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $item)
                                <tr class="text-white">
                                    <td>{{$item->blogPost->blog_category_name_en}}</td>
                                    <td>{{$item->poast_title_en}}</td>
                                    <td style="background-color:#f1e9e9;"> <img src="{{ asset($item->post_image) }}" style="width: 70px; height: 40px">
                                    </td>
                                    <td>
                                        <a href="{{route('blogPost.edit' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" ><i class="fa fa-pencil" title="Edit"></i></a>
                                        <a href="{{route('blogPost.delete' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" data-toggle="modal" data-target="#modal-center" type="button"  id="delete"><i class="fa fa-trash" title="delete"></i></a>
                                          
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
  
      
       
    </div>

    <!-- <button class="tst1 btn btn-info btn-block mb-15">Info Message</button> -->
</section>


@endsection