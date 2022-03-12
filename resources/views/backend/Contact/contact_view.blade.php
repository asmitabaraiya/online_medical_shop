@extends('admin.admin_master')
@section('admin')

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border margin-top-10">
                    <h3 class="box-title">All Contact Massage</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-white">
                                    <th>Profile</th>                                   
                                    <th>Email</th>
                                    <th>Subject</th>                                    
                                    <th>Massage</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $item)
                                <tr class="text-white">
                                    <td > 
                                        <img class="author_img rounded-circle" id="showimage" style="border-radius: 50%"  width= "50px" height="50px" src="{{ (!empty($item->userInfo->profile_photo_path))?url('upload/user_images/'.$item->userInfo->profile_photo_path):url('upload/no_image.jpg') }}" alt="">
                                    </td>                                   
                                    <td width="25px;">{{$item->userInfo->email}}</td>
                                    <td width="25px;">{{$item->subject}}</td>
                                    <td>{{Str::limit( $item->message , 50 )}}</td>  
                                    <td >
                                        <a href="{{route('contact.show' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" ><i class="fa fa-eye" title="View"></i></a>
                                       
                                       	
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
          <a href="{{route('contact.delete' , $item->id)}}" id="modalClick" class="btn btn-rounded btn-danger float-right">Delete</a>
        </div>
      </div>
    </div>
  </div>
<!-- /.modal -->

<a  class="waves-effect waves-light btn  btn-circle mx-5  btn-info" data-toggle="modal" data-target="#modal-center{{$item->id}}" ><i class="fa fa-trash" title="delete"></i></a>

                                       
                                       
                                       
                                          
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