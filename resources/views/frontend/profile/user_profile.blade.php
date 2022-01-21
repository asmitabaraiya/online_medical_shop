@extends('frontend.main_master')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2 my-4"><br><br>
                <img class="card-img-top " id="showimage" style="border-radius: 50%"  width= "100px" height="100px"  src="{{ (!empty($user->profile_photo_path))?url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}">
                <ul class="list-group list-group-flush"><br><br>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="{{route('user.changePassword')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href=" {{ route('user.logout') }} " class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul> 
            </div>

            <div class="col-md-2 my-4">
                
            </div>

            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">
                        <span class="text-danger">
                            Hi.......  </span>
                            <strong>{{ Auth::user()->name }}</strong> Update your Profile
                      
                    </h3>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{ route('user.profile.store') }}" >
                            @csrf

                            <div class="form-group">
								<label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
								<input type="text" class="form-control unicase-form-control text-input"
                                id="exampleInputEmail2" name="name" value="{{ $user->name }}" >
                                @error('email')
                                <span class="invalid-feedback" role="alert">  <strong>{{ $message }}</storng></span>
                                @enderror
							</div>

                            <div class="form-group">
								<label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
								<input type="email" class="form-control unicase-form-control text-input" value="{{ $user->email }} "
                                id="exampleInputEmail2" name="email" >
                                @error('email')
                                <span class="invalid-feedback" role="alert">  <strong>{{ $message }}</storng></span>
                                @enderror
							</div>

                            <div class="form-group">
								<label class="info-title" for="exampleInputEmail1">Phone No <span>*</span></label>
								<input type="text" class="form-control unicase-form-control text-input" value="{{ $user->phone }} "
                                id="exampleInputEmail2" name="phone" >
                                @error('email')
                                <span class="invalid-feedback" role="alert">  <strong>{{ $message }}</storng></span>
                                @enderror
							</div>

                            <div class="form-group">
								<label class="info-title" for="exampleInputEmail1"> User Image <span>*</span></label>
								<input type="file" class="form-control unicase-form-control text-input" 
                                id="image" name="profile_photo_path" >
							</div>

                            <div class="form-group">
                                <button class="btn btn-success" type="submit"> Update </button>
                            </div>


                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showimage').attr('src' , e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection