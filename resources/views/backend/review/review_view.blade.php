@extends('admin.admin_master')
@section('admin')



<section class="content">
    <div class="row">
        @foreach ($item as $review )                    
            <div class="col-md-6">       
                    <div class="media bg-white mb-20">
                        <span class="avatar status-success">
                      
                        @if ($review->users->profile_photo_path)
                            <img   src="{{asset('upload/user_images/'.$review->users->profile_photo_path)}}" style="height: 36px; width:36px;" alt="">       
                        @else
                            <img class="avatar" src="{{asset('upload/no_image.jpg')}}" style="height: 36px; width:36px;" alt="">                                                                                
                        @endif
                        </span>
                        <div class="media-body">
                        <p><strong>{{$review->users->name}}</strong> <time class="float-right" datetime="2017-07-14 20:00">{{Carbon\Carbon::parse($review->created_at)->diffForHumans()}}</time></p>
                        <h6>{{$review->subject}}</h6>    
                        <p>{{$review->message}}</p>
                        <div class="d-inline-block pull-right mt-10">
                            @if ($review->status == 0)
                            <a href="{{route('review.approve' , $review->id)}}"  class="btn btn-rounded btn-sm btn-success m-5">Approve</a>
                                
                            @endif


                            	
                                <!-- Modal -->
                                <div class="modal center-modal fade" id="modal-center{{$review->id}}" tabindex="-1">
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
                                        <a href="{{route('review.delete' , $review->id)}}" id="modalClick" class="btn btn-rounded btn-danger float-right">Delete</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <!-- /.modal -->



                            <a href="{{route('review.delete' , $review->id)}}"  data-toggle="modal" data-target="#modal-center{{$review->id}}" class="btn btn-rounded btn-sm btn-danger m-5">Delete</a>
                        </div>
                        </div>
                    </div>
            </div> 
        @endforeach
   </div>    
    </div>

    <!-- <button class="tst1 btn btn-info btn-block mb-15">Info Message</button> -->
</section>


@endsection