@extends('admin.admin_master')
@section('admin')

<!-- right content -->
<section class=" content">

    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"> New Message</h3>
        </div>

        <form method="post" action="{{route('contact.email')}}"  >
            @csrf        
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group">
            <input class="form-control" name="email" type="email" value="{{$contact->userInfo->email}}" placeholder="To:">
          </div>
          <div class="form-group">
            <input class="form-control" name="subject" type="text" placeholder="Subject:">
          </div>
          <div class="form-group">
                <textarea id="compose-textarea" name="massage" class="form-control" style="height: 300px">
                
                </textarea>
          </div>
     
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="pull-right">
            <input type="submit" class="btn btn-rounded btn-success" value="Send"   >
          </div>
        </div>
        <!-- /.box-footer -->

        </form>
    </div>
 <!-- /. box -->

 

</section>
<!-- /.right content -->

@endsection