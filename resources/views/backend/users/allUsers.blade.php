@extends('admin.admin_master')
@section('admin')

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border margin-top-10">
                    <h3 class="box-title">All User</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-white">
                                    <th>Profile</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr class="text-white">
                                    <td > 
                                        <img class="author_img rounded-circle" id="showimage" style="border-radius: 50%"  width= "50px" height="50px" src="{{ (!empty($user->profile_photo_path))?url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" alt="">
                                    </td>
                                    <td >{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td >{{$user->phone}}</td>
                                    <td>
                                        @if ($user->UserOnline())
                                            <span class="badge badge-pill badge-success">Online</span>
                                        @else
                                            <span class="badge badge-pill badge-info">{{Carbon\Carbon::parse($user->last_seen)->diffForHumans()}}</span>
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

      
    </div>

    <!-- <button class="tst1 btn btn-info btn-block mb-15">Info Message</button> -->
</section>

@endsection