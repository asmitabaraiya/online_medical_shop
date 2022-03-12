@extends('admin.admin_master')
@section('admin')


<section class="content">
    <div class="row">
        <div class="col-lg-3 col-12">
            <div class="box">
                <div class="box-header with-border p-0">
                    <div class="form-element lookup">
                        <input class="form-control p-20 w-p100" type="text" placeholder="Search Contact">
                    </div>
                </div>
                <div class="box-body p-0">
                  <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 680px;"><div id="chat-contact" class="media-list media-list-hover media-list-divided " style="overflow: hidden; width: auto; height: 680px;">
                   
                    @foreach ($comments as $item)                                                                         
                            <div class="media media-single">
                                <a href="{{url('/blogs/comment/view/'.$item->id.'/'.$item->blog_post_id)}}" class="avatar avatar-lg status-success">
                                @if ($item->users->profile_photo_path)
                                    <img src="{{asset('upload/user_images/'.$item->users->profile_photo_path)}}" style="height: 48px; width:48px;" alt="">       
                                @else
                                    <img src="{{asset('upload/no_image.jpg')}}" style="height: 48px; width:48px;" alt="">                                                                                
                                @endif
                                </a>
        
                                <div class="media-body">
                                <h6><a href="{{url('/blogs/comment/view/'.$item->id.'/'.$item->blog_post_id)}}">{{$item->users->name}}</a></h6>
                                @if ($item->users->UserOnline())
                                    <small class="text-success">Online</small>
                                @else
                                <small class="text-danger">Busy</small>
                                @endif
                                </div>
                            </div>                       
                    @endforeach

                    
                  </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 546.572px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                </div>
            </div>
        </div>
        @if (isset($Commentitem))            
            <div class="col-lg-9 col-12">
                <div class="box direct-chat">
                    <div class="box-header with-border">
                    <h4 class="box-title">Blog Comment</h4> 

                    	
  <!-- Modal -->
  <div class="modal center-modal fade" id="modal-center{{$Commentitem->id}}" tabindex="-1">
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
          <a href="{{route('comment.delete' , $Commentitem->id)}}" id="modalClick" class="btn btn-rounded btn-danger float-right">Delete</a>
        </div>
      </div>
    </div>
  </div>
<!-- /.modal -->




                    <a href="" class="waves-effect waves-light btn  btn-circle mx-5  btn-danger"  data-toggle="modal" data-target="#modal-center{{$Commentitem->id}}" style="float: right;"><i class="fa fa-trash" title="delete"></i></a>                                                                                                                 
                   
                
                </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <!-- Conversations are loaded here -->
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;">
                        <div id="chat-app" class="direct-chat-messages chat-app" style="overflow: hidden; width: auto; height: 300px;">
                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg mb-30">
                            <div class="clearfix mb-15">
                            <span class="direct-chat-name">{{$Commentitem->users->name}}</span>
                            </div>
                            <!-- /.direct-chat-info -->
                            @if ($Commentitem->users->profile_photo_path)
                                <img class="direct-chat-img avatar" src="{{asset('upload/user_images/'.$Commentitem->users->profile_photo_path)}}" alt="message user image">                                    
                            @else
                                <img class="direct-chat-img avatar" src="{{asset('upload/no_image.jpg')}}" alt="message user image">                                                                                                                                               
                            @endif


                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                <p>{{$Commentitem->message}}</p>
                                <p class="direct-chat-timestamp"><time datetime="2018">{{Carbon\Carbon::parse($Commentitem->created_at)->format('D , d M Y')}}</time></p>
                            </div>

                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->

                        @if ($Commentitem->reply != 0)
                            <!-- Message to the right -->
                            <div class="direct-chat-msg right mb-30">
                                <div class="clearfix mb-15">
                                    <span class="direct-chat-name pull-right">You</span>
                                </div>
                                <div class="direct-chat-text">
                                    <p>{{$Commentitem->reply}}</p>                        
                                    <p class="direct-chat-timestamp"><time datetime="2018">{{Carbon\Carbon::parse($Commentitem->reply_date)->format('D , d M Y')}}</time></p>
                                </div>
                            <!-- /.direct-chat-text -->
                            </div>
                            <!-- /.direct-chat-msg -->
                        @endif
                        
                    </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 337.074px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                    <!--/.direct-chat-messages-->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                    <form action="{{route('reply.add')}}" method="post">
                        <input type="hidden" value="{{$Commentitem->id}}" name="id">
                        @csrf
                        <div class="form-group">
                            <div class="controls">
                                <textarea name="reply" id="" cols="90" rows="3" class="form-control"></textarea>       
                                @error('reply')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="help-block"></div>
                            </div>                            
                        </div>

                        @if ($Commentitem->reply == 0)
                            <div class="text-xs-left" style="float: right;">
                                <input type="submit" class="btn btn-success mb-5 " value="Reply" >                                       
                            </div>
                        @else
                            <div class="text-xs-left" style="float: right;">
                                <input type="submit" class="btn btn-success mb-5 " value="Edit Reply" >                                       
                            </div>
                        @endif
                    </form>
                    </div>
                    <!-- /.box-footer-->
                </div>
            </div>	
        @endif            							
    </div>
</section>

@endsection


