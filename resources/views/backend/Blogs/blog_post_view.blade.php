@extends('admin.admin_master')
@section('admin')



<section class="content">
    <div class="row">
        <div class="col-12">
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
                                    <td>{{$item->blogPostName->blog_category_name_en}}</td>                                   
                                    <td > <img src="{{ asset($item->post_image) }}" style="width: 70px; height: 40px">
                                    <td>{{$item->poast_title_en}}</td>                                       
                                    </td>
                                    <td>
                                        <a href="{{route('blogPost.edit' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" ><i class="fa fa-pencil" title="Edit"></i></a>
                                       
                                       
                                       	
                                    <!-- Modal -->
                                    <div class="modal center-modal fade" id="modal-center{{$item->id}}" tabindex="-1">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <h1 class="text-center"><i class="fa fa-trash fa-3x "></i><h1>  <h2 class="text-center"> Are you sure to Delete It !</h2>
                                            </div>
                                            <div class="modal-footer modal-footer-uniform">
                                            <button type="button" class="btn btn-rounded btn-secondary" data-dismiss="modal">Cancel</button>
                                            <a href="{{route('blogPost.delete' , $item->id)}}" id="modalClick" class="btn btn-rounded btn-danger float-right">Delete</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- /.modal -->

                                    <a  class="waves-effect waves-light btn  btn-circle mx-5  btn-info" data-toggle="modal" data-target="#modal-center{{$item->id}}" ><i class="fa fa-trash" title="delete"></i></a>

                                       
                                       
                                        <a href="{{route('blog.post.comment' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" ><i class="fa fa-comment" title="Comment"></i></a>                                          
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