@extends('admin.admin_master')
@section('admin')

<!-- Modal -->
<div class="modal center-modal fade" id="modal-center{{$massage->id}}" tabindex="-1">
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
          <a href="{{route('contact.delete' , $massage->id)}}" id="modalClick" class="btn btn-rounded btn-danger float-right">Delete</a>
        </div>
      </div>
    </div>
  </div>
<!-- /.modal -->



    <!-- right content -->
	<section class=" content">

		<div class="box">
			<div class="box-body">
			
			  <!-- /.mailbox-controls -->
			  <div class="mailbox-read-info">
				<h3>{{$massage->subject}}</h3>
			  </div>
			  <div class="mailbox-read-info bb-0 clearfix">
				<div class="float-left mr-5"><a href="#"><img src="{{ (!empty($massage->userInfo->profile_photo_path))?url('upload/user_images/'.$massage->userInfo->profile_photo_path):url('upload/no_image.jpg') }}" alt="user" width="40" class="rounded-circle"></a></div>
				<h5 class="no-margin"> {{$massage->name}} <br>
					 <small>From: {{$massage->userInfo->email}}</small>
				  <span class="mailbox-read-time pull-right"> {{ Carbon\Carbon::parse($massage->created_at)->format('D , d M Y')}}</span></h5>
			  </div>
			  <!-- /.mailbox-read-info -->
			  <div class="mailbox-read-message">
                
				<p>{{$massage->message}}</p>
			  </div>
			  <!-- /.mailbox-read-message -->
			</div>
		

			<div class="box-footer">
			  <div class="pull-right">
				<a href="{{route('contact.reply' , $massage->id)}}" class="btn btn-rounded btn-success"><i class="fa fa-reply"></i> Reply</a>
			  </div>

              <a  data-toggle="modal" data-target="#modal-center{{$massage->id}}" class="btn btn-rounded btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
                  
             
			 
			</div>
			<!-- /.box-footer -->
		  </div>
		  <!-- /. box -->

	</section>
	<!-- /.right content -->
@endsection    